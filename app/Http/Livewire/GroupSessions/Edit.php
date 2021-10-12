<?php

namespace App\Http\Livewire\GroupSessions;

use App\Models\Room;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Interval;
use Laracasts\Flash\Flash;
use App\Models\GroupSession;
use Illuminate\Database\Eloquent\Builder;

class Edit extends Component
{
    public $groupSession,
        $intervals,
        $instructors,
        $rooms,
        $date,
        $interval_id,
        $instructor_id,
        $room_id,
        $status;

    public function mount($groupSession = null)
    {
        $this->fill([
            'date' => $groupSession->date,
            'interval_id' => $groupSession->interval_id,
            'instructor_id' => $groupSession->instructor_id,
            'room_id' => $groupSession->room_id,
            'status' => $groupSession->status,
        ]);

        $groupSession->load('group.round.timeframe.intervals');

        $this->intervals = $groupSession->group->round->timeframe->intervals->pluck('name', 'id')->toArray();

        $this->instructors = Employee::whereHas('branches', function (Builder $query) use ($groupSession) {
            $query->where('id', $groupSession->group->branch_id);
        })->get()->pluck('name', 'id')->toArray();

        $this->rooms = Room::where('branch_id', $groupSession->group->branch_id)->pluck('name', 'id');
    }

    protected function rules()
    {
        $rules = [
            'date' => 'required',
            'room_id' => 'required',
            'instructor_id' => 'required',
            'interval_id' => 'required',
            'status' => 'required'
        ];

        return $rules;
    }

    public function save()
    {
        $data = $this->validate();

        $this->groupSession->update($data);

        Flash::success('Group Session saved successfully.');

        redirect(route('admin.groupSessions.index', ['group' => $this->groupSession->group_id]));
    }

    public function render()
    {
        return view('livewire.group-sessions.edit');
    }
}
