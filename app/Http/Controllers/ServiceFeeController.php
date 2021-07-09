<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\ServiceFee;
use Illuminate\Http\Request;
use Flash;
use Response;

class ServiceFeeController extends AppBaseController
{
    /**
     * Display a listing of the ServiceFee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var ServiceFee $serviceFees */
        $serviceFees = ServiceFee::all();

        return view('service_fees.index')
            ->with('serviceFees', $serviceFees);
    }

    /**
     * Show the form for creating a new ServiceFee.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_fees.create');
    }

    /**
     * Display the specified ServiceFee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ServiceFee $serviceFee */
        $serviceFee = ServiceFee::find($id);

        if (empty($serviceFee)) {
            Flash::error('Service Fee not found');

            return redirect(route('admin.serviceFees.index'));
        }

        return view('service_fees.show')->with('serviceFee', $serviceFee);
    }

    /**
     * Show the form for editing the specified ServiceFee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ServiceFee $serviceFee */
        $serviceFee = ServiceFee::find($id);

        if (empty($serviceFee)) {
            Flash::error('Service Fee not found');

            return redirect(route('admin.serviceFees.index'));
        }

        return view('service_fees.edit', compact('serviceFee'));
    }

    /**
     * Remove the specified ServiceFee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ServiceFee $serviceFee */
        $serviceFee = ServiceFee::find($id);

        if (empty($serviceFee)) {
            Flash::error('Service Fee not found');

            return redirect(route('admin.serviceFees.index'));
        }

        $serviceFee->delete();

        Flash::success('Service Fee deleted successfully.');

        return redirect(route('admin.serviceFees.index'));
    }
}
