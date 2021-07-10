@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.offers.index') !!}">Offer</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>

    <livewire:offers.form />
@endsection
