@if (!isset($makeupSession))
    {!! Form::hidden('group_session_id', $groupSession->id) !!}
    {!! Form::hidden('branch_id', $groupSession->group->branch_id) !!}
@endif

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control', 'id' => 'date']) !!}
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
        })
    </script>
@endpush


<!-- Time From Field -->
<div class="form-group col-sm-3">
    {!! Form::label('time_from', 'Time From:') !!}
    {!! Form::time('time_from', null, ['class' => 'form-control']) !!}
</div>

<!-- Time To Field -->
<div class="form-group col-sm-3">
    {!! Form::label('time_to', 'Time To:') !!}
    {!! Form::time('time_to', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room Id:') !!}
    {!! Form::select('room_id', $rooms, null, ['class' => 'form-control']) !!}
</div>

<!-- Instructor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instructor_id', 'Instructor Id:') !!}
    {!! Form::select('instructor_id', $instructors, isset($makeupSession) ? $makeupSession->instructor_id : $groupSession->group->instructor_id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.makeupSessions.index') }}" class="btn btn-secondary">Cancel</a>
</div>
