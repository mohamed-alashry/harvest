<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $labelType->id }}</p>
    </div>

    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $labelType->name }}</p>
    </div>

    <!-- Label Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('label_id', 'Label:') !!}
        <p>{{ $labelType->label->name }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $labelType->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $labelType->updated_at }}</p>
    </div>
</div>
