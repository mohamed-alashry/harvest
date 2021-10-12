<?php

namespace App\Http\Livewire\GroupSessionAttendances;

use Livewire\Component;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\GroupSessionAttendance;

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

    public function save()
    {
        $attendances = GroupSessionAttendance::where('group_session_id', $this->session_id)->get();
        foreach ($attendances as $attendance) {
            $attendance->update(['attendance' => in_array($attendance->id, $this->present) ? 1 : 0]);

            $absentCount = GroupSessionAttendance::where([
                'lead_id' => $attendance->lead_id,
                'group_id' => $attendance->group_id,
                'level_id' => $attendance->level_id,
                'attendance' => 0,
            ])->count();

            if ($absentCount > 1) {
                $attendance->update(['need_makeup' => 1]);
            }
        }

        Flash::success('Attendance saved successfully.');

        $this->editable = false;
    }

    public function render()
    {
        $attendances = GroupSessionAttendance::where('group_session_id', $this->session_id)->get();

        return view('livewire.group-session-attendances.index', compact('attendances'));
    }
}