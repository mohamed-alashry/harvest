<div class="table-responsive-sm">
    <table class="table table-striped" id="departments-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Parent</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->title }}</td>
                    <td>{{ $department->parent->title ?? 'No Parent' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.departments.destroy', $department->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.departments.show', [$department->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.departments.edit', [$department->id]) }}"
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
