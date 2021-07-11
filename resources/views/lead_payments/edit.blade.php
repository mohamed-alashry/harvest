@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.leadPayments.index', ['lead' => $lead->id]) !!}">Lead Payment</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <livewire:lead-payments.form :lead="$lead" :leadPayment="$leadPayment" />
@endsection
