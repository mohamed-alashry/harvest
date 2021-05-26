<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentPlanRequest;
use App\Http\Requests\UpdatePaymentPlanRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\PaymentPlan;
use Illuminate\Http\Request;
use Flash;
use Response;

class PaymentPlanController extends AppBaseController
{
    /**
     * Display a listing of the PaymentPlan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var PaymentPlan $paymentPlans */
        $paymentPlans = PaymentPlan::all();

        return view('payment_plans.index')
            ->with('paymentPlans', $paymentPlans);
    }

    /**
     * Show the form for creating a new PaymentPlan.
     *
     * @return Response
     */
    public function create()
    {
        return view('payment_plans.create');
    }

    /**
     * Store a newly created PaymentPlan in storage.
     *
     * @param CreatePaymentPlanRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentPlanRequest $request)
    {
        $input = $request->all();

        /** @var PaymentPlan $paymentPlan */
        $paymentPlan = PaymentPlan::create($input);

        Flash::success('Payment Plan saved successfully.');

        return redirect(route('admin.paymentPlans.index'));
    }

    /**
     * Display the specified PaymentPlan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PaymentPlan $paymentPlan */
        $paymentPlan = PaymentPlan::find($id);

        if (empty($paymentPlan)) {
            Flash::error('Payment Plan not found');

            return redirect(route('admin.paymentPlans.index'));
        }

        return view('payment_plans.show')->with('paymentPlan', $paymentPlan);
    }

    /**
     * Show the form for editing the specified PaymentPlan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PaymentPlan $paymentPlan */
        $paymentPlan = PaymentPlan::find($id);

        if (empty($paymentPlan)) {
            Flash::error('Payment Plan not found');

            return redirect(route('admin.paymentPlans.index'));
        }

        return view('payment_plans.edit')->with('paymentPlan', $paymentPlan);
    }

    /**
     * Update the specified PaymentPlan in storage.
     *
     * @param int $id
     * @param UpdatePaymentPlanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentPlanRequest $request)
    {
        /** @var PaymentPlan $paymentPlan */
        $paymentPlan = PaymentPlan::find($id);

        if (empty($paymentPlan)) {
            Flash::error('Payment Plan not found');

            return redirect(route('admin.paymentPlans.index'));
        }

        $paymentPlan->fill($request->all());
        $paymentPlan->save();

        Flash::success('Payment Plan updated successfully.');

        return redirect(route('admin.paymentPlans.index'));
    }

    /**
     * Remove the specified PaymentPlan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PaymentPlan $paymentPlan */
        $paymentPlan = PaymentPlan::find($id);

        if (empty($paymentPlan)) {
            Flash::error('Payment Plan not found');

            return redirect(route('admin.paymentPlans.index'));
        }

        $paymentPlan->delete();

        Flash::success('Payment Plan deleted successfully.');

        return redirect(route('admin.paymentPlans.index'));
    }
}
