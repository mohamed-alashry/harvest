<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Round Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('round_id', 'Round Id:') !!}
    {!! Form::select('round_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Discipline Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discipline_id', 'Discipline Id:') !!}
    {!! Form::select('discipline_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    {!! Form::select('branch_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room Id:') !!}
    {!! Form::select('room_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Instructor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instructor_id', 'Instructor Id:') !!}
    {!! Form::select('instructor_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Interval Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interval_id', 'Interval Id:') !!}
    {!! Form::select('interval_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.groups.index') }}" class="btn btn-secondary">Cancel</a>
</div>
