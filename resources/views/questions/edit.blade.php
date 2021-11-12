@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.questions.index') !!}">Question</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <livewire:questions.edit :questionIns="$question" />
@endsection
