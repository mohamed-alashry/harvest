<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $label->id }}</p>
    </div>

    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $label->name }}</p>
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status', 'Status:') !!}
        <p>{{ $label->status ? 'Active' : 'Inactive' }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $label->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $label->updated_at }}</p>
    </div>
</div>
