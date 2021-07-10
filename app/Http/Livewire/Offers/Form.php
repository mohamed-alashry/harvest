<?php

namespace App\Http\Livewire\Offers;

use App\Models\Offer;
use Livewire\Component;
use App\Models\ExtraItem;
use App\Models\ServiceFee;
use Laracasts\Flash\Flash;
use App\Models\Installment;
use App\Models\PaymentMethod;
use App\Models\DisciplineCategory;

class Form extends Component
{
    public $offer,
        $paymentMethods,
        $disciplines_data,
        $items_data,
        $services_data,
        $dueDates,
        $title,
        $fees,
        $start_date,
        $end_date,
        $payment_method_id,
        $disciplines,
        $items,
        $services,
        $installment;

    public function mount($offer = null)
    {
        if ($offer) {
            $this->fill([
                'title' => $offer->title,
                'fees' => $offer->fees,
                'start_date' => $offer->start_date,
                'end_date' => $offer->end_date,
                'payment_method_id' => $offer->payment_method_id,
                'disciplines' => $offer->disciplines->pluck('id'),
                'items' => $offer->items->pluck('id'),
                'services' => $offer->services->pluck('id'),
                'installment' => $offer->installment,
            ]);
        }
        $this->paymentMethods = PaymentMethod::where('status', 1)->pluck('title', 'id');
        $this->disciplines_data = DisciplineCategory::pluck('name', 'id');
        $this->items_data = ExtraItem::pluck('name', 'id');
        $this->services_data = ServiceFee::with('trainingService')->get()->pluck('trainingService.title', 'id');
        $this->dueDates = [
            1 => '1 Month',
            2 => '2 Months',
            3 => '3 Months',
            4 => '4 Months',
            5 => '5 Months',
            6 => '6 Months',
            7 => '7 Months',
            8 => '8 Months',
            9 => '9 Months',
            10 => '10 Months',
            11 => '11 Months',
            12 => '12 Months',
        ];
    }

    protected function rules()
    {
        $rules = [
            'title' => 'required',
            'fees' => 'required|integer',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment_method_id' => 'required',
            'disciplines' => 'required|array',
            'items' => 'required|array',
            'services' => 'required|array',
        ];

        if ($this->payment_method_id == 1) {
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
    }

    public function save()
    {
        $data = $this->validate();

        $offer = $this->offer;
        if ($offer) {
            $offer->update($data);

            if ($this->payment_method_id == 1) {
                $offer->installment()->update($data['installment']);
            }
        } else {
            $offer = Offer::create($data);

            if ($this->payment_method_id == 1) {
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
