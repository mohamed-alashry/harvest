<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $subRound->id }}</p>
</div>


<!-- Round Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('round_id', 'Round:') !!}
    <p>{{ $subRound->round->title }}</p>
</div>


<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $subRound->start_date }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $subRound->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $subRound->updated_at }}</p>
</div>
