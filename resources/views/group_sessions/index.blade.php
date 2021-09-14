@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Group Sessions</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             GroupSessions
                            @can('groupSessions create')
                             <a class="pull-right" href="{{ route('admin.groupSessions.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                            @endcan
                         </div>
                         <div class="card-body">
                             @include('group_sessions.table')
                              <div class="pull-right mr-3">
                                     
        @include('coreui-templates::common.paginate', ['records' => $groupSessions])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

