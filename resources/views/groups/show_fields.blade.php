<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $group->id }}</p>
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $group->title }}</p>
</div>


<!-- Round Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('round_id', 'Round:') !!}
    <p>{{ $group->round->title }}</p>
</div>


<!-- Discipline Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discipline_id', 'Discipline:') !!}
    <p>{{ $group->discipline->name }}</p>
</div>


<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch:') !!}
    <p>{{ $group->branch->name }}</p>
</div>


<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room:') !!}
    <p>{{ $group->room->name }}</p>
</div>


<!-- Instructor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instructor_id', 'Instructor:') !!}
    <p>{{ $group->instructor->name }}</p>
</div>


<!-- Interval Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interval_id', 'Interval:') !!}
    <p>{{ $group->interval->name }}</p>
</div>


<!-- Levels Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interval_id', 'Levels:') !!}
    <p>{{ implode(', ', $group->levels->pluck('name')->toArray()) }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $group->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $group->updated_at }}</p>
</div>
