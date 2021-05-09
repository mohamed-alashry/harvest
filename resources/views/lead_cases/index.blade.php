@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Lead Cases </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>

                            <a href="{{ route('admin.leads.show', $lead->id) }}"
                                class="btn btn-ghost-primary">{{ $lead->name['en'] }}</a> Cases

                            @can('leadCases create')
                                <a class="pull-right" href="{{ route('admin.leadCases.create', ['lead' => $lead->id]) }}"><i
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
