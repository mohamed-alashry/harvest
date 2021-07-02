<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTimeframeRequest;
use App\Http\Requests\UpdateTimeframeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Timeframe;
use Illuminate\Http\Request;
use Flash;
use Response;

class TimeframeController extends AppBaseController
{
    /**
     * Display a listing of the Timeframe.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Timeframe $timeframes */
        $timeframes = Timeframe::all();

        return view('timeframes.index')
            ->with('timeframes', $timeframes);
    }

    /**
     * Show the form for creating a new Timeframe.
     *
     * @return Response
     */
    public function create()
    {
        return view('timeframes.create');
    }

    /**
     * Store a newly created Timeframe in storage.
     *
     * @param CreateTimeframeRequest $request
     *
     * @return Response
     */
    public function store(CreateTimeframeRequest $request)
    {
        $input = $request->all();

        /** @var Timeframe $timeframe */
        $timeframe = Timeframe::create($input);

        Flash::success('Timeframe saved successfully.');

        return redirect(route('admin.timeframes.index'));
    }

    /**
     * Display the specified Timeframe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Timeframe $timeframe */
        $timeframe = Timeframe::find($id);

        if (empty($timeframe)) {
            Flash::error('Timeframe not found');

            return redirect(route('admin.timeframes.index'));
        }

        return view('timeframes.show')->with('timeframe', $timeframe);
    }

    /**
     * Show the form for editing the specified Timeframe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Timeframe $timeframe */
        $timeframe = Timeframe::find($id);

        if (empty($timeframe)) {
            Flash::error('Timeframe not found');

            return redirect(route('admin.timeframes.index'));
        }

        return view('timeframes.edit')->with('timeframe', $timeframe);
    }

    /**
     * Update the specified Timeframe in storage.
     *
     * @param int $id
     * @param UpdateTimeframeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTimeframeRequest $request)
    {
        /** @var Timeframe $timeframe */
        $timeframe = Timeframe::find($id);

        if (empty($timeframe)) {
            Flash::error('Timeframe not found');

            return redirect(route('admin.timeframes.index'));
        }

        $timeframe->fill($request->all());
        $timeframe->save();

        Flash::success('Timeframe updated successfully.');

        return redirect(route('admin.timeframes.index'));
    }

    /**
     * Remove the specified Timeframe from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Timeframe $timeframe */
        $timeframe = Timeframe::find($id);

        if (empty($timeframe)) {
            Flash::error('Timeframe not found');

            return redirect(route('admin.timeframes.index'));
        }

        $timeframe->delete();

        Flash::success('Timeframe deleted successfully.');

        return redirect(route('admin.timeframes.index'));
    }
}
