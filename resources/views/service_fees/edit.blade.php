@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.serviceFees.index') !!}">Service Fee</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <livewire:service-fees.form :serviceFee="$serviceFee" />
@endsection
