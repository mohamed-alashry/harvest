@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.rounds.index') !!}">Rounds</a>
        </li>
        <li class="breadcrumb-item">Sub Rounds</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <a href="{{ route('admin.rounds.show', $round->id) }}"
                                class="btn btn-ghost-primary">{{ $round->title }}</a> SubRounds
                            @can('subRounds create')
                                <a class="pull-right" href="{{ route('admin.subRounds.create', ['round' => $round->id]) }}"><i
                                        class="fa fa-plus-square fa-lg"></i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            @include('sub_rounds.table')
                            <div class="pull-right mr-3">

                                @include('coreui-templates::common.paginate', ['records' => $subRounds])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
