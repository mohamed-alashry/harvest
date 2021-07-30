@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.subRounds.index', ['round' => $subRound->round_id]) !!}">Sub Round</a>
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
                            <strong>Edit Sub Round</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::model($subRound, ['route' => ['admin.subRounds.update', $subRound->id], 'method' => 'patch']) !!}

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
