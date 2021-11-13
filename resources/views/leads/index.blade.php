@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Leads</li>
    </ol>

    @if (isset($online))
        <livewire:leads.index :online="$online" />
    @else
        <livewire:leads.index />
    @endif
@endsection
