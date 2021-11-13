<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $exam->id }}</p>
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $exam->title }}</p>
</div>


<!-- Track Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('track_id', 'Track:') !!}
    <p>{{ $exam->track->title }}</p>
</div>


<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course:') !!}
    <p>{{ $exam->course->title }}</p>
</div>


<!-- Levels Field -->
<div class="form-group col-sm-6">
    {!! Form::label('levels', 'Levels:') !!}
    <p>{{ implode(', ', $exam->levels->pluck('name')->toArray()) }}</p>
</div>


<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'Duration:') !!}
    <p>{{ $exam->duration }}</p>
</div>


<!-- Success Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('success_rate', 'Success Rate:') !!}
    <p>{{ $exam->success_rate }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $exam->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $exam->updated_at }}</p>
</div>
