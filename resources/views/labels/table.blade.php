<div class="table-responsive-sm">
    <table class="table table-striped" id="labels-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labels as $label)
                <tr>
                    <td>{{ $label->name }}</td>
                    <td>{{ $label->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.labels.destroy', $label->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.labels.show', [$label->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>

                            @can('labels edit')
                                <a href="{{ route('admin.labels.edit', [$label->id]) }}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                            @endcan

                            @can('labels delete')
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
