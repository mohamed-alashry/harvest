<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlacementQuestionRequest;
use App\Http\Requests\UpdatePlacementQuestionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\PlacementQuestion;
use Illuminate\Http\Request;
use Flash;
use Response;

class PlacementQuestionController extends AppBaseController
{
    /**
     * Display a listing of the PlacementQuestion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var PlacementQuestion $placementQuestions */
        $placementQuestions = PlacementQuestion::all();

        return view('placement_questions.index')
            ->with('placementQuestions', $placementQuestions);
    }

    /**
     * Show the form for creating a new PlacementQuestion.
     *
     * @return Response
     */
    public function create()
    {
        $parentQuestions = PlacementQuestion::whereNull('parent_id')->pluck('question', 'id');

        return view('placement_questions.create', compact('parentQuestions'));
    }

    /**
     * Store a newly created PlacementQuestion in storage.
     *
     * @param CreatePlacementQuestionRequest $request
     *
     * @return Response
     */
    public function store(CreatePlacementQuestionRequest $request)
    {
        $input = $request->all();

        /** @var PlacementQuestion $placementQuestion */
        $placementQuestion = PlacementQuestion::create($input);

        Flash::success('Placement Question saved successfully.');

        return redirect(route('admin.placementQuestions.index'));
    }

    /**
     * Display the specified PlacementQuestion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PlacementQuestion $placementQuestion */
        $placementQuestion = PlacementQuestion::find($id);

        if (empty($placementQuestion)) {
            Flash::error('Placement Question not found');

            return redirect(route('admin.placementQuestions.index'));
        }

        return view('placement_questions.show')->with('placementQuestion', $placementQuestion);
    }

    /**
     * Show the form for editing the specified PlacementQuestion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PlacementQuestion $placementQuestion */
        $placementQuestion = PlacementQuestion::find($id);

        if (empty($placementQuestion)) {
            Flash::error('Placement Question not found');

            return redirect(route('admin.placementQuestions.index'));
        }
        $parentQuestions = PlacementQuestion::whereNull('parent_id')->where('id', '!=', $id)->pluck('question', 'id');

        return view('placement_questions.edit', compact('placementQuestion', 'parentQuestions'));
    }

    /**
     * Update the specified PlacementQuestion in storage.
     *
     * @param int $id
     * @param UpdatePlacementQuestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlacementQuestionRequest $request)
    {
        /** @var PlacementQuestion $placementQuestion */
        $placementQuestion = PlacementQuestion::find($id);

        if (empty($placementQuestion)) {
            Flash::error('Placement Question not found');

            return redirect(route('admin.placementQuestions.index'));
        }

        $placementQuestion->fill($request->all());
        $placementQuestion->save();

        Flash::success('Placement Question updated successfully.');

        return redirect(route('admin.placementQuestions.index'));
    }

    /**
     * Remove the specified PlacementQuestion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PlacementQuestion $placementQuestion */
        $placementQuestion = PlacementQuestion::find($id);

        if (empty($placementQuestion)) {
            Flash::error('Placement Question not found');

            return redirect(route('admin.placementQuestions.index'));
        }

        $placementQuestion->delete();

        Flash::success('Placement Question deleted successfully.');

        return redirect(route('admin.placementQuestions.index'));
    }
}
