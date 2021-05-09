<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLabelTypeRequest;
use App\Http\Requests\UpdateLabelTypeRequest;
use App\Repositories\LabelTypeRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Label;
use Illuminate\Http\Request;
use Flash;
use Response;

class LabelTypeController extends AppBaseController
{
    /** @var  LabelTypeRepository */
    private $labelTypeRepository;

    public function __construct(LabelTypeRepository $labelTypeRepo)
    {
        $this->labelTypeRepository = $labelTypeRepo;
    }

    /**
     * Display a listing of the LabelType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $labelTypes = $this->labelTypeRepository->all();

        return view('label_types.index')
            ->with('labelTypes', $labelTypes);
    }

    /**
     * Show the form for creating a new LabelType.
     *
     * @return Response
     */
    public function create()
    {
        $labels = Label::pluck('name', 'id');

        return view('label_types.create', compact('labels'));
    }

    /**
     * Store a newly created LabelType in storage.
     *
     * @param CreateLabelTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateLabelTypeRequest $request)
    {
        $input = $request->all();

        $labelType = $this->labelTypeRepository->create($input);

        Flash::success('Label Type saved successfully.');

        return redirect(route('admin.labelTypes.index'));
    }

    /**
     * Display the specified LabelType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $labelType = $this->labelTypeRepository->find($id);

        if (empty($labelType)) {
            Flash::error('Label Type not found');

            return redirect(route('admin.labelTypes.index'));
        }

        return view('label_types.show')->with('labelType', $labelType);
    }

    /**
     * Show the form for editing the specified LabelType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $labelType = $this->labelTypeRepository->find($id);

        if (empty($labelType)) {
            Flash::error('Label Type not found');

            return redirect(route('admin.labelTypes.index'));
        }
        $labels = Label::pluck('name', 'id');

        return view('label_types.edit', compact('labelType', 'labels'));
    }

    /**
     * Update the specified LabelType in storage.
     *
     * @param int $id
     * @param UpdateLabelTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLabelTypeRequest $request)
    {
        $labelType = $this->labelTypeRepository->find($id);

        if (empty($labelType)) {
            Flash::error('Label Type not found');

            return redirect(route('admin.labelTypes.index'));
        }

        $labelType = $this->labelTypeRepository->update($request->all(), $id);

        Flash::success('Label Type updated successfully.');

        return redirect(route('admin.labelTypes.index'));
    }

    /**
     * Remove the specified LabelType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $labelType = $this->labelTypeRepository->find($id);

        if (empty($labelType)) {
            Flash::error('Label Type not found');

            return redirect(route('admin.labelTypes.index'));
        }

        $this->labelTypeRepository->delete($id);

        Flash::success('Label Type deleted successfully.');

        return redirect(route('admin.labelTypes.index'));
    }
}
