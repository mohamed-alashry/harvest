<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoundRequest;
use App\Http\Requests\UpdateRoundRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Round;
use App\Models\ServiceFee;
use Illuminate\Http\Request;
use Flash;
use Response;

class RoundController extends AppBaseController
{
    /**
     * Display a listing of the Round.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Round $rounds */
        $rounds = Round::with('serviceFee.trainingService', 'serviceFee.timeframe')->withCount('subRounds')->get();

        return view('rounds.index')
            ->with('rounds', $rounds);
    }

    /**
     * Show the form for creating a new Round.
     *
     * @return Response
     */
    public function create()
    {
        $serviceFees = ServiceFee::with('trainingService', 'timeframe')->get();

        return view('rounds.create', compact('serviceFees'));
    }

    /**
     * Store a newly created Round in storage.
     *
     * @param CreateRoundRequest $request
     *
     * @return Response
     */
    public function store(CreateRoundRequest $request)
    {
        $input = $request->all();

        /** @var Round $round */
        $round = Round::create($input);

        Flash::success('Round saved successfully.');

        return redirect(route('admin.rounds.index'));
    }

    /**
     * Display the specified Round.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Round $round */
        $round = Round::with('serviceFee.trainingService', 'serviceFee.timeframe')->find($id);

        if (empty($round)) {
            Flash::error('Round not found');

            return redirect(route('admin.rounds.index'));
        }

        return view('rounds.show')->with('round', $round);
    }

    /**
     * Show the form for editing the specified Round.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Round $round */
        $round = Round::find($id);

        if (empty($round)) {
            Flash::error('Round not found');

            return redirect(route('admin.rounds.index'));
        }

        $serviceFees = ServiceFee::with('trainingService', 'timeframe')->get();

        return view('rounds.edit', compact('round', 'serviceFees'));
    }

    /**
     * Update the specified Round in storage.
     *
     * @param int $id
     * @param UpdateRoundRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoundRequest $request)
    {
        /** @var Round $round */
        $round = Round::find($id);

        if (empty($round)) {
            Flash::error('Round not found');

            return redirect(route('admin.rounds.index'));
        }

        $round->fill($request->all());
        $round->save();

        Flash::success('Round updated successfully.');

        return redirect(route('admin.rounds.index'));
    }

    /**
     * Remove the specified Round from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Round $round */
        $round = Round::find($id);

        if (empty($round)) {
            Flash::error('Round not found');

            return redirect(route('admin.rounds.index'));
        }

        $round->delete();

        Flash::success('Round deleted successfully.');

        return redirect(route('admin.rounds.index'));
    }
}
