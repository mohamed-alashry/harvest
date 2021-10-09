<div class="table-responsive-sm">
    <table class="table table-striped" id="groupStudents-table">
        <thead>
            <tr>
                <th>Group Id</th>
        <th>Lead Id</th>
        <th>Payment</th>
        <th>Books</th>
        <th>Activation</th>
        <th>Certification</th>
        <th>Abcence Per</th>
        <th>Exam Per</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($groupStudents as $groupStudent)
            <tr>
                <td>{{ $groupStudent->group_id }}</td>
            <td>{{ $groupStudent->lead_id }}</td>
            <td>{{ $groupStudent->payment }}</td>
            <td>{{ $groupStudent->books }}</td>
            <td>{{ $groupStudent->activation }}</td>
            <td>{{ $groupStudent->certification }}</td>
            <td>{{ $groupStudent->abcence_per }}</td>
            <td>{{ $groupStudent->exam_per }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.groupStudents.destroy', $groupStudent->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.groupStudents.show', [$groupStudent->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                        @can('groupStudents edit')
                            <a href="{{ route('admin.groupStudents.edit', [$groupStudent->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan

                        @can('groupStudents delete')
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
