@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.courses.index') !!}">Course</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <livewire:courses.edit :course="$course" />
@endsection
