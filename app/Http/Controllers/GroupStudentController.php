<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Group;
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
        $group = Group::with('students.lead')->withCount('students')->find($id);

        if (empty($group)) {
            Flash::error('Group  not found');

            return redirect(route('admin.groups.index'));
        }

        return view('group_students.show')->with('group', $group);
    }
}
