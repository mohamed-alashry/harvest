<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Track;
use Illuminate\Http\Request;
use Flash;
use Response;

class CourseController extends AppBaseController
{
    /**
     * Display a listing of the Track.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Track $courses */
        $courses = Track::whereNotNull('parent_id')->get();

        return view('courses.index')
            ->with('courses', $courses);
    }

    /**
     * Show the form for creating a new Track.
     *
     * @return Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Display the specified Track.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Track $course */
        $course = Track::with('stages.levels')->find($id);

        if (empty($course)) {
            Flash::error('Track not found');

            return redirect(route('admin.courses.index'));
        }

        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified Track.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Track $course */
        $course = Track::with('stages.levels')->find($id);

        if (empty($course)) {
            Flash::error('Track not found');

            return redirect(route('admin.courses.index'));
        }

        return view('courses.edit')->with('course', $course);
    }

    /**
     * Remove the specified Track from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Track $course */
        $course = Track::find($id);

        if (empty($course)) {
            Flash::error('Track not found');

            return redirect(route('admin.courses.index'));
        }

        $course->delete();

        Flash::success('Track deleted successfully.');

        return redirect(route('admin.courses.index'));
    }
}
