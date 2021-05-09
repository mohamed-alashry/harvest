<div class="table-responsive-sm">
    <table class="table table-striped" id="leads-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile 1</th>
                <th>Cases</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>{{ $lead->name['en'] }}</td>
                    <td>{{ $lead->mobile_1 }}</td>
                    <td>
                        <a href="{{ route('admin.leadCases.index', ['lead' => $lead->id]) }}"
                            class="btn btn-warning">{{ $lead->cases_count }}</a>
                    </td>
                    <td>{{ $lead->created_at }}</td>
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
