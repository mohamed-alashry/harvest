<?php

namespace App\Http\Livewire\Customers;

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
        $registration_from,
        $registration_to,
        $per_page = 10,
        $employeeBranches,
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

    public function render()
    {
        $leadsQuery = Lead::withCount('payments', 'cases')->with(['cases' => function ($query) {
            $query->orderBy('created_at', 'desc')->first();
        }])
            ->where('type', 2)
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
        if ($this->registration_from && $this->registration_to) {
            $leadsQuery->whereBetween('created_at', [$this->registration_from, $this->registration_to]);
        }

        $leads = $leadsQuery->paginate(10);

        return view('livewire.customers.index', compact('leads'));
    }
}
