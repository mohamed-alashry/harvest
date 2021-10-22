<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Group;
use App\Models\GroupSession;
use Illuminate\Http\Request;
use Flash;
use Response;

class GroupStudentController extends AppBaseController
{
    /**
     * Display the specified Group.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Group $group */
        $group = Group::with('students.lead')->withCount('students', 'sessions')->find($id);
        $pastSessions = GroupSession::where('group_id', $group->id)->where('status', '!=', 1)->count();

        if (empty($group)) {
            Flash::error('Group  not found');

            return redirect(route('admin.groups.index'));
        }

        return view('group_students.show', compact('group', 'pastSessions'));
    }
}
