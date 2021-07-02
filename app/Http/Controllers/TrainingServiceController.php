<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrainingServiceRequest;
use App\Http\Requests\UpdateTrainingServiceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\TrainingService;
use Illuminate\Http\Request;
use Flash;
use Response;

class TrainingServiceController extends AppBaseController
{
    /**
     * Display a listing of the TrainingService.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var TrainingService $trainingServices */
        $trainingServices = TrainingService::all();

        return view('training_services.index')
            ->with('trainingServices', $trainingServices);
    }

    /**
     * Show the form for creating a new TrainingService.
     *
     * @return Response
     */
    public function create()
    {
        return view('training_services.create');
    }

    /**
     * Store a newly created TrainingService in storage.
     *
     * @param CreateTrainingServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateTrainingServiceRequest $request)
    {
        $input = $request->all();

        /** @var TrainingService $trainingService */
        $trainingService = TrainingService::create($input);

        Flash::success('TrainingService saved successfully.');

        return redirect(route('admin.trainingServices.index'));
    }

    /**
     * Display the specified TrainingService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TrainingService $trainingService */
        $trainingService = TrainingService::find($id);

        if (empty($trainingService)) {
            Flash::error('TrainingService not found');

            return redirect(route('admin.trainingServices.index'));
        }

        return view('training_services.show')->with('trainingService', $trainingService);
    }

    /**
     * Show the form for editing the specified TrainingService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var TrainingService $trainingService */
        $trainingService = TrainingService::find($id);

        if (empty($trainingService)) {
            Flash::error('TrainingService not found');

            return redirect(route('admin.trainingServices.index'));
        }

        return view('training_services.edit')->with('trainingService', $trainingService);
    }

    /**
     * Update the specified TrainingService in storage.
     *
     * @param int $id
     * @param UpdateTrainingServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrainingServiceRequest $request)
    {
        /** @var TrainingService $trainingService */
        $trainingService = TrainingService::find($id);

        if (empty($trainingService)) {
            Flash::error('TrainingService not found');

            return redirect(route('admin.trainingServices.index'));
        }

        $trainingService->fill($request->all());
        $trainingService->save();

        Flash::success('TrainingService updated successfully.');

        return redirect(route('admin.trainingServices.index'));
    }

    /**
     * Remove the specified TrainingService from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TrainingService $trainingService */
        $trainingService = TrainingService::find($id);

        if (empty($trainingService)) {
            Flash::error('TrainingService not found');

            return redirect(route('admin.trainingServices.index'));
        }

        $trainingService->delete();

        Flash::success('TrainingService deleted successfully.');

        return redirect(route('admin.trainingServices.index'));
    }
}
