@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.subRounds.index', ['round' => $round->id]) !!}">Sub Round</a>
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
                            <strong>Create Sub Round</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'admin.subRounds.store']) !!}

                            <div class="row">
                                @include('sub_rounds.fields')
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
