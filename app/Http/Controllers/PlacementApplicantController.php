<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Mail\PlacementTestResult;
use App\Models\PlacementApplicant;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePlacementApplicantRequest;
use App\Http\Requests\UpdatePlacementApplicantRequest;

class PlacementApplicantController extends AppBaseController
{
    /**
     * Display a listing of the PlacementApplicant.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var PlacementApplicant $placementApplicants */
        $placementApplicants = PlacementApplicant::all();

        return view('placement_applicants.index')
            ->with('placementApplicants', $placementApplicants);
    }

    /**
     * Show the form for creating a new PlacementApplicant.
     *
     * @return Response
     */
    public function create()
    {
        return view('placement_applicants.create');
    }

    /**
     * Store a newly created PlacementApplicant in storage.
     *
     * @param CreatePlacementApplicantRequest $request
     *
     * @return Response
     */
    public function store(CreatePlacementApplicantRequest $request)
    {
        $input = $request->all();

        /** @var PlacementApplicant $placementApplicant */
        $placementApplicant = PlacementApplicant::create($input);

        Flash::success('Placement Applicant saved successfully.');

        return redirect(route('admin.placementApplicants.index'));
    }

    /**
     * Display the specified PlacementApplicant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PlacementApplicant $placementApplicant */
        $placementApplicant = PlacementApplicant::find($id);

        if (empty($placementApplicant)) {
            Flash::error('Placement Applicant not found');

            return redirect(route('admin.placementApplicants.index'));
        }

        return view('placement_applicants.show')->with('placementApplicant', $placementApplicant);
    }

    /**
     * Show the form for editing the specified PlacementApplicant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PlacementApplicant $placementApplicant */
        $placementApplicant = PlacementApplicant::with('answers')->find($id);

        if (empty($placementApplicant)) {
            Flash::error('Placement Applicant not found');

            return redirect(route('admin.placementApplicants.index'));
        }

        return view('placement_applicants.edit')->with('placementApplicant', $placementApplicant);
    }

    /**
     * Update the specified PlacementApplicant in storage.
     *
     * @param int $id
     * @param UpdatePlacementApplicantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlacementApplicantRequest $request)
    {
        /** @var PlacementApplicant $placementApplicant */
        $placementApplicant = PlacementApplicant::find($id);

        if (empty($placementApplicant)) {
            Flash::error('Placement Applicant not found');

            return redirect(route('admin.placementApplicants.index'));
        }

        $placementApplicant->fill($request->all());
        $placementApplicant->save();

        Flash::success('Placement Applicant updated successfully.');

        return redirect(route('admin.placementApplicants.index'));
    }

    /**
     * Remove the specified PlacementApplicant from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PlacementApplicant $placementApplicant */
        $placementApplicant = PlacementApplicant::find($id);

        if (empty($placementApplicant)) {
            Flash::error('Placement Applicant not found');

            return redirect(route('admin.placementApplicants.index'));
        }

        $placementApplicant->delete();

        Flash::success('Placement Applicant deleted successfully.');

        return redirect(route('admin.placementApplicants.index'));
    }

    /**
     * Display the specified PlacementApplicant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function sendMail($id)
    {
        /** @var PlacementApplicant $placementApplicant */
        $placementApplicant = PlacementApplicant::find($id);

        if (empty($placementApplicant)) {
            Flash::error('Placement Applicant not found');

            return redirect(route('admin.placementApplicants.index'));
        }

        Mail::to($placementApplicant)->send(new PlacementTestResult($placementApplicant));

        Flash::success('Mail sent successfully.');

        return redirect(route('admin.placementApplicants.index'));
    }
}
