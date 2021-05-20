<div class="table-responsive-sm">
    <table class="table table-striped" id="intervals-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Time</th>
                <th>Pattern</th>
                <th>Sort</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($intervals as $interval)
                <tr>
                    <td>{{ $interval->id }}</td>
                    <td>{{ $interval->name }}</td>
                    <td>{{ $interval->time }}</td>
                    <td>{{ $interval->pattern == 'AM' ? 'Morning (AM)' : 'Evening (PM)' }}</td>
                    <td>{{ $interval->sort }}</td>
                    <td>{{ $interval->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.intervals.destroy', $interval->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.intervals.show', [$interval->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('intervals edit')
                                <a href="{{ route('admin.intervals.edit', [$interval->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('intervals delete')
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
