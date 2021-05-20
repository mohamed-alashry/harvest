<div class="table-responsive-sm">
    <table class="table table-striped" id="rooms-table">
        <thead>
            <tr>
                <th>Branch</th>
                <th>Name</th>
                <th>Max Student</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->branch->name }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->max_student }}</td>
                    <td>{{ $room->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.rooms.destroy', $room->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.rooms.show', [$room->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>

                            @can('rooms edit')
                                <a href="{{ route('admin.rooms.edit', [$room->id]) }}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                            @endcan

                            @can('rooms delete')
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
