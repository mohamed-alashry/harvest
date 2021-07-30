@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.groups.index') !!}">Group</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <livewire:groups.form :group="$group" />
@endsection
