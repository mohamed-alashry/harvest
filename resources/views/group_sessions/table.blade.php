<div class="table-responsive-sm">
    <table class="table table-striped" id="groupSessions-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Level</th>
                <th>Room</th>
                <th>Instructor</th>
                <th>Interval</th>
                <th>Status</th>
                <th>Attandance</th>
                @can('makeupSessions create')
                    <th>MakeUp Session</th>
                @endcan
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupSessions as $groupSession)
                <tr>
                    <td>{{ $groupSession->id }}</td>
                    <td>{{ $groupSession->date }}</td>
                    <td>{{ $groupSession->level->name ?? 'Exam' }}</td>
                    <td>{{ $groupSession->room->name }}</td>
                    <td>{{ $groupSession->instructor->name }}</td>
                    <td>{{ $groupSession->interval->name }}</td>
                    <td>{{ $groupSession->status ? 'Active' : 'Cancelled' }}</td>
                    <td>
                        <a href="{{ route('admin.groupSessionAttendances.index', ['session' => $groupSession->id]) }}"
                            class="btn btn-info">
                            {{ $groupSession->attendances_count }}
                        </a>
                    </td>
                    @can('makeupSessions create')
                        <td>
                            @if ($groupSession->makeup)
                                <a href="{{ route('admin.makeupSessions.show', $groupSession->makeup->id) }}"
                                    class="btn btn-success btn-block">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @else
                                <a href="{{ route('admin.makeupSessions.create', ['session' => $groupSession->id]) }}"
                                    class="btn btn-success btn-block">
                                    <i class="fa fa-plus"></i>
                                </a>
                            @endif
                        </td>
                    @endcan
                    <td>
                        <div class='btn-group'>
                            <a href="{{ route('admin.groupSessions.show', [$groupSession->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('groupSessions edit')
                                <a href="{{ route('admin.groupSessions.edit', [$groupSession->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
