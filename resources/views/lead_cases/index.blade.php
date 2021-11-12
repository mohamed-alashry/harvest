@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            @if ($lead->type == 1)
                <a href="{!! route('admin.leads.index') !!}">Leads</a>
            @else
                <a href="{!! route('admin.customers.index') !!}">Customers</a>
            @endif
        </li>
        <li class="breadcrumb-item">Follow up </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>

                            @if ($lead->type == 1)
                                <a href="{{ route('admin.leads.edit', $lead->id) }}"
                                    class="btn btn-ghost-primary">{{ $lead->name['en'] }}</a>
                            @else
                                <a href="{{ route('admin.customers.edit', $lead->id) }}"
                                    class="btn btn-ghost-primary">{{ $lead->name['en'] }}</a>
                            @endif
                            Follow up

                            @php
                                $query = ['lead' => request('lead')];

                                if (request()->filled('student')) {
                                    $query['student'] = request('student');
                                }
                                if (request()->filled('type')) {
                                    $query['type'] = request('type');
                                } else {
                                    $query['type'] = 3;
                                }
                            @endphp
                            @can('leadCases create')
                                <a class="pull-right" href="{{ route('admin.leadCases.create', $query) }}"><i
                                        class="fa fa-plus-square fa-lg"></i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            @include('lead_cases.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
