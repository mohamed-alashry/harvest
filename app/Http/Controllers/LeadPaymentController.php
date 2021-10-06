<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Lead;
use App\Models\LeadPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class LeadPaymentController extends AppBaseController
{
    /**
     * Display a listing of the LeadPayment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var LeadPayment $leadPayments */
        $lead = Lead::find(request('customer'));

        $leadPayments = LeadPayment::where('lead_id', $lead->id)->withCount(['subPayments' => function ($query) {
            $query->where('paid', 0);
        }])->get();

        return view('lead_payments.index', compact('leadPayments', 'lead'));
    }

    /**
     * Show the form for creating a new LeadPayment.
     *
     * @return Response
     */
    public function create()
    {
        $lead = Lead::find(request('customer'));

        return view('lead_payments.create', compact('lead'));
    }

    /**
     * Display the specified LeadPayment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LeadPayment $leadPayment */
        $leadPayment = LeadPayment::with('lead', 'paymentPlan', 'subPayments', 'paymentable')->find($id);

        if (empty($leadPayment)) {
            Flash::error('Lead Payment not found');

            return redirect(route('admin.leadPayments.index'));
        }

        $leadPayment->increment('print_count');

        return view('lead_payments.show')->with('leadPayment', $leadPayment);
    }

    /**
     * Show the form for editing the specified LeadPayment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var LeadPayment $leadPayment */
        $leadPayment = LeadPayment::find($id);

        if (empty($leadPayment)) {
            Flash::error('Lead Payment not found');

            return redirect(route('admin.leadPayments.index'));
        }
        $lead = Lead::find($leadPayment->lead_id);

        return view('lead_payments.edit', compact('leadPayment', 'lead'));
    }

    /**
     * Remove the specified LeadPayment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LeadPayment $leadPayment */
        $leadPayment = LeadPayment::find($id);

        if (empty($leadPayment)) {
            Flash::error('Lead Payment not found');

            return redirect(route('admin.leadPayments.index'));
        }

        $lead_id = $leadPayment->lead_id;

        $leadPayment->delete();

        Flash::success('Lead Payment deleted successfully.');

        return redirect(route('admin.leadPayments.index', ['customer' => $lead_id]));
    }

    public function paymentDiscount()
    {
        return null;
    }
}
