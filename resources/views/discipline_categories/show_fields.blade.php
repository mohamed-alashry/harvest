<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $disciplineCategory->id }}</p>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $disciplineCategory->name }}</p>
</div>


<!-- Max Student Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_student', 'Max Student:') !!}
    <p>{{ $disciplineCategory->max_student }}</p>
</div>


<!-- Items Field -->
<div class="form-group col-sm-6">
    {!! Form::label('items', 'Items:') !!}
    <p>{{ implode(', ', $disciplineCategory->items->pluck('name')->toArray()) }}</p>
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $disciplineCategory->status }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $disciplineCategory->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $disciplineCategory->updated_at }}</p>
</div>
