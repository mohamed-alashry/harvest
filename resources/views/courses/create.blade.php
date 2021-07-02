@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.courses.index') !!}">Stage</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>

    <livewire:courses.create />
@endsection
