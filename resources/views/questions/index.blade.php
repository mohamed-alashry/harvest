@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Questions</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Questions
                            @can('questions create')
                                <a class="pull-right" href="{{ route('admin.questions.create') }}"><i
                                        class="fa fa-plus-square fa-lg"></i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            @include('questions.table')
                            <div class="pull-right mr-3">

                                {{-- @include('coreui-templates::common.paginate', ['records' => $questions]) --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
