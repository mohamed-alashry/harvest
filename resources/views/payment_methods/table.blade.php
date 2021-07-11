<div class="table-responsive-sm">
    <table class="table table-striped" id="paymentMethods-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Has Transaction Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentMethods as $paymentMethod)
                <tr>
                    <td>{{ $paymentMethod->title }}</td>
                    <td>{{ $paymentMethod->has_transaction_number ? 'Yes' : 'No' }}</td>
                    <td>{{ $paymentMethod->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.paymentMethods.destroy', $paymentMethod->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.paymentMethods.show', [$paymentMethod->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('paymentMethods edit')
                                <a href="{{ route('admin.paymentMethods.edit', [$paymentMethod->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('paymentMethods delete')
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
