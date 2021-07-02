@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.timeframes.index') !!}">Timeframe</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>

    <livewire:timeframes.form />
@endsection
