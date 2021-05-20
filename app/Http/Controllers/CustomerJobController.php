<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerJobRequest;
use App\Http\Requests\UpdateCustomerJobRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CustomerJob;
use Illuminate\Http\Request;
use Flash;
use Response;

class CustomerJobController extends AppBaseController
{
    /**
     * Display a listing of the CustomerJob.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var CustomerJob $customerJobs */
        $customerJobs = CustomerJob::all();

        return view('customer_jobs.index')
            ->with('customerJobs', $customerJobs);
    }

    /**
     * Show the form for creating a new CustomerJob.
     *
     * @return Response
     */
    public function create()
    {
        return view('customer_jobs.create');
    }

    /**
     * Store a newly created CustomerJob in storage.
     *
     * @param CreateCustomerJobRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerJobRequest $request)
    {
        $input = $request->all();

        /** @var CustomerJob $customerJob */
        $customerJob = CustomerJob::create($input);

        Flash::success('Customer Job saved successfully.');

        return redirect(route('admin.customerJobs.index'));
    }

    /**
     * Display the specified CustomerJob.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CustomerJob $customerJob */
        $customerJob = CustomerJob::find($id);

        if (empty($customerJob)) {
            Flash::error('Customer Job not found');

            return redirect(route('admin.customerJobs.index'));
        }

        return view('customer_jobs.show')->with('customerJob', $customerJob);
    }

    /**
     * Show the form for editing the specified CustomerJob.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var CustomerJob $customerJob */
        $customerJob = CustomerJob::find($id);

        if (empty($customerJob)) {
            Flash::error('Customer Job not found');

            return redirect(route('admin.customerJobs.index'));
        }

        return view('customer_jobs.edit')->with('customerJob', $customerJob);
    }

    /**
     * Update the specified CustomerJob in storage.
     *
     * @param int $id
     * @param UpdateCustomerJobRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerJobRequest $request)
    {
        /** @var CustomerJob $customerJob */
        $customerJob = CustomerJob::find($id);

        if (empty($customerJob)) {
            Flash::error('Customer Job not found');

            return redirect(route('admin.customerJobs.index'));
        }

        $customerJob->fill($request->all());
        $customerJob->save();

        Flash::success('Customer Job updated successfully.');

        return redirect(route('admin.customerJobs.index'));
    }

    /**
     * Remove the specified CustomerJob from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CustomerJob $customerJob */
        $customerJob = CustomerJob::find($id);

        if (empty($customerJob)) {
            Flash::error('Customer Job not found');

            return redirect(route('admin.customerJobs.index'));
        }

        $customerJob->delete();

        Flash::success('Customer Job deleted successfully.');

        return redirect(route('admin.customerJobs.index'));
    }
}
