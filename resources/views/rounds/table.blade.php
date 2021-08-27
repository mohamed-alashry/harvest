<div class="table-responsive-sm">
    <table class="table table-striped" id="rounds-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>TimeFrame</th>
                <th>Title</th>
                <th>Sub Rounds</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rounds as $round)
                <tr>
                    <td>{{ $round->id }}</td>
                    <td>{{ $round->timeframe->title }}
                    </td>
                    <td>{{ $round->title }}</td>
                    <td>
                        <a href="{{ route('admin.subRounds.index', ['round' => $round->id]) }}"
                            class="btn btn-warning">{{ $round->sub_rounds_count }}</a>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['admin.rounds.destroy', $round->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.rounds.show', [$round->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>

                            @can('rounds edit')
                                <a href="{{ route('admin.rounds.edit', [$round->id]) }}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                            @endcan

                            @can('rounds delete')
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
