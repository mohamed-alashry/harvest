<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $round->id }}</p>
</div>


<!-- TimeFrame Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timeframe_id', 'TimeFrame:') !!}
    <p>{{ $round->timeframe->title }}</p>
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $round->title }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $round->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $round->updated_at }}</p>
</div>
