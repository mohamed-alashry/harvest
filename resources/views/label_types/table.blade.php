<div class="table-responsive-sm">
    <table class="table table-striped" id="labelTypes-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Label</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labelTypes as $labelType)
                <tr>
                    <td>{{ $labelType->name }}</td>
                    <td>{{ $labelType->label->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.labelTypes.destroy', $labelType->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.labelTypes.show', [$labelType->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('labelTypes edit')
                                <a href="{{ route('admin.labelTypes.edit', [$labelType->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('labelTypes delete')
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
