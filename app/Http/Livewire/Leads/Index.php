<?php

namespace App\Http\Livewire\Leads;

use App\Models\Lead;
use App\Models\Offer;
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
        $registration_from,
        $registration_to,
        $knowChannels,
        $services,
        $offers,
        $feedback,
        $per_page = 10,
        $branches,
        $employeeBranches,
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
        $this->leadSources = LeadSource::pluck('name', 'id')->toArray();
        $this->knowChannels = KnowChannel::pluck('name', 'id')->toArray();
        $this->services = TrainingService::pluck('title', 'id')->toArray();
        $this->offers = Offer::pluck('title', 'id')->toArray();
        $employeeBranches = auth()->user()->branches->pluck('name', 'id')->toArray();
        $this->branches = $employeeBranches;
        $this->employeeBranches = $employeeBranches;
        $this->agents = Employee::whereHas('branches', function (Builder $query) use ($employeeBranches) {
            $query->whereIn('id', array_keys($employeeBranches));
        })->get()->pluck('name', 'id')->toArray();
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

    public function render()
    {
        $leadsQuery = Lead::withCount('cases')->with(['cases' => function ($query) {
            $query->orderBy('created_at', 'desc')->first();
        }])
            ->where('type', 1)
            ->whereIn('branch_id', array_keys($this->employeeBranches));

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
        if ($this->feedback || ($this->case_from && $this->case_to)) {
            $leadsQuery->whereHas('cases', function (Builder $query) {
                if ($this->case_from && $this->case_to) {
                    $query->whereBetween('date', [$this->case_from, $this->case_to]);
                }
                if ($this->feedback) {
                    $query->where('feedback', $this->feedback);
                }
            });
        }
        if ($this->registration_from && $this->registration_to) {
            $leadsQuery->whereBetween('created_at', [$this->registration_from, $this->registration_to]);
        }

        $leads = $leadsQuery->latest()->paginate($this->per_page);

        $this->shown_leads = $leads->pluck('id')->toArray();

        return view('livewire.leads.index', compact('leads'));
    }
}
