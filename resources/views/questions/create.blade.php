@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.questions.index') !!}">Question</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>

    <livewire:questions.create />
@endsection
