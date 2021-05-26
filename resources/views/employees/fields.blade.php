<div class="row">
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
        {!! Form::select('branch_id', $branches, null, ['class' => 'form-control', 'placeholder' => 'Select Branch...']) !!}
    </div>

    <!-- Department Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('department_id', 'Department:') !!}
        {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'id' => 'department-select', 'placeholder' => 'Select Department...']) !!}
    </div>

    <!-- Job Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('job_id', 'Job:') !!}
        {!! Form::select('job_id', [], null, ['class' => 'form-control', 'id' => 'job-select', 'placeholder' => 'Select Job...']) !!}
    </div>

    <!-- Roles Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('roles', 'Roles:') !!}
        {!! Form::select('roles[]', $roles, null, ['class' => 'form-control select2-multiple', 'multiple' => true]) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Cancel</a>
    </div>


    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                var val = $('#department-select').val()

                getDepartmentJobs(val)
            });

            $('#department-select').change(function() {
                var val = $(this).val()

                getDepartmentJobs(val)
            });

            function getDepartmentJobs(id) {

                var oldValue = "{{ old('job_id', $employee->job_id ?? '') }}"

                $.post("{{ route('admin.getJobs') }}", {
                        'department_id': id
                    },
                    function(data) {
                        var sel = $("#job-select");
                        sel.empty();
                        sel.append('<option value="">select job...</option>');

                        for (var i = 0; i < data.length; i++) {
                            if (data[i].id == oldValue) {
                                sel.append('<option value="' + data[i].id + '" selected>' + data[i].title +
                                    '</option>');
                            } else {
                                sel.append('<option value="' + data[i].id + '" >' + data[i].title +
                                    '</option>');
                            }
                        }
                    }
                );
            }

        </script>
    @endpush
</div>
