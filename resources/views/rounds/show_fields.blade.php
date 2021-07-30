<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $round->id }}</p>
</div>


<!-- Service Fee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_fee_id', 'Service Fee:') !!}
    <p>{{ $round->serviceFee->trainingService->title . ' | ' . $round->serviceFee->timeframe->title }}</p>
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
