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
        $timeframesData,
        $roundsData = [],
        $daysData = [],
        $subRoundFrom = [],
        $subRoundTo,
        $timeframe_id,
        $round_id,
        $days,
        $from_sub_round,
        $to_sub_round,
        $selectedGroups = [];

    public function mount()
    {
        $this->timeframesData = Timeframe::pluck('title', 'id')->toArray();
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
        $subRoundTo = $this->subRoundTo = SubRound::where('round_id', $this->round_id)->where('days', $this->days)->where('id', '>', $val)->first();

        $this->to_sub_round = $subRoundTo->id;
        $this->selectedGroups = Group::where(['sub_round_id' => $val, 'round_id' => $this->round_id])->get();
    }

    public function toggleUpgrade()
    {
        $this->show_upgrade = !$this->show_upgrade;
    }

    public function upgradeGroups()
    {
        if (count($this->selectedGroups) == 0) {
            Flash::error('No Group Found.');
        }

        foreach ($this->selectedGroups as $group) {
            $group->load('course.stageLevels', 'levels');
            $stageLevels = $group->course->stageLevels->pluck('id')->toArray();
            $levels = $group->levels->pluck('id')->toArray();

            $upgradedGroup = $group->replicate()->fill([
                'parent_id' => $group->id,
                'sub_round_id' => $this->to_sub_round,
            ]);
            $upgradedGroup->save();

            $levelsCount = count($levels);
            $end = end($levels);

            $lastKey = array_search($end, $stageLevels);

            $newLevels = [];
            for ($i = 1; $i <= $levelsCount; $i++) {
                $newLevels[] = $stageLevels[$lastKey + $i];
            }

            $upgradedGroup->levels()->sync($newLevels);
        }

        Flash::success('Groups Upgraded.');
    }

    public function render()
    {
        $groups = Group::latest()->paginate($this->per_page);

        return view('livewire.groups.index', compact('groups'));
    }
}
