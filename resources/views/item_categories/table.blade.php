<div class="table-responsive-sm">
    <table class="table table-striped" id="itemCategories-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itemCategories as $itemCategory)
                <tr>
                    <td>{{ $itemCategory->id }}</td>
                    <td>{{ $itemCategory->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.itemCategories.destroy', $itemCategory->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.itemCategories.show', [$itemCategory->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('itemCategories edit')
                                <a href="{{ route('admin.itemCategories.edit', [$itemCategory->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('itemCategories delete')
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
