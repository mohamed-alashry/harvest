<div class="table-responsive-sm">
    <table class="table table-striped" id="leads-table">
        <thead>
            <tr>
                <th>Registration At</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Assigned Employee</th>
                <th>Follow Up</th>
                {{-- <th>Payments</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>{{ $lead->created_at }}</td>
                    <td>{{ $lead->name['en'] }}</td>
                    <td>{{ $lead->mobile_1 }}</td>
                    <td>{{ $lead->assignedEmployee->name ?? '' }}</td>
                    <td>
                        <a href="{{ route('admin.leadCases.index', ['lead' => $lead->id]) }}"
                            class="btn btn-warning">{{ $lead->cases_count }}</a>
                    </td>
                    {{-- <td>
                        <a href="{{ route('admin.leadPayments.index', ['lead' => $lead->id]) }}"
                            class="btn btn-warning">{{ $lead->payments_count }}</a>
                    </td> --}}
                    <td>
                        {!! Form::open(['route' => ['admin.leads.destroy', $lead->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.leads.show', [$lead->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>

                            @can('leads edit')
                                <a href="{{ route('admin.leads.edit', [$lead->id]) }}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                            @endcan

                            @can('leads delete')
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
