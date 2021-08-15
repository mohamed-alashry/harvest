<?php

namespace App\Http\Livewire\Groups;

use App\Models\Branch;
use App\Models\DisciplineCategory;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Room;
use App\Models\Round;
use Livewire\Component;
use Laracasts\Flash\Flash;

class Form extends Component
{
    public $group,
        $title,
        $round_id,
        $discipline_id,
        $branch_id,
        $room_id,
        $instructor_id,
        $interval_id,
        $levels,
        $rounds,
        $disciplines,
        $branches,
        $rooms,
        $instructors,
        $intervals,
        $stageLevels;

    public function mount($group = null)
    {
        if ($group) {
            $this->fill([
                'title' => $group->title,
                'round_id' => $group->round_id,
                'discipline_id' => $group->discipline_id,
                'branch_id' => $group->branch_id,
                'room_id' => $group->room_id,
                'instructor_id' => $group->instructor_id,
                'interval_id' => $group->interval_id,
                'levels' => $group->levels->pluck('id'),
            ]);

            $this->roundIdUpdated($group->round_id);
            $this->branchIdUpdated($group->branch_id);
            $this->getInstructors(false);
        } else {
            $this->rooms = [];
            $this->intervals = [];
            $this->stageLevels = [];
            $this->instructors = [];
        }
        // $this->instructors = [];

        $this->rounds = Round::pluck('title', 'id');
        $this->disciplines = DisciplineCategory::pluck('name', 'id');
        $this->branches = Branch::pluck('name', 'id');
    }

    protected function rules()
    {
        $rules = [
            'title' => 'required',
            'round_id' => 'required',
            'discipline_id' => 'required',
            'branch_id' => 'required',
            'room_id' => 'required',
            'instructor_id' => 'required',
            'interval_id' => 'required',
            'levels' => 'required|array',
        ];

        return $rules;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function updatedRoundId($val)
    {
        $this->roundIdUpdated($val);

        $this->interval_id = '';
        $this->levels = [];

        $this->getInstructors();
    }

    public function roundIdUpdated($roundId)
    {
        $round = Round::with('serviceFee.trainingService.course.stageLevels', 'serviceFee.timeframe.intervals')->find($roundId);

        $this->intervals = $round->serviceFee->timeframe->intervals->pluck('name', 'id');
        $this->stageLevels = $round->serviceFee->trainingService->course->stageLevels->pluck('name', 'id');
    }

    public function updatedBranchId($val)
    {
        $this->branchIdUpdated($val);

        $this->room_id = '';

        $this->getInstructors();
    }

    public function branchIdUpdated($branchId)
    {
        $this->rooms = Room::where('branch_id', $branchId)->pluck('name', 'id');
    }

    public function updatedIntervalId($val)
    {
        $this->getInstructors();
    }

    public function getInstructors($reset = true)
    {
        $instructorsQuery = Employee::query();

        if ($this->branch_id) {
            $instructorsQuery->where('branch_id', $this->branch_id);
        }
        if ($this->round_id && $this->interval_id && $reset) {
            $roundGroupInstructors = Group::where(['round_id' => $this->round_id, 'interval_id' => $this->interval_id])
                ->pluck('instructor_id')->toArray();

            $instructorsQuery->whereNotIn('id', $roundGroupInstructors);
        }

        $this->instructors = $instructorsQuery->get()->pluck('name', 'id');

        if ($reset) {
            $this->instructor_id = '';
        }
    }

    public function save()
    {
        $data = $this->validate();

        $group = $this->group;
        if ($group) {
            $group->update($data);
        } else {
            $group = Group::create($data);
        }

        $group->levels()->sync($data['levels']);

        Flash::success('Group saved successfully.');

        redirect(route('admin.groups.index'));
    }

    public function render()
    {
        return view('livewire.groups.form');
    }
}
