<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKnowChannelRequest;
use App\Http\Requests\UpdateKnowChannelRequest;
use App\Repositories\KnowChannelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KnowChannelController extends AppBaseController
{
    /** @var  KnowChannelRepository */
    private $knowChannelRepository;

    public function __construct(KnowChannelRepository $knowChannelRepo)
    {
        $this->knowChannelRepository = $knowChannelRepo;
    }

    /**
     * Display a listing of the KnowChannel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $knowChannels = $this->knowChannelRepository->all();

        return view('know_channels.index')
            ->with('knowChannels', $knowChannels);
    }

    /**
     * Show the form for creating a new KnowChannel.
     *
     * @return Response
     */
    public function create()
    {
        return view('know_channels.create');
    }

    /**
     * Store a newly created KnowChannel in storage.
     *
     * @param CreateKnowChannelRequest $request
     *
     * @return Response
     */
    public function store(CreateKnowChannelRequest $request)
    {
        $input = $request->all();

        $knowChannel = $this->knowChannelRepository->create($input);

        Flash::success('Know Channel saved successfully.');

        return redirect(route('admin.knowChannels.index'));
    }

    /**
     * Display the specified KnowChannel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $knowChannel = $this->knowChannelRepository->find($id);

        if (empty($knowChannel)) {
            Flash::error('Know Channel not found');

            return redirect(route('admin.knowChannels.index'));
        }

        return view('know_channels.show')->with('knowChannel', $knowChannel);
    }

    /**
     * Show the form for editing the specified KnowChannel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $knowChannel = $this->knowChannelRepository->find($id);

        if (empty($knowChannel)) {
            Flash::error('Know Channel not found');

            return redirect(route('admin.knowChannels.index'));
        }

        return view('know_channels.edit')->with('knowChannel', $knowChannel);
    }

    /**
     * Update the specified KnowChannel in storage.
     *
     * @param int $id
     * @param UpdateKnowChannelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKnowChannelRequest $request)
    {
        $knowChannel = $this->knowChannelRepository->find($id);

        if (empty($knowChannel)) {
            Flash::error('Know Channel not found');

            return redirect(route('admin.knowChannels.index'));
        }

        $knowChannel = $this->knowChannelRepository->update($request->all(), $id);

        Flash::success('Know Channel updated successfully.');

        return redirect(route('admin.knowChannels.index'));
    }

    /**
     * Remove the specified KnowChannel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $knowChannel = $this->knowChannelRepository->find($id);

        if (empty($knowChannel)) {
            Flash::error('Know Channel not found');

            return redirect(route('admin.knowChannels.index'));
        }

        $this->knowChannelRepository->delete($id);

        Flash::success('Know Channel deleted successfully.');

        return redirect(route('admin.knowChannels.index'));
    }
}
