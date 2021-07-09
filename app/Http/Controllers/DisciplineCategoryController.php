<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDisciplineCategoryRequest;
use App\Http\Requests\UpdateDisciplineCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\DisciplineCategory;
use App\Models\ExtraItem;
use Illuminate\Http\Request;
use Flash;
use Response;

class DisciplineCategoryController extends AppBaseController
{
    /**
     * Display a listing of the DisciplineCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var DisciplineCategory $disciplineCategories */
        $disciplineCategories = DisciplineCategory::all();

        return view('discipline_categories.index')
            ->with('disciplineCategories', $disciplineCategories);
    }

    /**
     * Show the form for creating a new DisciplineCategory.
     *
     * @return Response
     */
    public function create()
    {
        $items = ExtraItem::pluck('name', 'id');

        return view('discipline_categories.create', compact('items'));
    }

    /**
     * Store a newly created DisciplineCategory in storage.
     *
     * @param CreateDisciplineCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateDisciplineCategoryRequest $request)
    {
        $input = $request->all();

        /** @var DisciplineCategory $disciplineCategory */
        $disciplineCategory = DisciplineCategory::create($input);

        $disciplineCategory->items()->sync(request('items'));

        Flash::success('Discipline Category saved successfully.');

        return redirect(route('admin.disciplineCategories.index'));
    }

    /**
     * Display the specified DisciplineCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DisciplineCategory $disciplineCategory */
        $disciplineCategory = DisciplineCategory::find($id);

        if (empty($disciplineCategory)) {
            Flash::error('Discipline Category not found');

            return redirect(route('admin.disciplineCategories.index'));
        }

        return view('discipline_categories.show')->with('disciplineCategory', $disciplineCategory);
    }

    /**
     * Show the form for editing the specified DisciplineCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var DisciplineCategory $disciplineCategory */
        $disciplineCategory = DisciplineCategory::with('items')->find($id);

        if (empty($disciplineCategory)) {
            Flash::error('Discipline Category not found');

            return redirect(route('admin.disciplineCategories.index'));
        }

        $items = ExtraItem::pluck('name', 'id');

        return view('discipline_categories.edit', compact('disciplineCategory', 'items'));
    }

    /**
     * Update the specified DisciplineCategory in storage.
     *
     * @param int $id
     * @param UpdateDisciplineCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDisciplineCategoryRequest $request)
    {
        /** @var DisciplineCategory $disciplineCategory */
        $disciplineCategory = DisciplineCategory::find($id);

        if (empty($disciplineCategory)) {
            Flash::error('Discipline Category not found');

            return redirect(route('admin.disciplineCategories.index'));
        }

        $disciplineCategory->fill($request->all());
        $disciplineCategory->save();

        $disciplineCategory->items()->sync(request('items'));


        Flash::success('Discipline Category updated successfully.');

        return redirect(route('admin.disciplineCategories.index'));
    }

    /**
     * Remove the specified DisciplineCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DisciplineCategory $disciplineCategory */
        $disciplineCategory = DisciplineCategory::find($id);

        if (empty($disciplineCategory)) {
            Flash::error('Discipline Category not found');

            return redirect(route('admin.disciplineCategories.index'));
        }

        $disciplineCategory->delete();

        Flash::success('Discipline Category deleted successfully.');

        return redirect(route('admin.disciplineCategories.index'));
    }
}
