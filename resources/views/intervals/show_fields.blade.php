<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $interval->id }}</p>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $interval->name }}</p>
</div>


<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    <p>{{ $interval->time }}</p>
</div>


<!-- Pattern Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pattern', 'Pattern:') !!}
    <p>{{ $interval->pattern == 'AM' ? 'Morning (AM)' : 'Evening (PM)' }}</p>
</div>


<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    <p>{{ $interval->sort }}</p>
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $interval->status ? 'Active' : 'Inactive' }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $interval->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $interval->updated_at }}</p>
</div>
