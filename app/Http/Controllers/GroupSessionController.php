<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupSessionRequest;
use App\Http\Requests\UpdateGroupSessionRequest;
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
        /** @var GroupSession $groupSessions */
        $groupSessions = GroupSession::paginate(10);

        return view('group_sessions.index')
            ->with('groupSessions', $groupSessions);
    }

    /**
     * Show the form for creating a new GroupSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('group_sessions.create');
    }

    /**
     * Store a newly created GroupSession in storage.
     *
     * @param CreateGroupSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupSessionRequest $request)
    {
        $input = $request->all();

        /** @var GroupSession $groupSession */
        $groupSession = GroupSession::create($input);

        Flash::success('Group Session saved successfully.');

        return redirect(route('admin.groupSessions.index'));
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
        $groupSession = GroupSession::find($id);

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

    /**
     * Update the specified GroupSession in storage.
     *
     * @param int $id
     * @param UpdateGroupSessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupSessionRequest $request)
    {
        /** @var GroupSession $groupSession */
        $groupSession = GroupSession::find($id);

        if (empty($groupSession)) {
            Flash::error('Group Session not found');

            return redirect(route('admin.groupSessions.index'));
        }

        $groupSession->fill($request->all());
        $groupSession->save();

        Flash::success('Group Session updated successfully.');

        return redirect(route('admin.groupSessions.index'));
    }

    /**
     * Remove the specified GroupSession from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GroupSession $groupSession */
        $groupSession = GroupSession::find($id);

        if (empty($groupSession)) {
            Flash::error('Group Session not found');

            return redirect(route('admin.groupSessions.index'));
        }

        $groupSession->delete();

        Flash::success('Group Session deleted successfully.');

        return redirect(route('admin.groupSessions.index'));
    }
}
