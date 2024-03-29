<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\KnowChannel;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\Offer;
use App\Models\Timeframe;
use App\Models\TrainingService;
use Illuminate\Http\Request;
use Flash;
use Response;

class LeadController extends AppBaseController
{
    /**
     * Display a listing of the Lead.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('leads.index');
    }

    /**
     * Show the form for creating a new Lead.
     *
     * @return Response
     */
    public function create()
    {
        $sources = LeadSource::pluck('name', 'id');
        $channels = KnowChannel::pluck('name', 'id');
        $offers = Offer::pluck('title', 'id');
        $branches = Branch::pluck('name', 'id');
        $services = TrainingService::pluck('title', 'id');
        $employees = Employee::get()->pluck('name', 'id');
        $timeframes = Timeframe::pluck('title', 'id');

        return view('leads.create', compact('sources', 'channels', 'offers', 'branches', 'services', 'employees', 'timeframes'));
    }

    /**
     * Store a newly created Lead in storage.
     *
     * @param CreateLeadRequest $request
     *
     * @return Response
     */
    public function store(CreateLeadRequest $request)
    {
        $input = $request->all();

        $input['assigned_employee_id'] = auth()->id();
        $lead = Lead::create($input);

        Flash::success('Lead saved successfully.');

        return redirect(route('admin.leadCases.create', ['lead' => $lead->id]));
    }

    /**
     * Display the specified Lead.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lead = Lead::find($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('admin.leads.index'));
        }

        return view('leads.show')->with('lead', $lead);
    }

    /**
     * Show the form for editing the specified Lead.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lead = Lead::find($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('admin.leads.index'));
        }
        $sources = LeadSource::pluck('name', 'id');
        $channels = KnowChannel::pluck('name', 'id');
        $offers = Offer::pluck('title', 'id');
        $branches = Branch::pluck('name', 'id');
        $services = TrainingService::pluck('title', 'id');
        $employees = Employee::get()->pluck('name', 'id');
        $timeframes = Timeframe::pluck('title', 'id');

        return view('leads.edit', compact('lead', 'sources', 'channels', 'offers', 'branches', 'services', 'employees', 'timeframes'));
    }

    /**
     * Update the specified Lead in storage.
     *
     * @param int $id
     * @param UpdateLeadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeadRequest $request)
    {
        $lead = Lead::find($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('admin.leads.index'));
        }

        $lead->update($request->all());

        Flash::success('Lead updated successfully.');

        return redirect(route('admin.leads.index'));
    }

    /**
     * Remove the specified Lead from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lead = Lead::find($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('admin.leads.index'));
        }

        $lead->delete();

        Flash::success('Lead deleted successfully.');

        return redirect(route('admin.leads.index'));
    }

    public function leadsAssign()
    {
        return null;
    }

    public function onlineLeads(Request $request)
    {
        return view('leads.index', ['online' => true]);
    }
}
