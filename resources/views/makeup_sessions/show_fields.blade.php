<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $makeupSession->id }}</p>
</div>


<!-- Group Session Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_session_id', 'Group Session Id:') !!}
    <p>
        <a href="{{ route('admin.groupSessions.show', $makeupSession->group_session_id) }}">
            {{ $makeupSession->group_session_id }}</a>
    </p>
</div>


<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $makeupSession->date }}</p>
</div>


<!-- Time From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_from', 'Time From:') !!}
    <p>{{ $makeupSession->time_from }}</p>
</div>


<!-- Time To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_to', 'Time To:') !!}
    <p>{{ $makeupSession->time_to }}</p>
</div>


{{-- <!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    <p>{{ $makeupSession->branch_id }}</p>
</div> --}}


<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room:') !!}
    <p>{{ $makeupSession->room->name }}</p>
</div>


<!-- Instructor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instructor_id', 'Instructor:') !!}
    <p>{{ $makeupSession->instructor->name }}</p>
</div>


<!-- Attendances Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attendances', 'Attendances:') !!}
    @foreach ($makeupSession->attendances as $attendance)
        <p>
            <a href="{{ route('admin.customers.show', $attendance->lead_id) }}" target="_blank">
                {{ $attendance->lead->name['en'] }}</a>
        </p>
    @endforeach
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $makeupSession->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $makeupSession->updated_at }}</p>
</div>
