@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.trainingServices.index') !!}">Training Service</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <livewire:training-services.form :trainingService="$trainingService" />
@endsection
