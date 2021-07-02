<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_hours', 'Total Hours:') !!}
    {!! Form::text('total_hours', null, ['class' => 'form-control']) !!}
</div>

<!-- Session Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('session_hours', 'Session Hours:') !!}
    {!! Form::text('session_hours', null, ['class' => 'form-control']) !!}
</div>

<!-- Week Session Field -->
<div class="form-group col-sm-6">
    {!! Form::label('week_session', 'Week Session:') !!}
    {!! Form::select('week_session', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Days Field -->
<div class="form-group col-sm-6">
    {!! Form::label('days', 'Days:') !!}
    {!! Form::select('days', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', "1", null) !!} Active
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "0", null) !!} Inactive
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.timeframes.index') }}" class="btn btn-secondary">Cancel</a>
</div>
