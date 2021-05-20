<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIntervalRequest;
use App\Http\Requests\UpdateIntervalRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Interval;
use Illuminate\Http\Request;
use Flash;
use Response;

class IntervalController extends AppBaseController
{
    /**
     * Display a listing of the Interval.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Interval $intervals */
        $intervals = Interval::all();

        return view('intervals.index')
            ->with('intervals', $intervals);
    }

    /**
     * Show the form for creating a new Interval.
     *
     * @return Response
     */
    public function create()
    {
        return view('intervals.create');
    }

    /**
     * Store a newly created Interval in storage.
     *
     * @param CreateIntervalRequest $request
     *
     * @return Response
     */
    public function store(CreateIntervalRequest $request)
    {
        $input = $request->all();

        /** @var Interval $interval */
        $interval = Interval::create($input);

        Flash::success('Interval saved successfully.');

        return redirect(route('admin.intervals.index'));
    }

    /**
     * Display the specified Interval.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Interval $interval */
        $interval = Interval::find($id);

        if (empty($interval)) {
            Flash::error('Interval not found');

            return redirect(route('admin.intervals.index'));
        }

        return view('intervals.show')->with('interval', $interval);
    }

    /**
     * Show the form for editing the specified Interval.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Interval $interval */
        $interval = Interval::find($id);

        if (empty($interval)) {
            Flash::error('Interval not found');

            return redirect(route('admin.intervals.index'));
        }

        return view('intervals.edit')->with('interval', $interval);
    }

    /**
     * Update the specified Interval in storage.
     *
     * @param int $id
     * @param UpdateIntervalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntervalRequest $request)
    {
        /** @var Interval $interval */
        $interval = Interval::find($id);

        if (empty($interval)) {
            Flash::error('Interval not found');

            return redirect(route('admin.intervals.index'));
        }

        $interval->fill($request->all());
        $interval->save();

        Flash::success('Interval updated successfully.');

        return redirect(route('admin.intervals.index'));
    }

    /**
     * Remove the specified Interval from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Interval $interval */
        $interval = Interval::find($id);

        if (empty($interval)) {
            Flash::error('Interval not found');

            return redirect(route('admin.intervals.index'));
        }

        $interval->delete();

        Flash::success('Interval deleted successfully.');

        return redirect(route('admin.intervals.index'));
    }
}
