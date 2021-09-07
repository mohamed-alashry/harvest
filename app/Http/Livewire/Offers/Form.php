<?php

namespace App\Http\Livewire\Offers;

use App\Models\Offer;
use App\Models\Track;
use Livewire\Component;
use App\Models\ExtraItem;
use App\Models\Timeframe;
use App\Models\ServiceFee;
use Laracasts\Flash\Flash;
use App\Models\Installment;
use App\Models\PaymentPlan;
use App\Models\DisciplineCategory;
use Illuminate\Database\Eloquent\Builder;

class Form extends Component
{
    public $offer,
        $paymentPlans,
        $disciplines_data,
        $items_data,
        $tracks,
        $courses = [],
        $timeframes,
        $services_data = [],
        $title,
        $fees,
        $start_date,
        $end_date,
        $track_id,
        $course_id,
        $timeframe_id,
        $payment_plan_id,
        $disciplines,
        $items,
        $services,
        $installment,
        $total_amount;

    public function mount($offer = null)
    {
        if ($offer) {
            $this->fill([
                'title' => $offer->title,
                'fees' => $offer->fees,
                'start_date' => $offer->start_date,
                'end_date' => $offer->end_date,
                'track_id' => $offer->track_id,
                'course_id' => $offer->course_id,
                'timeframe_id' => $offer->timeframe_id,
                'payment_plan_id' => $offer->payment_plan_id,
                'disciplines' => $offer->disciplines->pluck('id'),
                'items' => $offer->items->pluck('id'),
                'courses' => Track::where('parent_id', $offer->track_id)->pluck('title', 'id'),
                'services_data' => ServiceFee::whereHas('trainingService', function (Builder $query) use ($offer) {
                    $query->where('course_id', $offer->course_id);
                })->with('trainingService')->get()->pluck('trainingService.title', 'id'),
                'services' => $offer->services->pluck('id'),
                'installment' => $offer->installment,
                'total_amount' => $offer->items->sum('price') + $offer->services->sum('fees'),
            ]);
        }
        $this->tracks = Track::whereNull('parent_id')->where('status', 1)->pluck('title', 'id');
        $this->timeframes = Timeframe::where('status', 1)->pluck('title', 'id');
        $this->paymentPlans = PaymentPlan::where('status', 1)->pluck('title', 'id');
        $this->disciplines_data = DisciplineCategory::pluck('name', 'id');
        $this->items_data = ExtraItem::pluck('name', 'id');
        // $this->services_data = ServiceFee::with('trainingService')->get()->pluck('trainingService.title', 'id');
    }

    protected function rules()
    {
        $rules = [
            'title' => 'required',
            'fees' => 'required|integer',
            'start_date' => 'required',
            'end_date' => 'required',
            'track_id' => 'required',
            'course_id' => 'required',
            'timeframe_id' => 'required',
            'payment_plan_id' => 'required',
            'disciplines' => 'required|array',
            'items' => 'required|array',
            'services' => 'required|array',
        ];

        if ($this->payment_plan_id == 1) {
            $rules += [
                'installment.deposit' => 'required|integer',
                'installment.first_payment' => 'required|integer',
                'installment.first_due_date' => 'required',
                'installment.second_payment' => 'nullable|integer',
                'installment.second_due_date' => 'nullable',
                'installment.third_payment' => 'nullable|integer',
                'installment.third_due_date' => 'nullable',
                'installment.fourth_payment' => 'nullable|integer',
                'installment.fourth_due_date' => 'nullable',
            ];
        }

        return $rules;
    }

    public function updated($name)
    {
        $this->validateOnly($name);

        if (in_array($name, ['items', 'services'])) {
            $this->calcAmount();
        }
    }

    public function updatedTrackId($value)
    {
        $this->courses = Track::where('parent_id', $value)->pluck('title', 'id');
        $this->course_id = '';
    }

    public function updatedCourseId($value)
    {
        $this->services_data = ServiceFee::whereHas('trainingService', function (Builder $query) use ($value) {
            $query->where('course_id', $value);
        })->with('trainingService')->get()->pluck('trainingService.title', 'id');
    }

    public function calcAmount()
    {
        $items = $this->items;
        $services = $this->services;
        $total_amount = 0;
        if ($items) {
            $total_amount += ExtraItem::whereIn('id', $items)->sum('price');
        }
        if ($services) {
            $total_amount += ServiceFee::whereIn('id', $services)->sum('fees');
        }
        $this->total_amount = $total_amount;
    }

    public function save()
    {
        $data = $this->validate();

        $offer = $this->offer;
        if ($offer) {
            $offer->update($data);

            if ($this->payment_plan_id == 1) {
                $offer->installment()->update($data['installment']);
            }
        } else {
            $offer = Offer::create($data);

            if ($this->payment_plan_id == 1) {
                $data['installment']['installmentable_type'] = 'App\\Models\\Offer';
                $data['installment']['installmentable_id'] = $offer->id;
                Installment::create($data['installment']);
            }
        }

        $offer->disciplines()->sync($data['disciplines']);
        $offer->items()->sync($data['items']);
        $offer->services()->sync($data['services']);

        Flash::success('Extra Item saved successfully.');

        redirect(route('admin.offers.index'));
    }

    public function render()
    {
        return view('livewire.offers.form');
    }
}
