@extends('layouts.app')

@section('content')
    <ol class="breadcrumb d-print-none">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.leadPayments.index', ['customer' => $leadPayment->lead_id]) }}">Payment</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-print-none">
                            <strong>Details</strong>
                            <a href="{{ route('admin.leadPayments.index', ['customer' => $leadPayment->lead_id]) }}"
                                class="btn btn-light">Back</a>
                            <button class="pull-right btn btn-success" onclick="window.print()">Print this page</button>
                        </div>
                        <div class="card-body">
                            @include('lead_payments.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
