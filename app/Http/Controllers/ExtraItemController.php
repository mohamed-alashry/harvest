<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\ExtraItem;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

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
        return view('extra_items.create');
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

        return view('extra_items.edit', compact('extraItem'));
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
