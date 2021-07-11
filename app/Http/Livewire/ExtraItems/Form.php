<?php

namespace App\Http\Livewire\ExtraItems;

use Livewire\Component;
use Laracasts\Flash\Flash;
use App\Models\ExtraItem;
use App\Models\Installment;
use App\Models\ItemCategory;
use App\Models\PaymentPlan;

class Form extends Component
{
    public $extraItem,
        $categories,
        $paymentPlans,
        $dueDates,
        $item_category_id,
        $payment_plan_id,
        $name,
        $price,
        $installment;

    public function mount($extraItem = null)
    {
        if ($extraItem) {
            $this->fill([
                'item_category_id' => $extraItem->item_category_id,
                'payment_plan_id' => $extraItem->payment_plan_id,
                'name' => $extraItem->name,
                'price' => $extraItem->price,
                'installment' => $extraItem->installment,
            ]);
        }
        $this->categories = ItemCategory::pluck('name', 'id');
        $this->paymentPlans = PaymentPlan::where('status', 1)->pluck('title', 'id');
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
            'item_category_id' => 'required',
            'payment_plan_id' => 'required',
            'name' => 'required',
            'price' => 'required|integer',
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
    }

    public function save()
    {
        $data = $this->validate();

        $extraItem = $this->extraItem;
        if ($extraItem) {
            $extraItem->update($data);

            if ($this->payment_plan_id == 1) {
                $extraItem->installment()->update($data['installment']);
            }
        } else {
            $extraItem = ExtraItem::create($data);

            if ($this->payment_plan_id == 1) {
                $data['installment']['installmentable_type'] = 'App\\Models\\ExtraItem';
                $data['installment']['installmentable_id'] = $extraItem->id;
                Installment::create($data['installment']);
            }
        }

        Flash::success('Extra Item saved successfully.');

        redirect(route('admin.extraItems.index'));
    }

    public function render()
    {
        return view('livewire.extra-items.form');
    }
}
