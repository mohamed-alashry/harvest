<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Label Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('label_id', 'Label:') !!}
        {!! Form::select('label_id', $labels, null, ['class' => 'form-control', 'placeholder' => 'Select Label...']) !!}
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
        <a href="{{ route('admin.labelTypes.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
