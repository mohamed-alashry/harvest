<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $groupSession->id }}</p>
</div>


<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $groupSession->date }}</p>
</div>


<!-- Level Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level_id', 'Level:') !!}
    <p>{{ $groupSession->level->name ?? 'Exam' }}</p>
</div>


<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room:') !!}
    <p>{{ $groupSession->room->name }}</p>
</div>


<!-- Instructor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instructor_id', 'Instructor:') !!}
    <p>{{ $groupSession->instructor->name }}</p>
</div>


<!-- Interval Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interval_id', 'Interval:') !!}
    <p>{{ $groupSession->interval->name }}</p>
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $groupSession->status ? 'Active' : 'Cancelled' }}</p>
</div>
