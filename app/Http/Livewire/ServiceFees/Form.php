<?php

namespace App\Http\Livewire\ServiceFees;

use Livewire\Component;
use Laracasts\Flash\Flash;
use App\Models\ServiceFee;
use App\Models\Installment;
use App\Models\PaymentPlan;
use App\Models\Timeframe;
use App\Models\TrainingService;

class Form extends Component
{
    public $serviceFee,
        $services,
        $timeframes,
        $paymentPlans,
        $training_service_id,
        $payment_plan_id,
        $timeframe_id,
        $fees,
        $installment;

    public function mount($serviceFee = null)
    {
        if ($serviceFee) {
            $this->fill([
                'training_service_id' => $serviceFee->training_service_id,
                'payment_plan_id' => $serviceFee->payment_plan_id,
                'timeframe_id' => $serviceFee->timeframe_id,
                'fees' => $serviceFee->fees,
                'installment' => $serviceFee->installment,
            ]);
        }
        $this->services = TrainingService::pluck('title', 'id');
        $this->timeframes = Timeframe::pluck('title', 'id');
        $this->paymentPlans = PaymentPlan::where('status', 1)->pluck('title', 'id');
    }

    protected function rules()
    {
        $rules = [
            'training_service_id' => 'required',
            'payment_plan_id' => 'required',
            'timeframe_id' => 'required',
            'fees' => 'required|integer',
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

        $serviceFee = $this->serviceFee;
        if ($serviceFee) {
            $serviceFee->update($data);

            if ($this->payment_plan_id == 1) {
                $serviceFee->installment()->update($data['installment']);
            }
        } else {
            $serviceFee = ServiceFee::create($data);

            if ($this->payment_plan_id == 1) {
                $data['installment']['installmentable_type'] = 'App\\Models\\ServiceFee';
                $data['installment']['installmentable_id'] = $serviceFee->id;
                Installment::create($data['installment']);
            }
        }

        Flash::success('Extra Item saved successfully.');

        redirect(route('admin.serviceFees.index'));
    }

    public function render()
    {
        return view('livewire.service-fees.form');
    }
}
