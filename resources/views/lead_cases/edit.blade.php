@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.leadCases.index', ['lead' => $leadCase->lead_id]) !!}">Lead Case</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit fa-lg"></i>
                            <strong>Edit Lead Case</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::model($leadCase, ['route' => ['admin.leadCases.update', $leadCase->id], 'method' => 'patch']) !!}

                            @include('lead_cases.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection