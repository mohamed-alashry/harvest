@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.leadCases.index', ['lead' => $leadCase->lead_id]) }}">Lead Case</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Details</strong>
                            <a href="{{ route('admin.leadCases.index', ['lead' => $leadCase->lead_id]) }}"
                                class="btn btn-light">Back</a>
                        </div>
                        <div class="card-body">
                            @include('lead_cases.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
