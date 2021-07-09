@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('admin.disciplineCategories.index') !!}">Discipline Category</a>
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
                              <strong>Edit Discipline Category</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($disciplineCategory, ['route' => ['admin.disciplineCategories.update', $disciplineCategory->id], 'method' => 'patch']) !!}

                                    <div class="row">
                                        @include('discipline_categories.fields')
                                    </div>

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
