<div class="table-responsive-sm">
    <table class="table table-striped" id="placementApplicants-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Level</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($placementApplicants as $placementApplicant)
                <tr>
                    <td>{{ $placementApplicant->id }}</td>
                    <td>{{ $placementApplicant->name }}</td>
                    <td>{{ $placementApplicant->email }}</td>
                    <td>{{ $placementApplicant->mobile }}</td>
                    <td>{{ $placementApplicant->gender }}</td>
                    <td>{{ $placementApplicant->level }}</td>
                    <td>{{ $placementApplicant->status }}</td>
                    <td>{{ $placementApplicant->created_at }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.placementApplicants.destroy', $placementApplicant->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.placementApplicants.show', [$placementApplicant->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('placementApplicants sendMail')
                                <a href="{{ route('admin.placementApplicants.sendMail', [$placementApplicant->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-envelope"></i></a>
                            @endcan

                            @can('placementApplicants edit')
                                <a href="{{ route('admin.placementApplicants.edit', [$placementApplicant->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('placementApplicants delete')
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
