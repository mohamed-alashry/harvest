<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Exam;
use Illuminate\Http\Request;
use Flash;
use Response;

class ExamController extends AppBaseController
{
    /**
     * Display a listing of the Exam.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Exam $exams */
        $exams = Exam::all();

        return view('exams.index')
            ->with('exams', $exams);
    }

    /**
     * Show the form for creating a new Exam.
     *
     * @return Response
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created Exam in storage.
     *
     * @param CreateExamRequest $request
     *
     * @return Response
     */
    public function store(CreateExamRequest $request)
    {
        $input = $request->all();

        /** @var Exam $exam */
        $exam = Exam::create($input);

        Flash::success('Exam saved successfully.');

        return redirect(route('admin.exams.index'));
    }

    /**
     * Display the specified Exam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Exam $exam */
        $exam = Exam::find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('admin.exams.index'));
        }

        return view('exams.show')->with('exam', $exam);
    }

    /**
     * Show the form for editing the specified Exam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Exam $exam */
        $exam = Exam::find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('admin.exams.index'));
        }

        return view('exams.edit')->with('exam', $exam);
    }

    /**
     * Update the specified Exam in storage.
     *
     * @param int $id
     * @param UpdateExamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExamRequest $request)
    {
        /** @var Exam $exam */
        $exam = Exam::find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('admin.exams.index'));
        }

        $exam->fill($request->all());
        $exam->save();

        Flash::success('Exam updated successfully.');

        return redirect(route('admin.exams.index'));
    }

    /**
     * Remove the specified Exam from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Exam $exam */
        $exam = Exam::find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('admin.exams.index'));
        }

        $exam->delete();

        Flash::success('Exam deleted successfully.');

        return redirect(route('admin.exams.index'));
    }
}
