<div class="table-responsive-sm">
    <table class="table table-striped" id="stages-table">
        <thead>
            <tr>
                <th>Track Id</th>
        <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stages as $stage)
            <tr>
                <td>{{ $stage->track_id }}</td>
            <td>{{ $stage->name }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.stages.destroy', $stage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.stages.show', [$stage->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                        @can('stages edit')
                            <a href="{{ route('admin.stages.edit', [$stage->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan

                        @can('stages delete')
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
