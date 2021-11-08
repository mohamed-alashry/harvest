<?php

namespace App\Http\Livewire\Groups;

use App\Models\Room;
use App\Models\Group;
use App\Models\Round;
use Livewire\Component;
use App\Models\Employee;
use App\Models\SubRound;
use App\Models\Timeframe;
use App\Models\StageLevel;
use Laracasts\Flash\Flash;
use App\Models\GroupSession;
use Livewire\WithPagination;
use App\Models\SubRoundSession;
use App\Models\DisciplineCategory;
use Illuminate\Database\Eloquent\Builder;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 10,
        $show_upgrade = false,
        $show_filter = false,
        $disciplines,
        $timeframesData,
        $roundsData = [],
        $subRoundData = [],
        $daysData = [],
        $intervalsData = [],
        $subRoundFrom = [],
        $roomsData = [],
        $instructorsData = [],
        $adminsData = [],
        $levelsData = [],
        $discipline_id,
        $timeframe_id,
        $round_id,
        $sub_round_id,
        $days,
        $from_sub_round,
        $to_sub_round,
        $interval_id,
        $room_id,
        $instructor_id,
        $admin_id,
        $level_id,
        $status,
        $selectedGroups = [];

    public function mount()
    {
        $this->timeframesData = Timeframe::pluck('title', 'id')->toArray();
        $this->disciplines = DisciplineCategory::pluck('name', 'id')->toArray();
        $this->rounds = Round::pluck('title', 'id')->toArray();
        $this->roomsData = Room::pluck('name', 'id')->toArray();
        $this->instructorsData = Employee::get()->pluck('name', 'id')->toArray();
        $this->adminsData = Employee::get()->pluck('name', 'id')->toArray();
        $this->levelsData = StageLevel::pluck('name', 'id')->toArray();
    }

    public function toggleFilter()
    {
        $this->show_filter = !$this->show_filter;
        $this->reset([
            'timeframe_id',
            'round_id',
            'sub_round_id',
            'days',
            'from_sub_round',
            'to_sub_round',
            'interval_id',
            'room_id',
            'instructor_id',
            'admin_id',
            'level_id',
        ]);
    }

    public function toggleUpgrade()
    {
        $this->show_upgrade = !$this->show_upgrade;
    }

    public function updatedDisciplineId($val)
    {
        $this->selectGroups();
    }

    public function updatedTimeframeId($val)
    {
        $timeframe = Timeframe::find($val);
        $this->daysData = $timeframe->days;
        $this->roundsData = $timeframe->rounds->pluck('title', 'id');
        $this->intervalsData = $timeframe->intervals->pluck('name', 'id')->toArray();
    }

    public function updatedRoundId($val)
    {
        $this->setRoundFrom();
        $this->subRoundData = SubRound::where('round_id', $this->round_id)->pluck('start_date', 'id');
    }

    public function updatedDays($val)
    {
        $this->setRoundFrom();
    }

    public function setRoundFrom()
    {
        if ($this->round_id && $this->days) {
            $this->subRoundFrom = SubRound::where('round_id', $this->round_id)->where('days', $this->days)->get();
        }
    }

    public function updatedFromSubRound($val)
    {
        $this->to_sub_round = SubRound::where('round_id', $this->round_id)->where('days', $this->days)->where('id', '>', $val)->first();

        $this->selectGroups();
    }

    public function selectGroups()
    {
        if ($this->from_sub_round && $this->discipline_id) {
            $this->selectedGroups = Group::where([
                'sub_round_id' => $this->from_sub_round, 'discipline_id' => $this->discipline_id, 'is_upgraded' => 0, 'is_last' => 0
            ])->with('course.stageLevels', 'levels')->get();
        }
    }

    public function resetData()
    {
        $this->reset([
            'show_upgrade',
            'roundsData',
            'daysData',
            'subRoundFrom',
            'timeframe_id',
            'round_id',
            'days',
            'from_sub_round',
            'to_sub_round',
            'selectedGroups',
        ]);
    }

    public function upgradeGroups()
    {
        if (count($this->selectedGroups) == 0) {
            Flash::error('No Groups Found.');
            return null;
        }

        if (!$this->to_sub_round) {
            Flash::error('No Sub Round To Found.');
            return null;
        }

        foreach ($this->selectedGroups as $group) {
            $stageLevels = $group->course->stageLevels->pluck('id')->toArray();
            $levels = $group->levels->pluck('id')->toArray();

            $levelsCount = count($levels);
            $end = end($levels);

            $lastKey = array_search($end, $stageLevels);

            $newLevels = [];
            for ($i = 1; $i <= $levelsCount; $i++) {
                $lastKey += $i;
                if (isset($stageLevels[$lastKey])) {
                    $newLevels[] = $stageLevels[$lastKey];
                }
            }

            $data = [
                'parent_id' => $group->id,
                'sub_round_id' => $this->to_sub_round->id,
            ];

            if (!isset($stageLevels[$lastKey + 1])) {
                $data['is_last'] = 1;
            }

            $upgradedGroup = $group->replicate()->fill($data);
            $upgradedGroup->save();

            $upgradedGroup->levels()->sync($newLevels);

            $group->update(['is_upgraded' => 1]);



            $dates = SubRoundSession::where('sub_round_id', $upgradedGroup->sub_round_id)->pluck('date')->toArray();

            $newLevelsCount = count($newLevels);
            $perSession = (count($dates) - 1) / $newLevelsCount;
            $end = end($dates);

            $key = 0;
            $i = 1;
            foreach ($dates as $date) {
                $sessionData = [
                    'group_id' => $upgradedGroup->id,
                    'date' => $date,
                    'room_id' => $upgradedGroup->room_id,
                    'instructor_id' => $upgradedGroup->instructor_id,
                    'interval_id' => $upgradedGroup->interval_id,
                ];

                if ($date != $end) {
                    $sessionData['level_id'] = $newLevels[$key];
                }

                GroupSession::create($sessionData);

                if (($i % $perSession) == 0) {
                    $key++;
                }
                $i++;
            }
        }

        $this->resetData();

        Flash::success('Groups Upgraded.');
    }

    public function render()
    {
        $groupsQuery = Group::withCount('students', 'sessions')
            ->with('parent', 'round', 'discipline', 'branch', 'room', 'instructor', 'interval')->latest();

        if (!$this->show_filter) {
            $groupsQuery->where(function ($query) {
                $query->whereNotNull('parent_id')
                    ->where('is_upgraded', 0);
            })->orWhere(function ($query) {
                $query->whereNull('parent_id')
                    ->where('is_upgraded', 0);
            });
        }
        if ($this->round_id) {
            $groupsQuery->where('round_id', $this->round_id);
        }
        if ($this->sub_round_id) {
            $groupsQuery->where('sub_round_id', $this->sub_round_id);
        }
        if ($this->interval_id) {
            $groupsQuery->where('interval_id', $this->interval_id);
        }
        if ($this->room_id) {
            $groupsQuery->where('room_id', $this->room_id);
        }
        if ($this->instructor_id) {
            $groupsQuery->where('instructor_id', $this->instructor_id);
        }
        if ($this->admin_id) {
            $groupsQuery->where('admin_id', $this->admin_id);
        }
        if ($this->level_id) {
            $groupsQuery->whereHas('levels', function (Builder $query) {
                $query->where('id', $this->level_id);
            });
        }

        $groups = $groupsQuery->paginate($this->per_page);

        // if ($this->status) {
        //     $groups->where('status', $this->status)->all();
        //     dd($groups);
        // }

        return view('livewire.groups.index', compact('groups'));
    }
}
