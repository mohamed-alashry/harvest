<div class="table-responsive-sm">
    <table class="table table-striped" id="groups-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Parent Group ID</th>
                <th>Round</th>
                <th>Discipline</th>
                <th>Branch</th>
                <th>Room</th>
                <th>Instructor</th>
                <th>Interval</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->title }}</td>
                    <td>{{ $group->parent->id ?? 'Parent' }}</td>
                    <td>{{ $group->round->title }}</td>
                    <td>{{ $group->discipline->name }}</td>
                    <td>{{ $group->branch->name }}</td>
                    <td>{{ $group->room->name }}</td>
                    <td>{{ $group->instructor->name }}</td>
                    <td>{{ $group->interval->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.groups.destroy', $group->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.groups.show', [$group->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>

                            @can('groups edit')
                                <a href="{{ route('admin.groups.edit', [$group->id]) }}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                            @endcan

                            @can('groups delete')
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endcan
                            @if (!$group->parent_id)
                                @can('groups create')
                                    <a href="{{ route('admin.groups.create', ['parent' => $group->id]) }}"
                                        class="btn btn-ghost-success"><i class="fa  fa-level-up"></i> upgrade</a>
                                @endcan
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
