<div class="table-responsive-sm">
    <table class="table table-striped" id="makeupSessions-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Group Session Id</th>
                <th>Date</th>
                <th>Time From</th>
                <th>Time To</th>
                {{-- <th>Branch Id</th> --}}
                <th>Room</th>
                <th>Instructor</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($makeupSessions as $makeupSession)
                <tr>
                    <td>{{ $makeupSession->id }}</td>
                    <td>
                        <a href="{{ route('admin.groupSessions.show', $makeupSession->group_session_id) }}">
                            {{ $makeupSession->group_session_id }}</a>
                    </td>
                    <td>{{ $makeupSession->date }}</td>
                    <td>{{ $makeupSession->time_from }}</td>
                    <td>{{ $makeupSession->time_to }}</td>
                    {{-- <td>{{ $makeupSession->branch_id }}</td> --}}
                    <td>{{ $makeupSession->room->name }}</td>
                    <td>{{ $makeupSession->instructor->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.makeupSessions.destroy', $makeupSession->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.makeupSessions.show', [$makeupSession->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('makeupSessions edit')
                                <a href="{{ route('admin.makeupSessions.edit', [$makeupSession->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('makeupSessions delete')
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
