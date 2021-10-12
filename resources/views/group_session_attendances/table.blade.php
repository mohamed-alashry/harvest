<div class="table-responsive-sm">
    <table class="table table-striped" id="groupSessionAttendances-table">
        <thead>
            <tr>
                <th>Lead</th>
                <th>Attendance</th>
                <th>Need Makeup</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupSessionAttendances as $groupSessionAttendance)
                <tr>
                    <td>{{ $groupSessionAttendance->lead->name['en'] }}</td>
                    <td>
                        @switch($groupSessionAttendance->attendance)
                            @case(1)
                                Present
                            @break
                            @case(0)
                                Absent
                            @break
                            @default
                                __
                        @endswitch
                    </td>
                    <td>{{ $groupSessionAttendance->need_makeup ? 'Yes' : 'No' }}</td>
                    <td>
                        <div class='btn-group'>
                            {{-- <a href="{{ route('admin.groupSessionAttendances.show', [$groupSessionAttendance->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a> --}}

                            @can('groupSessionAttendances edit')
                                <a href="{{ route('admin.groupSessionAttendances.edit', [$groupSessionAttendance->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
