<div class="table-responsive-sm">
    <table class="table table-striped" id="timeframes-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Total Hours</th>
                <th>Session Hours</th>
                <th>Week Session</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timeframes as $timeframe)
                <tr>
                    <td>{{ $timeframe->title }}</td>
                    <td>{{ $timeframe->total_hours }}</td>
                    <td>{{ $timeframe->session_hours }}</td>
                    <td>{{ config('system_variables.timeframes.week_sessions.' . $timeframe->week_session) }}</td>
                    <td>{{ $timeframe->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.timeframes.destroy', $timeframe->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.timeframes.show', [$timeframe->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('timeframes edit')
                                <a href="{{ route('admin.timeframes.edit', [$timeframe->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('timeframes delete')
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
