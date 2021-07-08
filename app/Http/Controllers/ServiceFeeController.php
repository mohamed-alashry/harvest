<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceFeeRequest;
use App\Http\Requests\UpdateServiceFeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\PaymentMethod;
use App\Models\ServiceFee;
use App\Models\Timeframe;
use App\Models\TrainingService;
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
        $services = TrainingService::pluck('title', 'id');
        $timeframes = Timeframe::pluck('title', 'id');
        $paymentMethods = PaymentMethod::pluck('title', 'id');

        return view('service_fees.create', compact('services', 'timeframes', 'paymentMethods'));
    }

    /**
     * Store a newly created ServiceFee in storage.
     *
     * @param CreateServiceFeeRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceFeeRequest $request)
    {
        $input = $request->all();

        /** @var ServiceFee $serviceFee */
        $serviceFee = ServiceFee::create($input);

        Flash::success('Service Fee saved successfully.');

        return redirect(route('admin.serviceFees.index'));
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

        $services = TrainingService::pluck('title', 'id');
        $timeframes = Timeframe::pluck('title', 'id');
        $paymentMethods = PaymentMethod::pluck('title', 'id');

        return view('service_fees.edit', compact('serviceFee', 'services', 'timeframes', 'paymentMethods'));
    }

    /**
     * Update the specified ServiceFee in storage.
     *
     * @param int $id
     * @param UpdateServiceFeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceFeeRequest $request)
    {
        /** @var ServiceFee $serviceFee */
        $serviceFee = ServiceFee::find($id);

        if (empty($serviceFee)) {
            Flash::error('Service Fee not found');

            return redirect(route('admin.serviceFees.index'));
        }

        $serviceFee->fill($request->all());
        $serviceFee->save();

        Flash::success('Service Fee updated successfully.');

        return redirect(route('admin.serviceFees.index'));
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
