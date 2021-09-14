<div class="table-responsive-sm">
    <table class="table table-striped" id="groupSessions-table">
        <thead>
            <tr>
                <th>Group Id</th>
        <th>Sub Round Id</th>
        <th>Date</th>
        <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($groupSessions as $groupSession)
            <tr>
                <td>{{ $groupSession->group_id }}</td>
            <td>{{ $groupSession->sub_round_id }}</td>
            <td>{{ $groupSession->date }}</td>
            <td>{{ $groupSession->level }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.groupSessions.destroy', $groupSession->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.groupSessions.show', [$groupSession->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                        @can('groupSessions edit')
                            <a href="{{ route('admin.groupSessions.edit', [$groupSession->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan

                        @can('groupSessions delete')
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
