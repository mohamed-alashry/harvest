<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-3">
    {!! Form::label('time', 'Time From:') !!}
    {!! Form::time('time_from', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-3">
    {!! Form::label('time', 'Time To:') !!}
    {!! Form::time('time_to', null, ['class' => 'form-control']) !!}
</div>

<!-- Pattern Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pattern', 'Pattern:') !!}
    {!! Form::select('pattern', ['AM' => 'Morning (AM)', 'PM' => 'Evening (PM)'], null, ['class' => 'form-control', 'placeholder' => 'Select Pattern...']) !!}
</div>

<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', '1', true) !!} Active
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', '0', null) !!} Inactive
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.intervals.index') }}" class="btn btn-secondary">Cancel</a>
</div>
