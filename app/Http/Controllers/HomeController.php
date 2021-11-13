<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Lead;
use App\Models\LeadPayment;
use App\Models\PlacementApplicant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leadsCount = Lead::where('type', 1)->count();
        $customersCount = Lead::where('type', 2)->count();
        $employeesCount = Employee::count();
        $applicantsCount = PlacementApplicant::count();

        return view('home', compact('leadsCount', 'customersCount', 'employeesCount', 'applicantsCount'));
    }

    /**
     * Show the customer invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $leadPayment = LeadPayment::with('lead', 'paymentPlan', 'subPayments', 'paymentable')->find($id);

        return view('invoice', compact('leadPayment'));
    }
}
