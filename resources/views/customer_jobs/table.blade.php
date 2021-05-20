<div class="table-responsive-sm">
    <table class="table table-striped" id="customerJobs-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customerJobs as $customerJob)
                <tr>
                    <td>{{ $customerJob->id }}</td>
                    <td>{{ $customerJob->name }}</td>
                    <td>{{ $customerJob->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.customerJobs.destroy', $customerJob->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.customerJobs.show', [$customerJob->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('customerJobs edit')
                                <a href="{{ route('admin.customerJobs.edit', [$customerJob->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('customerJobs delete')
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
