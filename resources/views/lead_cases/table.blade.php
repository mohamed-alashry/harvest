<div class="table-responsive-sm">
    <table class="table table-striped" id="leadCases-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Serial</th>
                <th>Type</th>
                <th>Call Type</th>
                {{-- <th>Employee</th> --}}
                {{-- <th>Status</th> --}}
                <th>Action</th>
                <th>Action Date</th>
                <th>Feedback</th>
                <th>Feedback Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leadCases as $leadCase)
                <tr>
                    <td>{{ $leadCase->id }}</td>
                    <td>{{ $leadCase->serial }}</td>
                    <td>
                        @switch($leadCase->type)
                            @case(1)
                                Lead
                            @break
                            @case(2)
                                Customer
                            @break
                            @default
                                Group
                        @endswitch
                    </td>
                    <td>{{ $leadCase->call_type == 1 ? 'Inbound' : 'Outbound' }}</td>
                    {{-- <td>{{ $leadCase->employee->name }}</td> --}}
                    {{-- <td>{{ $leadCase->status }}</td> --}}
                    <td>{{ $leadCase->action }}</td>
                    <td>{{ $leadCase->date }}</td>
                    <td>{{ $leadCase->feedback }}</td>
                    <td>{{ $leadCase->feedback_date }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.leadCases.destroy', $leadCase->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.leadCases.show', [$leadCase->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('leadCases edit')
                                <a href="{{ route('admin.leadCases.edit', [$leadCase->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('leadCases delete')
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
