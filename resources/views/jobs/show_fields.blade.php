<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $job->id }}</p>
    </div>

    <!-- Department Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('department_id', 'Department:') !!}
        <p>{{ $job->department->title }}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        <p>{{ $job->title }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $job->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $job->updated_at }}</p>
    </div>
</div>
