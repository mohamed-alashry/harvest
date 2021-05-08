<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Password Confirmation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Password Confirmation:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<!-- Branch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch:') !!}
    {!! Form::select('branch_id', $branches, null, ['class' => 'form-control']) !!}
</div>

<!-- Department Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department:') !!}
    {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
</div>

<!-- Job Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_id', 'Job:') !!}
    {!! Form::select('job_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch', 'Branch:') !!}
    {!! Form::select('branch', config('data.branches'), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Cancel</a>
</div>
