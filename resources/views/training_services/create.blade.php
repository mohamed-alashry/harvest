@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.trainingServices.index') !!}">Training Service</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>

    <livewire:training-services.form />
@endsection
