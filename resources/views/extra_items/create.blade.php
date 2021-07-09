@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.extraItems.index') !!}">Extra Item</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>

    <livewire:extra-items.form />
@endsection
