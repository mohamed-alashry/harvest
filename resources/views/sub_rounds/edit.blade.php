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
                                @php
                                    $days = config('system_variables.timeframes.days')[$subRound->days];

                                    $daysName = explode('/', $days);
                                    $firstDay = $daysName[0];
                                    $dateDays = [
                                        'Sunday' => 0,
                                        'Monday' => 1,
                                        'Tuesday' => 2,
                                        'Wednesday' => 3,
                                        'Thursday' => 4,
                                        'Fridays' => 5,
                                        'Saturday' => 6,
                                    ];

                                    $disabledDays = array_filter(
                                        $dateDays,
                                        function ($key) use ($firstDay) {
                                            return $key != $firstDay;
                                        },
                                        ARRAY_FILTER_USE_KEY,
                                    );

                                    $daysOfWeekDisabled = implode(',', array_values($disabledDays));

                                    $minDate = now();
                                @endphp

                                <!-- Days Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('days', 'Days:') !!}
                                    <p>{{ $days }}</p>
                                </div>

                                <!-- Start Date Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('start_date', 'Start Date:') !!}
                                    {!! Form::text('start_date', null, ['class' => 'form-control', 'id' => 'date']) !!}
                                </div>

                                @push('scripts')
                                    <script type="text/javascript">
                                        $('#date').datetimepicker({
                                            format: 'YYYY-MM-DD',
                                            daysOfWeekDisabled: [{{ $daysOfWeekDisabled }}],
                                            minDate: "{{ $minDate }}",
                                            icons: {
                                                up: "icon-arrow-up-circle icons font-2xl",
                                                down: "icon-arrow-down-circle icons font-2xl"
                                            },
                                            sideBySide: true
                                        });
                                    </script>
                                @endpush

                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                    <a href="{{ route('admin.subRounds.index', ['round' => isset($subRound) ? $subRound->round_id : request('round')]) }}"
                                        class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
