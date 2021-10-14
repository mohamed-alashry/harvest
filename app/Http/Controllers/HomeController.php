<?php

namespace App\Http\Controllers;

use App\Models\LeadPayment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $leadPayment = LeadPayment::with('lead', 'paymentPlan', 'subPayments', 'paymentable')->find($id);

        return view('invoice', compact('leadPayment'));
    }
}
