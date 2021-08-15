<?php

namespace App\Http\Livewire\Leads;

use App\Models\Lead;
use App\Models\Offer;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Employee;
use App\Models\LeadSource;
use Laracasts\Flash\Flash;
use App\Models\KnowChannel;
use Livewire\WithPagination;
use App\Models\TrainingService;
use Illuminate\Database\Eloquent\Builder;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $leadSources,
        $mobile_1,
        $name,
        $case_from,
        $case_to,
        $knowChannels,
        $services,
        $offers,
        $branches,
        $agents,
        $show_filter = false,
        $show_assign = false,
        $shown_leads = [],
        $assign_leads = [],
        $assigned_employee,
        $lead_source,
        $know_channel,
        $time,
        $service,
        $offer,
        $branch,
        $agent;

    public function mount()
    {
        $this->leadSources = LeadSource::pluck('name', 'id');
        $this->knowChannels = KnowChannel::pluck('name', 'id');
        $this->services = TrainingService::pluck('title', 'id');
        $this->offers = Offer::pluck('title', 'id');
        $this->branches = Branch::where('id', auth()->user()->branch_id)->pluck('name', 'id');
        $this->agents = Employee::where('branch_id', auth()->user()->branch_id)->get()->pluck('name', 'id');
    }

    public function toggleFilter()
    {
        $this->show_filter = !$this->show_filter;
    }

    public function toggleAssign()
    {
        $this->show_assign = !$this->show_assign;
    }

    public function selectShownLeads()
    {
        $this->assign_leads = $this->shown_leads;
    }

    public function submitAssign()
    {
        $assignLeads = array_filter($this->assign_leads);
        if (!$this->assigned_employee) {
            Flash::error('Assigned Employee is required.');
        } elseif (count($assignLeads) > 0) {
            Lead::whereIn('id', $assignLeads)->update(['assigned_employee_id' => $this->assigned_employee]);

            $this->show_assign = false;
            $this->assign_leads = [];
            $this->assigned_employee = null;
        }
    }

    public function toCustomer($id)
    {
        $lead = Lead::find($id);

        $lead->update(['type' => 2]);

        Flash::success('Converted To Customer successfully.');
    }


    public function render()
    {
        $leadsQuery = Lead::withCount('cases', 'payments')
            ->where('type', 1)
            ->where('branch_id', auth()->user()->branch_id);

        if ($this->lead_source) {
            $leadsQuery->where('lead_source_id', $this->lead_source);
        }
        if ($this->mobile_1) {
            $leadsQuery->where('mobile_1', 'like', '%' . $this->mobile_1 . '%');
        }
        if ($this->name) {
            $leadsQuery->where('name', 'like', '%' . $this->name . '%');
        }
        if ($this->know_channel) {
            $leadsQuery->where('know_channel_id', $this->know_channel);
        }
        if ($this->time) {
            $leadsQuery->where('preferred_time', $this->time);
        }
        if ($this->service) {
            $leadsQuery->where('training_service_id', $this->service);
        }
        if ($this->offer) {
            $leadsQuery->where('offer_id', $this->offer);
        }
        if ($this->branch) {
            $leadsQuery->where('branch_id', $this->branch);
        }
        if ($this->agent) {
            $leadsQuery->where('assigned_employee_id', $this->agent);
        }
        if ($this->case_from && $this->case_to) {
            $leadsQuery->whereHas('cases', function (Builder $query) {
                $query->whereBetween('date', [$this->case_from, $this->case_to]);
            });
        }

        $leads = $leadsQuery->paginate(10);

        $this->shown_leads = $leads->pluck('id')->toArray();

        return view('livewire.leads.index', compact('leads'));
    }
}
