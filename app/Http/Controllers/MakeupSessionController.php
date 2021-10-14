<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMakeupSessionRequest;
use App\Http\Requests\UpdateMakeupSessionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Models\GroupSession;
use App\Models\MakeupSession;
use App\Models\Room;
use Illuminate\Http\Request;
use Flash;
use Response;

class MakeupSessionController extends AppBaseController
{
    /**
     * Display a listing of the MakeupSession.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var MakeupSession $makeupSessions */
        $makeupSessions = MakeupSession::paginate(10);

        return view('makeup_sessions.index')
            ->with('makeupSessions', $makeupSessions);
    }

    /**
     * Show the form for creating a new MakeupSession.
     *
     * @return Response
     */
    public function create()
    {
        $groupSession = GroupSession::with('group')->find(request('session'));
        $rooms = Room::where('branch_id', $groupSession->group->branch_id)->pluck('name', 'id');
        $instructors = Employee::get()->pluck('name', 'id');

        return view('makeup_sessions.create', compact('groupSession', 'rooms', 'instructors'));
    }

    /**
     * Store a newly created MakeupSession in storage.
     *
     * @param CreateMakeupSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateMakeupSessionRequest $request)
    {
        $input = $request->all();

        /** @var MakeupSession $makeupSession */
        $makeupSession = MakeupSession::create($input);

        Flash::success('Make Session saved successfully.');

        return redirect(route('admin.makeupSessions.index'));
    }

    /**
     * Display the specified MakeupSession.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MakeupSession $makeupSession */
        $makeupSession = MakeupSession::with('attendances.lead')->find($id);

        if (empty($makeupSession)) {
            Flash::error('Make Session not found');

            return redirect(route('admin.makeupSessions.index'));
        }

        return view('makeup_sessions.show')->with('makeupSession', $makeupSession);
    }

    /**
     * Show the form for editing the specified MakeupSession.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var MakeupSession $makeupSession */
        $makeupSession = MakeupSession::find($id);

        if (empty($makeupSession)) {
            Flash::error('Make Session not found');

            return redirect(route('admin.makeupSessions.index'));
        }
        $groupSession = GroupSession::with('group')->find($makeupSession->group_session_id);
        $rooms = Room::where('branch_id', $groupSession->group->branch_id)->pluck('name', 'id');
        $instructors = Employee::get()->pluck('name', 'id');

        return view('makeup_sessions.edit', compact('makeupSession', 'groupSession', 'rooms', 'instructors'));
    }

    /**
     * Update the specified MakeupSession in storage.
     *
     * @param int $id
     * @param UpdateMakeupSessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMakeupSessionRequest $request)
    {
        /** @var MakeupSession $makeupSession */
        $makeupSession = MakeupSession::find($id);

        if (empty($makeupSession)) {
            Flash::error('Make Session not found');

            return redirect(route('admin.makeupSessions.index'));
        }

        $makeupSession->fill($request->all());
        $makeupSession->save();

        Flash::success('Make Session updated successfully.');

        return redirect(route('admin.makeupSessions.index'));
    }

    /**
     * Remove the specified MakeupSession from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MakeupSession $makeupSession */
        $makeupSession = MakeupSession::find($id);

        if (empty($makeupSession)) {
            Flash::error('Make Session not found');

            return redirect(route('admin.makeupSessions.index'));
        }

        $makeupSession->delete();

        Flash::success('Make Session deleted successfully.');

        return redirect(route('admin.makeupSessions.index'));
    }
}
