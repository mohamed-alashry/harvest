<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $course->id }}</p>
</div>


<!-- Track Field -->
<div class="form-group col-sm-6">
    {!! Form::label('track', 'Track:') !!}
    <p>{{ $course->parent->title }}</p>
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $course->title }}</p>
</div>


<!-- Levels Field -->
<div class="form-group col-sm-6">
    {!! Form::label('levels', 'Levels:') !!}
    <p>{{ $course->levels }}</p>
</div>


<!-- Stages -->
<div class="form-group col-sm-12">
    <h3>Stages</h3>
    <hr>
</div>


@foreach ($course->stages as $stage)

    <!-- Stage Name -->
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $stage->name }}</p>
    </div>

    @foreach ($stage->levels as $level)

        <!-- Level Name -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Level Name:') !!}
            <p>{{ $level->name }}</p>
        </div>

    @endforeach


    <div class="form-group col-sm-12">
        <hr>
    </div>

@endforeach


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $course->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $course->updated_at }}</p>
</div>
