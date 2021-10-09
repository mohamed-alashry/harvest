<?php

namespace App\Http\Livewire\Groups;

use App\Models\Group;
use Livewire\Component;
use App\Models\SubRound;
use App\Models\Timeframe;
use Laracasts\Flash\Flash;
use Livewire\WithPagination;
use App\Models\DisciplineCategory;
use App\Models\Round;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 10,
        $show_upgrade = false,
        $disciplines,
        $timeframesData,
        $roundsData = [],
        $daysData = [],
        $subRoundFrom = [],
        $discipline_id,
        $timeframe_id,
        $round_id,
        $days,
        $from_sub_round,
        $to_sub_round,
        $selectedGroups = [];

    public function mount()
    {
        $this->timeframesData = Timeframe::pluck('title', 'id')->toArray();
        $this->disciplines = DisciplineCategory::pluck('name', 'id')->toArray();
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
        $this->daysData = Timeframe::find($val)->days;
        $this->roundsData = Round::where('timeframe_id', $val)->pluck('title', 'id');
    }

    public function updatedRoundId($val)
    {
        $this->setRoundFrom();
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
        }

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

        Flash::success('Groups Upgraded.');
    }

    public function render()
    {
        $groups = Group::with('parent', 'round', 'discipline', 'branch', 'room', 'instructor', 'interval')
            ->withCount('students')->latest()->paginate($this->per_page);

        return view('livewire.groups.index', compact('groups'));
    }
}
