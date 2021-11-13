@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row mt-5 dashboard">
                        <div class="col-sm-3 statistics">
                            <div class="card p-4 bg-primary text-white border-0 d-flex flex-row justify-content-between">
                                <i class="fa fa-mobile"></i>
                                <div class="text-right">
                                    <p>{{ $leadsCount }}</p>
                                    <p>Leads</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 statistics">
                            <div class="card p-4 bg-warning text-white border-0 d-flex flex-row justify-content-between">
                                <i class="fa fa-users"></i>
                                <div class="text-right">
                                    <p>{{ $customersCount }}</p>
                                    <p>Customers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 statistics">
                            <div class="card p-4 bg-success text-white border-0 d-flex flex-row justify-content-between">
                                <i class="fa fa-briefcase"></i>
                                <div class="text-right">
                                    <p>{{ $employeesCount }}</p>
                                    <p>Employees</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 statistics">
                            <div class="card p-4 bg-danger text-white border-0 d-flex flex-row justify-content-between">
                                <i class="fa fa-file"></i>
                                <div class="text-right">
                                    <p>{{ $applicantsCount }}</p>
                                    <p>Applicants</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
