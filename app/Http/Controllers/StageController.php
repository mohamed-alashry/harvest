<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Stage;
use Illuminate\Http\Request;
use Flash;
use Response;

class StageController extends AppBaseController
{
    /**
     * Display a listing of the Stage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Stage $stages */
        $stages = Stage::all();

        return view('stages.index')
            ->with('stages', $stages);
    }

    /**
     * Show the form for creating a new Stage.
     *
     * @return Response
     */
    public function create()
    {
        return view('stages.create');
    }

    /**
     * Store a newly created Stage in storage.
     *
     * @param CreateStageRequest $request
     *
     * @return Response
     */
    public function store(CreateStageRequest $request)
    {
        $input = $request->all();

        /** @var Stage $stage */
        $stage = Stage::create($input);

        Flash::success('Stage saved successfully.');

        return redirect(route('admin.stages.index'));
    }

    /**
     * Display the specified Stage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Stage $stage */
        $stage = Stage::find($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('admin.stages.index'));
        }

        return view('stages.show')->with('stage', $stage);
    }

    /**
     * Show the form for editing the specified Stage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Stage $stage */
        $stage = Stage::find($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('admin.stages.index'));
        }

        return view('stages.edit')->with('stage', $stage);
    }

    /**
     * Update the specified Stage in storage.
     *
     * @param int $id
     * @param UpdateStageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStageRequest $request)
    {
        /** @var Stage $stage */
        $stage = Stage::find($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('admin.stages.index'));
        }

        $stage->fill($request->all());
        $stage->save();

        Flash::success('Stage updated successfully.');

        return redirect(route('admin.stages.index'));
    }

    /**
     * Remove the specified Stage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Stage $stage */
        $stage = Stage::find($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('admin.stages.index'));
        }

        $stage->delete();

        Flash::success('Stage deleted successfully.');

        return redirect(route('admin.stages.index'));
    }
}
