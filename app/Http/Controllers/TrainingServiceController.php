<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrainingServiceRequest;
use App\Http\Requests\UpdateTrainingServiceRequest;
use App\Repositories\TrainingServiceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TrainingServiceController extends AppBaseController
{
    /** @var  TrainingServiceRepository */
    private $trainingServiceRepository;

    public function __construct(TrainingServiceRepository $trainingServiceRepo)
    {
        $this->trainingServiceRepository = $trainingServiceRepo;
    }

    /**
     * Display a listing of the TrainingService.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $trainingServices = $this->trainingServiceRepository->all();

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

        $trainingService = $this->trainingServiceRepository->create($input);

        Flash::success('Training Service saved successfully.');

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
        $trainingService = $this->trainingServiceRepository->find($id);

        if (empty($trainingService)) {
            Flash::error('Training Service not found');

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
        $trainingService = $this->trainingServiceRepository->find($id);

        if (empty($trainingService)) {
            Flash::error('Training Service not found');

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
        $trainingService = $this->trainingServiceRepository->find($id);

        if (empty($trainingService)) {
            Flash::error('Training Service not found');

            return redirect(route('admin.trainingServices.index'));
        }

        $trainingService = $this->trainingServiceRepository->update($request->all(), $id);

        Flash::success('Training Service updated successfully.');

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
        $trainingService = $this->trainingServiceRepository->find($id);

        if (empty($trainingService)) {
            Flash::error('Training Service not found');

            return redirect(route('admin.trainingServices.index'));
        }

        $this->trainingServiceRepository->delete($id);

        Flash::success('Training Service deleted successfully.');

        return redirect(route('admin.trainingServices.index'));
    }
}
