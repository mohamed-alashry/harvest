@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.customers.index') !!}">Customer</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-plus-square-o fa-lg"></i>
                            <strong>Create Customer</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'admin.customers.store', 'files' => true]) !!}

                            @include('customers.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection