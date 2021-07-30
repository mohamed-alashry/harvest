<div class="table-responsive-sm">
    <table class="table table-striped" id="subRounds-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Start Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subRounds as $subRound)
                <tr>
                    <td>{{ $subRound->id }}</td>
                    <td>{{ $subRound->start_date }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.subRounds.destroy', $subRound->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.subRounds.show', [$subRound->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('subRounds edit')
                                <a href="{{ route('admin.subRounds.edit', [$subRound->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('subRounds delete')
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
