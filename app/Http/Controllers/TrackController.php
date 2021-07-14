<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Track;
use Illuminate\Http\Request;
use Flash;
use Response;

class TrackController extends AppBaseController
{
    /**
     * Display a listing of the Track.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Track $tracks */
        $tracks = Track::whereNull('parent_id')->get();

        return view('tracks.index')
            ->with('tracks', $tracks);
    }

    /**
     * Show the form for creating a new Track.
     *
     * @return Response
     */
    public function create()
    {
        return view('tracks.create');
    }

    /**
     * Store a newly created Track in storage.
     *
     * @param CreateTrackRequest $request
     *
     * @return Response
     */
    public function store(CreateTrackRequest $request)
    {
        $input = $request->all();

        /** @var Track $track */
        $track = Track::create($input);

        Flash::success('Track saved successfully.');

        return redirect(route('admin.tracks.index'));
    }

    /**
     * Display the specified Track.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Track $track */
        $track = Track::find($id);

        if (empty($track)) {
            Flash::error('Track not found');

            return redirect(route('admin.tracks.index'));
        }

        return view('tracks.show')->with('track', $track);
    }

    /**
     * Show the form for editing the specified Track.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Track $track */
        $track = Track::find($id);

        if (empty($track)) {
            Flash::error('Track not found');

            return redirect(route('admin.tracks.index'));
        }

        return view('tracks.edit')->with('track', $track);
    }

    /**
     * Update the specified Track in storage.
     *
     * @param int $id
     * @param UpdateTrackRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrackRequest $request)
    {
        /** @var Track $track */
        $track = Track::find($id);

        if (empty($track)) {
            Flash::error('Track not found');

            return redirect(route('admin.tracks.index'));
        }

        $track->fill($request->all());
        $track->save();

        Flash::success('Track updated successfully.');

        return redirect(route('admin.tracks.index'));
    }

    /**
     * Remove the specified Track from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Track $track */
        $track = Track::find($id);

        if (empty($track)) {
            Flash::error('Track not found');

            return redirect(route('admin.tracks.index'));
        }

        $track->delete();

        Flash::success('Track deleted successfully.');

        return redirect(route('admin.tracks.index'));
    }
}
