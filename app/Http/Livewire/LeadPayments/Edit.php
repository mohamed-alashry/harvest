<?php

namespace App\Http\Livewire\LeadPayments;

use Livewire\Component;
use Laracasts\Flash\Flash;
use App\Models\PaymentMethod;
use App\Models\SubPayment;

class Edit extends Component
{
    public $lead, $leadPayment,
        $paymentable_type,
        $service,
        $installments,
        $subPayments,
        $paymentMethods;

    public function mount($lead, $leadPayment = null)
    {
        $this->fill([
            'paymentable_type' => $leadPayment->paymentable_type,
            'service' => $leadPayment->paymentable,
            'installments' => $leadPayment->subPayments()->with('paymentMethod')->get(),
            'paymentMethods' => PaymentMethod::pluck('title', 'id')
        ]);
    }

    protected function rules()
    {
        $rules = [
            'subPayments' => 'required|array',
            'subPayments.*.payment_method_id' => 'required',
            'subPayments.*.reference_num' => 'required',
        ];

        return $rules;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function save()
    {
        $data = $this->validate();

        $subPayments = $data['subPayments'];
        foreach ($subPayments as $id => $subPayment) {
            $subPayment['paid'] = 1;
            SubPayment::where('id', $id)->update($subPayment);
        }

        Flash::success('Lead Payment saved successfully.');

        redirect(route('admin.leadPayments.index', ['customer' => $this->lead->id]));
    }

    public function render()
    {
        return view('livewire.lead-payments.edit');
    }
}
