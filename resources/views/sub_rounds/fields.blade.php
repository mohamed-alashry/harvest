@if (!isset($subRound))
    {!! Form::hidden('round_id', request('round')) !!}
@endif

@foreach ($round->timeframe->days as $day)

    @php
        $days = config('system_variables.timeframes.days')[$day];

        $dateID = 'date-' . $day;
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
        // dd($daysName);
    @endphp

    <!-- Days Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('days', 'Days:') !!}
        {!! Form::hidden("subRounds[$loop->index][days]", $day) !!}
        <p>{{ $days }}</p>
    </div>

    <!-- Start Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('start_date', 'Start Date:') !!}
        {!! Form::text("subRounds[$loop->index][start_date]", null, ['class' => 'form-control', 'id' => $dateID]) !!}
    </div>

    @push('scripts')
        <script type="text/javascript">
            $('#{{ $dateID }}').datetimepicker({
                format: 'YYYY-MM-DD',
                // useCurrent: true,
                daysOfWeekDisabled: [{{ $daysOfWeekDisabled }}],
                icons: {
                    up: "icon-arrow-up-circle icons font-2xl",
                    down: "icon-arrow-down-circle icons font-2xl"
                },
                sideBySide: true
            });
        </script>
    @endpush

@endforeach

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.subRounds.index', ['round' => isset($subRound) ? $subRound->round_id : request('round')]) }}"
        class="btn btn-secondary">Cancel</a>
</div>
