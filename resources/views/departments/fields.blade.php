<div class="row">
    <!-- Parent Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('parent_id', 'Parent Id:') !!}
        {!! Form::select('parent_id', $parents, null, ['class' => 'form-control', 'placeholder' => 'Select Parent...']) !!}
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
