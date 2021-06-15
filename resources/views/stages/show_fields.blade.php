<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $stage->id }}</p>
</div>


<!-- Track Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('track_id', 'Track Id:') !!}
    <p>{{ $stage->track_id }}</p>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $stage->name }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $stage->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $stage->updated_at }}</p>
</div>


