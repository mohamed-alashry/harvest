@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('admin.placementApplicants.index') !!}">Placement Applicant</a>
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
                              <strong>Edit Placement Applicant</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($placementApplicant, ['route' => ['admin.placementApplicants.update', $placementApplicant->id], 'method' => 'patch']) !!}

                                    <div class="row">
                                        @include('placement_applicants.fields')
                                    </div>

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
