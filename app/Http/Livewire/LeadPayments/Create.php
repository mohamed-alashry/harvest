<?php

namespace App\Http\Livewire\LeadPayments;

use App\Models\Offer;
use Livewire\Component;
use App\Models\ExtraItem;
use App\Models\Group;
use App\Models\ServiceFee;
use Laracasts\Flash\Flash;
use App\Models\LeadPayment;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PlacementApplicant;
use Illuminate\Database\Eloquent\Builder;

class Create extends Component
{
    public $lead,
        $paymentable_type,
        $paymentable_id,
        $amount,
        $discount,
        $subPayments,
        $convertToCustomer = false,
        $service,
        $services = [],
        $paymentMethods,
        $suggested_groups,
        $group_id;

    public function mount(Request $request, $lead)
    {
        if ($request->has('convert')) {
            $this->convertToCustomer = true;
        }
        $this->paymentMethods = PaymentMethod::pluck('title', 'id');
    }

    protected function rules()
    {
        $payed = ($this->service && $this->service->payment_plan_id == 1) ? $this->subPayments[0]['amount'] : $this->amount;

        $rules = [
            'paymentable_type' => 'required',
            'paymentable_id' => 'required',
            'amount' => 'required',
            'discount' => 'nullable|integer|max:' . $payed,
            'subPayments' => 'required|array',
            'subPayments.0.amount' => 'required',
            'subPayments.0.payment_method_id' => 'required',
            'subPayments.0.reference_num' => 'required',
        ];

        if ($this->paymentable_type != 'App\\Models\\ExtraItem' && $this->lead->pt_level) {
            $rules['group_id'] = 'required';
        }

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

    public function updatedPaymentableId($value)
    {
        $this->getService($value);
    }

    public function getServices($type)
    {
        switch ($type) {
            case 'App\\Models\\ExtraItem':
                $this->services = ExtraItem::pluck('name', 'id');
                break;

            case 'App\\Models\\Offer':
                $branchesId = auth()->user()->branches->pluck('id')->toArray();
                $this->services = Offer::whereHas('branches', function (Builder $query) use ($branchesId) {
                    $query->whereIn('id', $branchesId);
                })->whereHas('services.trainingService.levels', function (Builder $query) {
                    $query->where('id', '<=', $this->lead->pt_level);
                })->pluck('title', 'id');
                break;

            default:
                $this->services = ServiceFee::whereHas('trainingService.levels', function (Builder $query) {
                    $query->where('id', '<=', $this->lead->pt_level);
                })->with('trainingService')->get()->pluck('trainingService.title', 'id');
                break;
        }
    }

    public function getService($id)
    {
        switch ($this->paymentable_type) {
            case 'App\\Models\\ExtraItem':
                $service = ExtraItem::find($id);

                $amount = $service->price;
                $this->service = $service;

                break;

            case 'App\\Models\\Offer':
                $service = Offer::find($id);

                $amount = $service->fees;
                $this->service = $service;

                $intervalsId = $service->intervals->pluck('id')->toArray();
                $timeframesId = $service->timeframes->pluck('id')->toArray();

                $this->suggested_groups = Group::whereHas('levels', function (Builder $query) {
                    $query->where('id', '<=', $this->lead->pt_level);
                })->whereHas('round.timeframe', function (Builder $query) use ($timeframesId) {
                    $query->whereIn('id', $timeframesId);
                })->whereIn('interval_id', $intervalsId)->get();

                break;

            default:
                $service = ServiceFee::find($id);

                $amount = $service->fees;
                $this->service = $service;

                $this->suggested_groups = Group::whereHas('levels', function (Builder $query) {
                    $query->where('id', '<=', $this->lead->pt_level);
                })->get();

                break;
        }

        $this->subPayments = null;
        $this->amount = $amount;
        $this->handleSubPayments($service, $amount);
    }

    public function handleSubPayments($service, $amount)
    {
        $installment = $service->installment;
        $now = now();

        $this->subPayments[0] = [
            'amount' => $installment ? $installment->deposit : $amount,
            'due_date' => $now->format('Y-m-d'),
            'paid' => 1
        ];

        if ($installment) {
            $first_due_date = $this->calcDueDate($now, $installment->first_due_date);
            $this->subPayments[1] = [
                'amount' => $installment->first_payment,
                'due_date' => $first_due_date
            ];

            if ($installment->second_payment) {
                $second_due_date = $this->calcDueDate($now, $installment->second_due_date);
                $this->subPayments[2] = [
                    'amount' => $installment->second_payment,
                    'due_date' => $second_due_date
                ];
            }

            if ($installment->third_payment) {
                $third_due_date = $this->calcDueDate($now, $installment->third_due_date);
                $this->subPayments[3] = [
                    'amount' => $installment->third_payment,
                    'due_date' => $third_due_date
                ];
            }

            if ($installment->fourth_payment) {
                $fourth_due_date = $this->calcDueDate($now, $installment->fourth_due_date);
                $this->subPayments[4] = [
                    'amount' => $installment->fourth_payment,
                    'due_date' => $fourth_due_date
                ];
            }
        }
    }

    public function calcDueDate($date, $after)
    {
        if ($after > 12) {
            return $date->addWeeks($after == 13 ? 1 : 2)->format('Y-m-d');
        } else {
            return $date->addMonths($after)->format('Y-m-d');
        }
    }

    public function save()
    {
        $data = $this->validate();
        // dd($data);

        $lead_id = $this->lead->id;
        $service = $this->service;

        $data['lead_id'] = $lead_id;
        $data['payment_plan_id'] = $service->payment_plan_id;
        $payment = LeadPayment::create($data);

        $subPayments = $data['subPayments'];
        foreach ($subPayments as $subPayment) {
            $payment->subPayments()->create($subPayment);
        }

        if ($this->convertToCustomer) {
            $this->lead->update(['type' => 2]);
            PlacementApplicant::where('mobile', $this->lead->mobile_1)->delete();
        }

        Flash::success('Lead Payment saved successfully.');

        redirect(route('admin.leadPayments.show', $payment->id));
    }

    public function render()
    {
        return view('livewire.lead-payments.create');
    }
}
