<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\University;
use Illuminate\Http\Request;
use Flash;
use Response;

class UniversityController extends AppBaseController
{
    /**
     * Display a listing of the University.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var University $universities */
        $universities = University::all();

        return view('universities.index')
            ->with('universities', $universities);
    }

    /**
     * Show the form for creating a new University.
     *
     * @return Response
     */
    public function create()
    {
        return view('universities.create');
    }

    /**
     * Store a newly created University in storage.
     *
     * @param CreateUniversityRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityRequest $request)
    {
        $input = $request->all();

        /** @var University $university */
        $university = University::create($input);

        Flash::success('University saved successfully.');

        return redirect(route('admin.universities.index'));
    }

    /**
     * Display the specified University.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var University $university */
        $university = University::find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('admin.universities.index'));
        }

        return view('universities.show')->with('university', $university);
    }

    /**
     * Show the form for editing the specified University.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var University $university */
        $university = University::find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('admin.universities.index'));
        }

        return view('universities.edit')->with('university', $university);
    }

    /**
     * Update the specified University in storage.
     *
     * @param int $id
     * @param UpdateUniversityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityRequest $request)
    {
        /** @var University $university */
        $university = University::find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('admin.universities.index'));
        }

        $university->fill($request->all());
        $university->save();

        Flash::success('University updated successfully.');

        return redirect(route('admin.universities.index'));
    }

    /**
     * Remove the specified University from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var University $university */
        $university = University::find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('admin.universities.index'));
        }

        $university->delete();

        Flash::success('University deleted successfully.');

        return redirect(route('admin.universities.index'));
    }
}
