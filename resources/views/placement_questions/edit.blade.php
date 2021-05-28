@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('admin.placementQuestions.index') !!}">Placement Question</a>
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
                              <strong>Edit Placement Question</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($placementQuestion, ['route' => ['admin.placementQuestions.update', $placementQuestion->id], 'method' => 'patch', 'files' => true]) !!}

                                    <div class="row">
                                        @include('placement_questions.fields')
                                    </div>

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
