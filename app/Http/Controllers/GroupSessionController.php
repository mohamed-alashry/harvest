<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\GroupSession;
use Illuminate\Http\Request;
use Flash;
use Response;

class GroupSessionController extends AppBaseController
{
    /**
     * Display a listing of the GroupSession.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $groupId = request('group');

        /** @var GroupSession $groupSessions */
        $groupSessions = GroupSession::where('group_id', $groupId)
            ->with('makeup')->withCount('attendances')->get();

        return view('group_sessions.index')
            ->with('groupSessions', $groupSessions);
    }

    /**
     * Display the specified GroupSession.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GroupSession $groupSession */
        $groupSession = GroupSession::with('group')->find($id);

        if (empty($groupSession)) {
            Flash::error('Group Session not found');

            return redirect(route('admin.groupSessions.index'));
        }

        return view('group_sessions.show')->with('groupSession', $groupSession);
    }

    /**
     * Show the form for editing the specified GroupSession.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var GroupSession $groupSession */
        $groupSession = GroupSession::find($id);

        if (empty($groupSession)) {
            Flash::error('Group Session not found');

            return redirect(route('admin.groupSessions.index'));
        }

        return view('group_sessions.edit')->with('groupSession', $groupSession);
    }
}
