<?php

namespace App\Http\Livewire\Timeframes;

use App\Models\Interval;
use Livewire\Component;
use Laracasts\Flash\Flash;
use App\Models\Timeframe;

class Form extends Component
{
    public $timeframe,
        $title,
        $total_hours,
        $session_hours,
        $week_session,
        $days,
        $status,
        $intervals,
        $intervals_data = [],
        $preview = '';

    public function mount($timeframe = null)
    {
        if ($timeframe) {
            $this->fill([
                'title' => $timeframe->title,
                'total_hours' => $timeframe->total_hours,
                'session_hours' => $timeframe->session_hours,
                'week_session' => $timeframe->week_session,
                'days' => $timeframe->days,
                'status' => $timeframe->status,
                'intervals' => $timeframe->intervals->pluck('id'),
            ]);
        }
        $this->intervals_data = Interval::where('status', 1)->pluck('name', 'id');
    }

    protected function rules()
    {
        $rules = [
            'title' => 'required',
            'total_hours' => 'required|integer',
            'session_hours' => 'required|integer',
            'week_session' => 'required|integer',
            'days' => 'required|array',
            'status' => 'required',
            'intervals' => 'required|array',
        ];

        return $rules;
    }

    public function updated($name)
    {
        $this->validateOnly($name);

        if (in_array($name, ['total_hours', 'session_hours', 'week_session'])) {
            $this->calcPeriod();
        }
    }

    public function calcPeriod()
    {
        $total_hours = $this->total_hours;
        $session_hours = $this->session_hours;
        $week_session = $this->week_session;
        if ($total_hours && $session_hours && $week_session) {
            $weeks = round(($total_hours / $session_hours / $week_session), 1);
            $months = round(($total_hours / $session_hours / $week_session / 4), 1);
            $this->preview = "$weeks weeks or $months months";
        }
    }

    public function save()
    {
        $data = $this->validate();

        $timeframe = $this->timeframe;
        if ($timeframe) {
            $timeframe->update($data);
        } else {
            $timeframe = Timeframe::create($data);
        }

        $timeframe->intervals()->sync($data['intervals']);

        Flash::success('Timeframe saved successfully.');

        redirect(route('admin.timeframes.index'));
    }

    public function render()
    {
        return view('livewire.timeframes.form');
    }
}
