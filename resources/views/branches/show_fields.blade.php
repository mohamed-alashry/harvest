<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $branch->id }}</p>
    </div>

    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $branch->name }}</p>
    </div>

    <!-- Address Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('address', 'Address:') !!}
        <p>{{ $branch->address }}</p>
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('phone', 'Phone:') !!}
        <p>{{ $branch->phone }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $branch->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $branch->updated_at }}</p>
    </div>
</div>
