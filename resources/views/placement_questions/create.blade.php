@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.placementQuestions.index') !!}">Placement Question</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>

    <livewire:placement-questions.create />

@endsection
