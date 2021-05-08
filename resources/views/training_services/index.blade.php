@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Training Services</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            TrainingServices
                            <a class="pull-right" href="{{ route('admin.trainingServices.create') }}"><i
                                    class="fa fa-plus-square fa-lg"></i></a>
                        </div>
                        <div class="card-body">
                            @include('training_services.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
