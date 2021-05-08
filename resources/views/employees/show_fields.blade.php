<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $employee->id }}</p>
</div>

<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $employee->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $employee->last_name }}</p>
</div>

<!-- Mobile Field -->
<div class="form-group">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{{ $employee->mobile }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $employee->email }}</p>
</div>

<!-- Branch Field -->
<div class="form-group">
    {!! Form::label('branch', 'Branch:') !!}
    <p>{{ $employee->branch->name }}</p>
</div>

<!-- Department Field -->
<div class="form-group">
    {!! Form::label('department', 'Department:') !!}
    <p>{{ $employee->department->name }}</p>
</div>

<!-- Job Field -->
<div class="form-group">
    {!! Form::label('job', 'Job:') !!}
    <p>{{ $employee->job->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $employee->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $employee->updated_at }}</p>
</div>
