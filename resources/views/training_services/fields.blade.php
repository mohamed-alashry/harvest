<div class="row">
    <!-- Sub Track Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('course', 'Sub Track:') !!}
        {!! Form::select('course_id', $courses, null, ['class' => 'form-control', 'placeholder' => 'Select course...']) !!}
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Pattern Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('pattern', 'Pattern:') !!}
        {!! Form::select('pattern', ['AM' => 'Morning (AM)', 'PM' => 'Evening (PM)', 'MIX' => 'AM/PM (MIX)'], null, ['class' => 'form-control', 'placeholder' => 'Select Pattern...']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.trainingServices.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
