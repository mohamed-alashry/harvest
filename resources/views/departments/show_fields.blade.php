<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $department->id }}</p>
    </div>

    <!-- Parent Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('parent_id', 'Parent:') !!}
        <p>{{ $department->parent->title ?? 'No Parent' }}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        <p>{{ $department->title }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $department->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $department->updated_at }}</p>
    </div>
</div>
