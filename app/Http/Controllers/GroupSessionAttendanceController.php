<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class GroupSessionAttendanceController extends AppBaseController
{
    /**
     * Display a listing of the GroupSessionAttendance.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('group_session_attendances.index');
    }
}
