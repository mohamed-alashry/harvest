<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadSourceRequest;
use App\Http\Requests\UpdateLeadSourceRequest;
use App\Repositories\LeadSourceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LeadSourceController extends AppBaseController
{
    /** @var  LeadSourceRepository */
    private $leadSourceRepository;

    public function __construct(LeadSourceRepository $leadSourceRepo)
    {
        $this->leadSourceRepository = $leadSourceRepo;
    }

    /**
     * Display a listing of the LeadSource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $leadSources = $this->leadSourceRepository->all();

        return view('lead_sources.index')
            ->with('leadSources', $leadSources);
    }

    /**
     * Show the form for creating a new LeadSource.
     *
     * @return Response
     */
    public function create()
    {
        return view('lead_sources.create');
    }

    /**
     * Store a newly created LeadSource in storage.
     *
     * @param CreateLeadSourceRequest $request
     *
     * @return Response
     */
    public function store(CreateLeadSourceRequest $request)
    {
        $input = $request->all();

        $leadSource = $this->leadSourceRepository->create($input);

        Flash::success('Lead Source saved successfully.');

        return redirect(route('admin.leadSources.index'));
    }

    /**
     * Display the specified LeadSource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leadSource = $this->leadSourceRepository->find($id);

        if (empty($leadSource)) {
            Flash::error('Lead Source not found');

            return redirect(route('admin.leadSources.index'));
        }

        return view('lead_sources.show')->with('leadSource', $leadSource);
    }

    /**
     * Show the form for editing the specified LeadSource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leadSource = $this->leadSourceRepository->find($id);

        if (empty($leadSource)) {
            Flash::error('Lead Source not found');

            return redirect(route('admin.leadSources.index'));
        }

        return view('lead_sources.edit')->with('leadSource', $leadSource);
    }

    /**
     * Update the specified LeadSource in storage.
     *
     * @param int $id
     * @param UpdateLeadSourceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeadSourceRequest $request)
    {
        $leadSource = $this->leadSourceRepository->find($id);

        if (empty($leadSource)) {
            Flash::error('Lead Source not found');

            return redirect(route('admin.leadSources.index'));
        }

        $leadSource = $this->leadSourceRepository->update($request->all(), $id);

        Flash::success('Lead Source updated successfully.');

        return redirect(route('admin.leadSources.index'));
    }

    /**
     * Remove the specified LeadSource from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leadSource = $this->leadSourceRepository->find($id);

        if (empty($leadSource)) {
            Flash::error('Lead Source not found');

            return redirect(route('admin.leadSources.index'));
        }

        $this->leadSourceRepository->delete($id);

        Flash::success('Lead Source deleted successfully.');

        return redirect(route('admin.leadSources.index'));
    }
}
