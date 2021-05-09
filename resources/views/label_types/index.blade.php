@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Label Types</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            LabelTypes
                            @can('labelTypes create')
                                <a class="pull-right" href="{{ route('admin.labelTypes.create') }}"><i
                                        class="fa fa-plus-square fa-lg"></i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            @include('label_types.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
