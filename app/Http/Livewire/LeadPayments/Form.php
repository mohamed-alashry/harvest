<?php

namespace App\Http\Livewire\LeadPayments;

use App\Models\ExtraItem;
use Livewire\Component;
use Laracasts\Flash\Flash;
use App\Models\LeadPayment;
use App\Models\Offer;
use App\Models\PaymentMethod;
use App\Models\ServiceFee;

class Form extends Component
{
    public $lead, $leadPayment,
        $paymentable_type,
        $paymentable_id,
        $amount,
        $payment_method_id,
        $reference_num,
        $services = [],
        $paymentMethods;

    public function mount($lead, $leadPayment = null)
    {
        if ($leadPayment) {
            $this->fill([
                'paymentable_type' => $leadPayment->paymentable_type,
                'paymentable_id' => $leadPayment->paymentable_id,
                'amount' => $leadPayment->amount,
                'payment_method_id' => $leadPayment->payment_method_id,
                'reference_num' => $leadPayment->reference_num,
            ]);
            $this->getServices($leadPayment->paymentable_type);
        }
        $this->paymentMethods = PaymentMethod::pluck('title', 'id');
    }

    protected function rules()
    {
        $rules = [
            'paymentable_type' => 'required',
            'paymentable_id' => 'required',
            'amount' => 'required|integer',
            'payment_method_id' => 'required',
            'reference_num' => 'required',
        ];

        return $rules;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function updatedPaymentableType($value)
    {
        $this->getServices($value);
        $this->paymentable_id = '';
    }

    public function getServices($type)
    {
        switch ($type) {
            case 'App\\Models\\ExtraItem':
                $this->services = ExtraItem::pluck('name', 'id');
                break;

            case 'App\\Models\\Offer':
                $this->services = Offer::pluck('title', 'id');
                break;

            default:
                $this->services = ServiceFee::with('trainingService')->get()->pluck('trainingService.title', 'id');
                break;
        }
    }

    public function save()
    {
        $data = $this->validate();

        $lead_id = $this->lead->id;
        $leadPayment = $this->leadPayment;
        if ($leadPayment) {
            $leadPayment->update($data);
        } else {
            $data['lead_id'] = $lead_id;
            LeadPayment::create($data);
        }

        Flash::success('Lead Payment saved successfully.');

        redirect(route('admin.leadPayments.index', ['lead' => $lead_id]));
    }

    public function render()
    {
        return view('livewire.lead-payments.form');
    }
}
