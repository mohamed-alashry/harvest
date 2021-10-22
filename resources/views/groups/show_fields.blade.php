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


<!-- Admin Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_id', 'Admin:') !!}
    <p>{{ $group->admin->name }}</p>
</div>


<!-- Interval Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interval_id', 'Interval:') !!}
    <p>{{ $group->interval->name }}</p>
</div>


<!-- Track Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('track_id', 'Track:') !!}
    <p>{{ $group->track->title }}</p>
</div>


<!-- Sub Track Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Sub Track:') !!}
    <p>{{ $group->course->title }}</p>
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

<hr>

@if ($parents->isNotEmpty())
    <table class="table table-striped" id="groups-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Parent Group ID</th>
                <th>Round</th>
                <th>Discipline</th>
                <th>Branch</th>
                <th>Room</th>
                <th>Instructor</th>
                <th>Interval</th>
                <th>Students</th>
                <th>Sessions</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parents as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->title }}</td>
                    <td>{{ $group->parent->id ?? 'Parent' }}</td>
                    <td>{{ $group->round->title }}</td>
                    <td>{{ $group->discipline->name }}</td>
                    <td>{{ $group->branch->name }}</td>
                    <td>{{ $group->room->name }}</td>
                    <td>{{ $group->instructor->name }}</td>
                    <td>{{ $group->interval->name }}</td>
                    <td>
                        <a href="{{ route('admin.groupStudents.show', $group->id) }}" class="btn btn-info">
                            {{ $group->students_count }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.groupSessions.index', ['group' => $group->id]) }}"
                            class="btn btn-info">
                            {{ $group->sessions_count }}
                        </a>
                    </td>
                    <td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
