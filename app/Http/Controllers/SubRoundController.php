<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubRoundRequest;
use App\Http\Requests\UpdateSubRoundRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\GroupSession;
use App\Models\Round;
use App\Models\SubRound;
use App\Models\Timeframe;
use ArrayObject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubRoundController extends AppBaseController
{
    /**
     * Display a listing of the SubRound.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SubRound $subRounds */
        $round = Round::find(request('round'));

        $subRounds = SubRound::where('round_id', $round->id)->paginate(10)->withQueryString();

        return view('sub_rounds.index', compact('subRounds', 'round'));
    }

    /**
     * Show the form for creating a new SubRound.
     *
     * @return Response
     */
    public function create()
    {
        $round = Round::with('timeframe')->find(request('round'));

        return view('sub_rounds.create', compact('round'));
    }

    /**
     * Store a newly created SubRound in storage.
     *
     * @param CreateSubRoundRequest $request
     *
     * @return Response
     */
    public function store(CreateSubRoundRequest $request)
    {
        $input = $request->all();

        /** @var SubRound $subRound */

        $timeframe = Round::with('timeframe')->find($input['round_id'])->timeframe;
        $total_hours = $timeframe->total_hours;
        $session_hours = $timeframe->session_hours;
        $session_count = ($total_hours / $session_hours) + 1;

        foreach ($input['subRounds'] as $subRoundData) {
            $n = 1;
            while ($n <= 10) {
                $startDate = Carbon::parse($subRoundData['start_date']);

                $subRound = SubRound::create([
                    'round_id' => $input['round_id'],
                    'days' => $subRoundData['days'],
                    'start_date' => $startDate,
                ]);

                $days = explode('/', config('system_variables.timeframes.days')[$subRoundData['days']]);
                $daysObj = new ArrayObject($days);
                $daysIt = $daysObj->getIterator();

                $date = $startDate;
                for ($i = 0; $i < $session_count; $i++) {
                    if ($i) {
                        if (!$daysIt->valid()) {
                            $daysIt->rewind();
                        }
                        $date = $date->next($daysIt->current());
                    }

                    $session = GroupSession::create([
                        'sub_round_id' => $subRound->id,
                        'date' => $date,
                    ]);

                    $daysIt->next();
                }

                $subRound->update(['end_date' => $session->date]);

                $n++;
            }
        }

        Flash::success('Sub Round saved successfully.');

        return redirect(route('admin.subRounds.index', ['round' => $input['round_id']]));
    }

    /**
     * Display the specified SubRound.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubRound $subRound */
        $subRound = SubRound::find($id);

        if (empty($subRound)) {
            Flash::error('Sub Round not found');

            return redirect(route('admin.subRounds.index'));
        }

        return view('sub_rounds.show')->with('subRound', $subRound);
    }

    /**
     * Show the form for editing the specified SubRound.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SubRound $subRound */
        $subRound = SubRound::find($id);

        if (empty($subRound)) {
            Flash::error('Sub Round not found');

            return redirect(route('admin.subRounds.index'));
        }

        $round = Round::with('timeframe')->find($subRound->round_id);

        return view('sub_rounds.edit', compact('subRound', 'round'));
    }

    /**
     * Update the specified SubRound in storage.
     *
     * @param int $id
     * @param UpdateSubRoundRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubRoundRequest $request)
    {
        /** @var SubRound $subRound */
        $subRound = SubRound::find($id);

        if (empty($subRound)) {
            Flash::error('Sub Round not found');

            return redirect(route('admin.subRounds.index'));
        }

        $subRound->fill($request->all());
        $subRound->save();

        Flash::success('Sub Round updated successfully.');

        return redirect(route('admin.subRounds.index', ['round' => $subRound->round_id]));
    }

    /**
     * Remove the specified SubRound from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubRound $subRound */
        $subRound = SubRound::find($id);

        if (empty($subRound)) {
            Flash::error('Sub Round not found');

            return redirect(route('admin.subRounds.index'));
        }

        $roundId = $subRound->round_id;

        $subRound->delete();

        Flash::success('Sub Round deleted successfully.');

        return redirect(route('admin.subRounds.index', ['round' => $roundId]));
    }
}
