<!-- Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $group->id }}</p>
</div>


<!-- Instructor Field -->
<div class="form-group col-sm-4">
    {!! Form::label('instructor', 'Instructor:') !!}
    <p>{{ $group->instructor->name }}</p>
</div>


<!-- Discipline Field -->
<div class="form-group col-sm-4">
    {!! Form::label('discipline', 'Discipline:') !!}
    <p>{{ $group->discipline->name }}</p>
</div>


<!-- Interval Field -->
<div class="form-group col-sm-4">
    {!! Form::label('interval', 'Interval:') !!}
    <p>{{ $group->interval->name }}</p>
</div>


<!-- Levels Field -->
<div class="form-group col-sm-4">
    {!! Form::label('interval_id', 'Levels:') !!}
    <p>{{ implode(', ', $group->levels->pluck('name')->toArray()) }}</p>
</div>


<!-- Days Field -->
<div class="form-group col-sm-4">
    {!! Form::label('days', 'Days:') !!}
    <p>{{ config('system_variables.timeframes.days')[$group->days] }}</p>
</div>


<!-- Room Field -->
<div class="form-group col-sm-4">
    {!! Form::label('room_id', 'Room:') !!}
    <p>{{ $group->room->name }}</p>
</div>


<!-- Start Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $group->subRound->start_date }}</p>
</div>


<!-- End Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $group->subRound->end_date }}</p>
</div>


<!-- Admin Field -->
<div class="form-group col-sm-4">
    {!! Form::label('admin', 'Admin:') !!}
    <p>{{ $group->admin->name }}</p>
</div>


<!-- Students Field -->
<div class="form-group col-sm-4">
    {!! Form::label('students', 'Students:') !!}
    <p>{{ $group->students_count . ' / ' . $group->discipline->max_student }}</p>
</div>


<!-- Students Field -->
<div class="form-group col-sm-4">
    {!! Form::label('sessions', 'Sessions:') !!}
    <p>{{ $pastSessions . '/' . $group->sessions_count }}</p>
</div>


<div class="form-group col-sm-12">
    <div class="table-responsive-sm">
        <table class="table table-striped" id="groupStudents-table">
            <thead>
                <tr>
                    <th>Sr</th>
                    <th>Name</th>
                    <th>Id</th>
                    <th>Mobile</th>
                    <th>Payment</th>
                    <th>Books</th>
                    <th>Activation</th>
                    <th>Certification</th>
                    <th>Abcence</th>
                    <th colspan="2">Exam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group->students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->lead->name['en'] }}</td>
                        <td>{{ $student->lead->id }}</td>
                        <td>{{ $student->lead->mobile_1 }}</td>
                        <td>
                            @if ($student->payment)
                                <i class="fa fa-check"></i>
                            @else
                                <i class="fa fa-money"></i>
                            @endif
                        </td>
                        <td>{{ $student->books }}</td>
                        <td>{{ $student->activation }}</td>
                        <td>{{ $student->certification }}</td>
                        <td>{{ $student->abcence_per ?? 0 }}</td>
                        <td>{{ $student->exam_per }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
