<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Branch;
use App\Models\Room;
use Illuminate\Http\Request;
use Flash;
use Response;

class RoomController extends AppBaseController
{
    /**
     * Display a listing of the Room.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Room $rooms */
        $rooms = Room::all();

        return view('rooms.index')
            ->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new Room.
     *
     * @return Response
     */
    public function create()
    {
        $branches = Branch::pluck('name', 'id');

        return view('rooms.create', compact('branches'));
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param CreateRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomRequest $request)
    {
        $input = $request->all();

        /** @var Room $room */
        $room = Room::create($input);

        Flash::success('Room saved successfully.');

        return redirect(route('admin.rooms.index'));
    }

    /**
     * Display the specified Room.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Room $room */
        $room = Room::find($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('admin.rooms.index'));
        }

        return view('rooms.show')->with('room', $room);
    }

    /**
     * Show the form for editing the specified Room.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Room $room */
        $room = Room::find($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('admin.rooms.index'));
        }
        $branches = Branch::pluck('name', 'id');

        return view('rooms.edit', compact('room', 'branches'));
    }

    /**
     * Update the specified Room in storage.
     *
     * @param int $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomRequest $request)
    {
        /** @var Room $room */
        $room = Room::find($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('admin.rooms.index'));
        }

        $room->fill($request->all());
        $room->save();

        Flash::success('Room updated successfully.');

        return redirect(route('admin.rooms.index'));
    }

    /**
     * Remove the specified Room from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Room $room */
        $room = Room::find($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('admin.rooms.index'));
        }

        $room->delete();

        Flash::success('Room deleted successfully.');

        return redirect(route('admin.rooms.index'));
    }
}
