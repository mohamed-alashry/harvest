@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Make Sessions</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Makeup Sessions
                            {{-- @can('makeupSessions create')
                                <a class="pull-right" href="{{ route('admin.makeupSessions.create') }}"><i
                                        class="fa fa-plus-square fa-lg"></i></a>
                            @endcan --}}
                        </div>
                        <div class="card-body">
                            @include('makeup_sessions.table')
                            <div class="pull-right mr-3">

                                @include('coreui-templates::common.paginate', ['records' => $makeupSessions])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
