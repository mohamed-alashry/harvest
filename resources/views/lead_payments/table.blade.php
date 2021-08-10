<div class="table-responsive-sm">
    <table class="table table-striped" id="leadPayments-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Service</th>
                <th>Amount</th>
                <th>Payment Plan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leadPayments as $leadPayment)
                <tr>
                    <td>{{ $leadPayment->id }}</td>
                    <td>{{ config('system_variables.lead_payments.types.' . $leadPayment->paymentable_type) }}</td>
                    <td>
                        @switch($leadPayment->paymentable_type)
                            @case('App\\Models\\ExtraItem')
                                {{ $leadPayment->paymentable->name }}
                            @break
                            @case('App\\Models\\Offer')
                                {{ $leadPayment->paymentable->title }}
                            @break
                            @default
                                {{ $leadPayment->paymentable->trainingService->title }}
                        @endswitch
                    </td>
                    <td>{{ $leadPayment->amount }}</td>
                    <td>{{ $leadPayment->paymentPlan->title }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.leadPayments.destroy', $leadPayment->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.leadPayments.show', [$leadPayment->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('leadPayments edit')
                                @if ($leadPayment->sub_payments_count)
                                    <a href="{{ route('admin.leadPayments.edit', [$leadPayment->id]) }}"
                                        class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                @endif
                            @endcan

                            @can('leadPayments delete')
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
