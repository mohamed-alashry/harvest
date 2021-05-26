<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Permissions Field -->
<div class="form-group col-sm-12">
    {!! Form::label('permissions', 'Permissions:') !!}

    <div class="row">
        @foreach ($permissions as $permission)
            <div class="col-sm-3">
                {!! Form::checkbox('permissions[]', $permission->id, null, ['id' => 'permission-' . $permission->id]) !!}
                {!! Form::label('permission-' . $permission->id, $permission->name) !!}
            </div>
        @endforeach
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancel</a>
</div>
