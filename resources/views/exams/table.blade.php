<div class="table-responsive-sm">
    <table class="table table-striped" id="exams-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Track</th>
                <th>Course</th>
                <th>Levels</th>
                <th>Duration</th>
                <th>Success Rate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $exam->id }}</td>
                    <td>{{ $exam->title }}</td>
                    <td>{{ $exam->track->title }}</td>
                    <td>{{ $exam->course->title }}</td>
                    <td>{{ implode(', ', $exam->levels->pluck('name')->toArray()) }}</td>
                    <td>{{ $exam->duration }}</td>
                    <td>{{ $exam->success_rate }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.exams.destroy', $exam->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.exams.show', [$exam->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>

                            @can('exams edit')
                                <a href="{{ route('admin.exams.edit', [$exam->id]) }}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                            @endcan

                            @can('exams delete')
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
