<?php

namespace App\Http\Livewire\Groups;

use App\Models\Room;
use App\Models\Group;
use App\Models\Round;
use App\Models\Track;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Employee;
use Laracasts\Flash\Flash;
use App\Models\DisciplineCategory;

class Form extends Component
{
    public $group,
        $title,
        $track_id,
        $course_id,
        $round_id,
        $discipline_id,
        $branch_id,
        $room_id,
        $instructor_id,
        $interval_id,
        $levels,
        $tracks,
        $courses = [],
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
                'track_id' => $group->track_id,
                'course_id' => $group->course_id,
                'round_id' => $group->round_id,
                'discipline_id' => $group->discipline_id,
                'branch_id' => $group->branch_id,
                'room_id' => $group->room_id,
                'instructor_id' => $group->instructor_id,
                'interval_id' => $group->interval_id,
                'levels' => $group->levels->pluck('id'),
                'courses' => Track::where('parent_id', $group->track_id)->pluck('title', 'id'),
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

        $this->tracks = Track::whereNull('parent_id')->pluck('title', 'id');
        $this->rounds = Round::pluck('title', 'id');
        $this->disciplines = DisciplineCategory::pluck('name', 'id');
        $this->branches = Branch::pluck('name', 'id');
    }

    protected function rules()
    {
        $rules = [
            'title' => 'required',
            'track_id' => 'required',
            'course_id' => 'required',
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

    public function updatedTrackId($value)
    {
        $this->courses = Track::where('parent_id', $value)->pluck('title', 'id')->toArray();
        $this->course_id = '';
    }

    public function updatedCourseId($value)
    {
        $this->stageLevels = Track::find($value)->stageLevels->pluck('name', 'id')->toArray();
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
        $round = Round::with('serviceFee.timeframe.intervals')->find($roundId);

        $this->intervals = $round->serviceFee->timeframe->intervals->pluck('name', 'id')->toArray();
        // $this->stageLevels = $round->serviceFee->trainingService->course->stageLevels->pluck('name', 'id');
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
