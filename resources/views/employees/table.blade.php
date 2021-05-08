<div class="table-responsive-sm">
    <table class="table table-striped" id="employees-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Branch</th>
                <th>Department</th>
                <th>Job</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->mobile }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->branch->name }}</td>
                    <td>{{ $employee->department->title }}</td>
                    <td>{{ $employee->job->title }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.employees.destroy', $employee->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.employees.show', [$employee->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.employees.edit', [$employee->id]) }}"
                                class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
