<?php

namespace App\Http\Livewire\GroupSessionAttendances;

use App\Models\Group;
use App\Models\GroupSession;
use Livewire\Component;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\GroupSessionAttendance;
use App\Models\GroupStudent;

class Index extends Component
{
    public $session_id,
        $editable = false,
        $present = [];

    public function mount(Request $request)
    {
        $this->session_id = $request->get('session');
    }

    public function toggleEdit()
    {
        $this->editable = true;
    }

    public function addToMakeup($id)
    {
        $groupSession = GroupSession::with('makeup')->find($this->session_id);

        if (!$groupSession->makeup) {
            redirect(route('admin.makeupSessions.create', ['session' => $groupSession->id]));
        } else {
            $groupSession->makeup->attendances()->attach($id);

            Flash::success('Added to makeup session successfully.');
        }
    }

    public function save()
    {
        $groupSession = GroupSession::with('makeup')->find($this->session_id);
        $group = Group::withCount('sessions')->find($groupSession->group_id);

        $attendances = GroupSessionAttendance::where('group_session_id', $this->session_id)->get();
        foreach ($attendances as $attendance) {
            $attendance->update(['attendance' => in_array($attendance->id, $this->present) ? 1 : 0]);

            $absentCount = GroupSessionAttendance::where([
                'lead_id' => $attendance->lead_id,
                'group_id' => $attendance->group_id,
                'level_id' => $attendance->level_id,
                'attendance' => 0,
            ])->count();

            $student = GroupStudent::where([
                'lead_id' => $attendance->lead_id,
                'group_id' => $attendance->group_id,
            ])->first();

            if ($absentCount > 1) {
                $student->abcence_per = ($absentCount / $group->session_count) * 100;

                $attendance->update(['need_makeup' => 1]);
            }
        }

        $groupSession->update(['status' => 2]);

        Flash::success('Attendance saved successfully.');

        $this->editable = false;
    }

    public function render()
    {
        $attendances = GroupSessionAttendance::with('makeup')->where('group_session_id', $this->session_id)->get();
        // dd($attendances);

        return view('livewire.group-session-attendances.index', compact('attendances'));
    }
}
