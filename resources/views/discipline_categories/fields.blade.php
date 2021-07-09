<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Max Student Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_student', 'Max Student:') !!}
    {!! Form::text('max_student', null, ['class' => 'form-control']) !!}
</div>

<!-- Extra Items Field -->
<div class="form-group col-sm-6">
    {!! Form::label('items', 'Extra Items:') !!}
    {!! Form::select('items[]', $items, null, ['class' => 'form-control', 'multiple' => true]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', '1', null) !!} Active
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', '0', null) !!} Inactive
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.disciplineCategories.index') }}" class="btn btn-secondary">Cancel</a>
</div>
