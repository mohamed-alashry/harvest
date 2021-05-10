<div class="row">
    <!-- Department Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('department_id', 'Department:') !!}
        {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => 'Select Department...']) !!}
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
