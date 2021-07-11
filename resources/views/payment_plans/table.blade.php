<div class="table-responsive-sm">
    <table class="table table-striped" id="paymentPlans-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentPlans as $paymentPlan)
                <tr>
                    <td>{{ $paymentPlan->title }}</td>
                    <td>{{ $paymentPlan->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.paymentPlans.destroy', $paymentPlan->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.paymentPlans.show', [$paymentPlan->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @if ($paymentPlan->id != 1)
                                @can('paymentPlans edit')
                                    <a href="{{ route('admin.paymentPlans.edit', [$paymentPlan->id]) }}"
                                        class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                @endcan

                                @can('paymentPlans delete')
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                @endcan
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
