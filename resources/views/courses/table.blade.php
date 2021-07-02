<div class="table-responsive-sm">
    <table class="table table-striped" id="courses-table">
        <thead>
            <tr>
                <th>Course</th>
                <th>Track</th>
                <th>Levels</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->parent->title }}</td>
                    <td>{{ $course->levels }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.courses.destroy', $course->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.courses.show', [$course->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('courses edit')
                                <a href="{{ route('admin.courses.edit', [$course->id]) }}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                            @endcan

                            @can('courses delete')
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
