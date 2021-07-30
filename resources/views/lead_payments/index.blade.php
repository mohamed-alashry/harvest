@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.customers.index') !!}">Customers</a>
        </li>
        <li class="breadcrumb-item">Payments</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>

                            <a href="{{ route('admin.customers.show', $lead->id) }}"
                                class="btn btn-ghost-primary">{{ $lead->name['en'] }}</a> Payments

                            @can('leadPayments create')
                                <a class="pull-right"
                                    href="{{ route('admin.leadPayments.create', ['customer' => $lead->id]) }}"><i
                                        class="fa fa-plus-square fa-lg"></i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            @include('lead_payments.table')
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
