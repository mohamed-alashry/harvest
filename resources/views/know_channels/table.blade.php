<div class="table-responsive-sm">
    <table class="table table-striped" id="knowChannels-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($knowChannels as $knowChannel)
                <tr>
                    <td>{{ $knowChannel->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.knowChannels.destroy', $knowChannel->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.knowChannels.show', [$knowChannel->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.knowChannels.edit', [$knowChannel->id]) }}"
                                class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
