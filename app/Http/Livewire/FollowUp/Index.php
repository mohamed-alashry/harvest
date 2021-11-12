<?php

namespace App\Http\Livewire\FollowUp;

use App\Models\Lead;
use App\Models\Offer;
use Livewire\Component;
use App\Models\Employee;
use App\Models\LeadCase;
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
        $knowChannels,
        $services,
        $offers,
        $per_page = 10,
        $branches,
        $employeeBranches,
        $agents,
        $show_filter = false,
        $search,
        $feedback,
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

    public function newFollowUp($id)
    {
        $followup = LeadCase::find($id);
        $followup->update(['status' => 1]);

        redirect(route('admin.leadCases.create', ['lead' => $followup->lead_id, 'type' => $followup->type]));
    }

    public function render()
    {
        $leadsQuery = Lead::query();

        if ($this->lead_source) {
            $leadsQuery->where('lead_source_id', $this->lead_source);
        }
        if ($this->search) {
            $leadsQuery->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile_1', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
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

        $leadsId = $leadsQuery->pluck('id')->toArray();

        $followupsQuery = LeadCase::where('employee_id', auth()->id())
            ->whereIn('lead_id', $leadsId)
            ->where('status', 0)
            ->whereDate('date', '<=', now())
            ->with('lead');

        if ($this->feedback) {
            $followupsQuery->where('feedback', $this->feedback);
        }

        $followups = $followupsQuery->paginate($this->per_page);

        return view('livewire.follow-up.index', compact('followups'));
    }
}
