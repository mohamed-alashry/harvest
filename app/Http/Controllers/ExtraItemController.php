<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\ExtraItem;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateExtraItemRequest;
use App\Http\Requests\UpdateExtraItemRequest;

class ExtraItemController extends AppBaseController
{
    /**
     * Display a listing of the ExtraItem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var ExtraItem $extraItems */
        $extraItems = ExtraItem::all();

        return view('extra_items.index')
            ->with('extraItems', $extraItems);
    }

    /**
     * Show the form for creating a new ExtraItem.
     *
     * @return Response
     */
    public function create()
    {
        $categories = ItemCategory::pluck('name', 'id');
        $paymentMethods = PaymentMethod::pluck('title', 'id');

        return view('extra_items.create', compact('categories', 'paymentMethods'));
    }

    /**
     * Store a newly created ExtraItem in storage.
     *
     * @param CreateExtraItemRequest $request
     *
     * @return Response
     */
    public function store(CreateExtraItemRequest $request)
    {
        $input = $request->all();

        /** @var ExtraItem $extraItem */
        $extraItem = ExtraItem::create($input);

        Flash::success('Extra Item saved successfully.');

        return redirect(route('admin.extraItems.index'));
    }

    /**
     * Display the specified ExtraItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ExtraItem $extraItem */
        $extraItem = ExtraItem::find($id);

        if (empty($extraItem)) {
            Flash::error('Extra Item not found');

            return redirect(route('admin.extraItems.index'));
        }

        return view('extra_items.show')->with('extraItem', $extraItem);
    }

    /**
     * Show the form for editing the specified ExtraItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ExtraItem $extraItem */
        $extraItem = ExtraItem::find($id);

        if (empty($extraItem)) {
            Flash::error('Extra Item not found');

            return redirect(route('admin.extraItems.index'));
        }

        $categories = ItemCategory::pluck('name', 'id');
        $paymentMethods = PaymentMethod::pluck('title', 'id');

        return view('extra_items.edit', compact('extraItem', 'categories', 'paymentMethods'));
    }

    /**
     * Update the specified ExtraItem in storage.
     *
     * @param int $id
     * @param UpdateExtraItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExtraItemRequest $request)
    {
        /** @var ExtraItem $extraItem */
        $extraItem = ExtraItem::find($id);

        if (empty($extraItem)) {
            Flash::error('Extra Item not found');

            return redirect(route('admin.extraItems.index'));
        }

        $extraItem->fill($request->all());
        $extraItem->save();

        Flash::success('Extra Item updated successfully.');

        return redirect(route('admin.extraItems.index'));
    }

    /**
     * Remove the specified ExtraItem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ExtraItem $extraItem */
        $extraItem = ExtraItem::find($id);

        if (empty($extraItem)) {
            Flash::error('Extra Item not found');

            return redirect(route('admin.extraItems.index'));
        }

        $extraItem->delete();

        Flash::success('Extra Item deleted successfully.');

        return redirect(route('admin.extraItems.index'));
    }
}
