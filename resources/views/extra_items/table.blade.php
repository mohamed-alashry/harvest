<div class="table-responsive-sm">
    <table class="table table-striped" id="extraItems-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Item Category</th>
                <th>Price</th>
                <th>Payment Plan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($extraItems as $extraItem)
                <tr>
                    <td>{{ $extraItem->id }}</td>
                    <td>{{ $extraItem->name }}</td>
                    <td>{{ $extraItem->itemCategory->name }}</td>
                    <td>{{ $extraItem->price }}</td>
                    <td>{{ $extraItem->paymentPlan->title }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.extraItems.destroy', $extraItem->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.extraItems.show', [$extraItem->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('extraItems edit')
                                <a href="{{ route('admin.extraItems.edit', [$extraItem->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('extraItems delete')
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
