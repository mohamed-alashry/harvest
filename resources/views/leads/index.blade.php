@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Leads</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Leads
                            <a class="pull-right" href="{{ route('admin.leads.create') }}"><i
                                    class="fa fa-plus-square fa-lg"></i></a>
                        </div>
                        <div class="card-body">
                            @include('leads.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
