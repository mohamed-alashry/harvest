@if (!isset($subRound))
    {!! Form::hidden('round_id', request('round')) !!}
@endif

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control', 'id' => 'date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
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
