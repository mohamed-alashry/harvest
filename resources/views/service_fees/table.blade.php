<div class="table-responsive-sm">
    <table class="table table-striped" id="serviceFees-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Training Service</th>
                <th>Timeframe</th>
                <th>Payment Plan</th>
                <th>Fees</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($serviceFees as $serviceFee)
                <tr>
                    <td>{{ $serviceFee->id }}</td>
                    <td>{{ $serviceFee->trainingService->title }}</td>
                    <td>{{ $serviceFee->timeframe->title }}</td>
                    <td>{{ $serviceFee->paymentPlan->title }}</td>
                    <td>{{ $serviceFee->fees }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.serviceFees.destroy', $serviceFee->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.serviceFees.show', [$serviceFee->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('serviceFees edit')
                                <a href="{{ route('admin.serviceFees.edit', [$serviceFee->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('serviceFees delete')
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
