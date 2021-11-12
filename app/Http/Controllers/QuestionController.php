<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Question;
use Illuminate\Http\Request;
use Flash;
use Response;

class QuestionController extends AppBaseController
{
    /**
     * Display a listing of the Question.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Question $questions */
        $questions = Question::whereNotIn('id', function ($query) {
            $query->select('id')->from('questions')
                ->where('skill', 'Writing')->whereNotNull('parent_id');
        })->get();

        return view('questions.index')
            ->with('questions', $questions);
    }

    /**
     * Show the form for creating a new Question.
     *
     * @return Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Display the specified Question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Question $question */
        $question = Question::find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('admin.questions.index'));
        }

        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified Question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Question $question */
        $question = Question::find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('admin.questions.index'));
        }

        return view('questions.edit')->with('question', $question);
    }

    /**
     * Remove the specified Question from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Question $question */
        $question = Question::find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('admin.questions.index'));
        }

        $question->delete();

        Flash::success('Question deleted successfully.');

        return redirect(route('admin.questions.index'));
    }
}
