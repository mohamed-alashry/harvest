<?php

namespace App\Http\Livewire\Leads;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\KnowChannel;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\Offer;
use App\Models\TrainingService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $leadSources,
        $knowChannels,
        $services,
        $offers,
        $branches,
        $agents,
        $show_filter = false,
        $lead_source,
        $know_channel,
        $time,
        $service,
        $offer,
        $branch,
        $gender,
        $agent,
        $test;

    public function mount()
    {
        $this->leadSources = LeadSource::pluck('name', 'id');
        $this->knowChannels = KnowChannel::pluck('name', 'id');
        $this->services = TrainingService::pluck('title', 'id');
        $this->offers = Offer::pluck('title', 'id');
        $this->branches = Branch::pluck('name', 'id');
        $this->agents = Employee::where('branch_id', auth()->user()->branch_id)->get()->pluck('name', 'id');
    }

    public function toggleFiletr()
    {
        $this->show_filter = !$this->show_filter;
    }

    public function render()
    {
        $leadsQuery = Lead::withCount('cases', 'payments')->where('branch_id', auth()->user()->branch_id);

        if ($this->lead_source) {
            $leadsQuery->where('lead_source_id', $this->lead_source);
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
        if ($this->gender) {
            $leadsQuery->where('gender', $this->gender);
        }
        if ($this->agent) {
            $leadsQuery->where('assigned_employee_id', $this->agent);
        }

        $leads = $leadsQuery->paginate(10);

        return view('livewire.leads.index', compact('leads'));
    }
}