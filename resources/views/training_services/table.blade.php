<div class="table-responsive-sm">
    <table class="table table-striped" id="trainingServices-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Track</th>
                <th>Sub Track</th>
                <th>Time Pattern</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainingServices as $trainingService)
                <tr>
                    <td>{{ $trainingService->title }}</td>
                    <td>{{ $trainingService->track->title }}</td>
                    <td>{{ $trainingService->course->title }}</td>
                    <td>{{ $trainingService->pattern }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.trainingServices.destroy', $trainingService->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.trainingServices.show', [$trainingService->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('trainingServices edit')
                                <a href="{{ route('admin.trainingServices.edit', [$trainingService->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('trainingServices delete')
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
