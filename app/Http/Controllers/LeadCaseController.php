<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadCaseRequest;
use App\Http\Requests\UpdateLeadCaseRequest;
use App\Repositories\LeadCaseRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Branch;
use App\Models\Label;
use App\Models\LabelType;
use App\Models\Lead;
use App\Models\LeadCase;
use Illuminate\Http\Request;
use Flash;
use Response;

class LeadCaseController extends AppBaseController
{
    /** @var  LeadCaseRepository */
    private $leadCaseRepository;

    public function __construct(LeadCaseRepository $leadCaseRepo)
    {
        $this->leadCaseRepository = $leadCaseRepo;
    }

    /**
     * Display a listing of the LeadCase.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lead = Lead::find(request('lead'));

        $leadCases = LeadCase::where('lead_id', $lead->id)->get();

        return view('lead_cases.index', compact('leadCases', 'lead'));
    }

    /**
     * Show the form for creating a new LeadCase.
     *
     * @return Response
     */
    public function create()
    {
        $lead = Lead::find(request('lead'));
        $branches = Branch::pluck('name', 'id');
        $labels = Label::where('status', 1)->pluck('name', 'id');
        $labelTypes = LabelType::where('status', 1)->pluck('name', 'id');

        return view('lead_cases.create', compact('lead', 'branches', 'labels', 'labelTypes'));
    }

    /**
     * Store a newly created LeadCase in storage.
     *
     * @param CreateLeadCaseRequest $request
     *
     * @return Response
     */
    public function store(CreateLeadCaseRequest $request)
    {
        $input = $request->all();

        $input['employee_id'] = auth()->id();
        $input['serial'] = time();
        $leadCase = $this->leadCaseRepository->create($input);

        Flash::success('Lead Case saved successfully.');

        return redirect(route('admin.leadCases.index', ['lead' => request('lead_id')]));
    }

    /**
     * Display the specified LeadCase.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leadCase = $this->leadCaseRepository->find($id);

        if (empty($leadCase)) {
            Flash::error('Lead Case not found');

            return redirect(route('admin.leadCases.index'));
        }

        return view('lead_cases.show')->with('leadCase', $leadCase);
    }

    /**
     * Show the form for editing the specified LeadCase.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leadCase = $this->leadCaseRepository->find($id);

        if (empty($leadCase)) {
            Flash::error('Lead Case not found');

            return redirect(route('admin.leadCases.index'));
        }
        $lead = Lead::find(request('lead'));
        $branches = Branch::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');
        $labelTypes = LabelType::pluck('name', 'id');

        return view('lead_cases.edit', compact('leadCase', 'lead', 'branches', 'labels', 'labelTypes'));
    }

    /**
     * Update the specified LeadCase in storage.
     *
     * @param int $id
     * @param UpdateLeadCaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeadCaseRequest $request)
    {
        $leadCase = $this->leadCaseRepository->find($id);

        if (empty($leadCase)) {
            Flash::error('Lead Case not found');

            return redirect(route('admin.leadCases.index'));
        }

        $leadCase = $this->leadCaseRepository->update($request->all(), $id);

        Flash::success('Lead Case updated successfully.');

        return redirect(route('admin.leadCases.index', ['lead' => $leadCase->lead_id]));
    }

    /**
     * Remove the specified LeadCase from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leadCase = $this->leadCaseRepository->find($id);

        if (empty($leadCase)) {
            Flash::error('Lead Case not found');

            return redirect(route('admin.leadCases.index'));
        }

        $lead = $leadCase->lead_id;

        $this->leadCaseRepository->delete($id);

        Flash::success('Lead Case deleted successfully.');

        return redirect(route('admin.leadCases.index', ['lead' => $lead]));
    }

    /**
     * Get label types depending on label id.
     *
     * @return void
     */
    public function getLabelTypes()
    {
        if (request()->filled('label_id')) {
            $types = LabelType::where('label_id', request('label_id'))->get();

            return $types;
        }
    }
}
