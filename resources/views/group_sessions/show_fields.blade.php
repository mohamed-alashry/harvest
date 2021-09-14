<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $groupSession->id }}</p>
</div>


<!-- Group Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_id', 'Group Id:') !!}
    <p>{{ $groupSession->group_id }}</p>
</div>


<!-- Sub Round Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_round_id', 'Sub Round Id:') !!}
    <p>{{ $groupSession->sub_round_id }}</p>
</div>


<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $groupSession->date }}</p>
</div>


<!-- Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level', 'Level:') !!}
    <p>{{ $groupSession->level }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $groupSession->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $groupSession->updated_at }}</p>
</div>


