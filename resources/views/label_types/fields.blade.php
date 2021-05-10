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

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.labelTypes.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
