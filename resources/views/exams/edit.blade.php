@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.exams.index') !!}">Exam</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <livewire:exams.form :exam="$exam" />
@endsection
