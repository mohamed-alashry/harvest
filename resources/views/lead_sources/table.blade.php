<div class="table-responsive-sm">
    <table class="table table-striped" id="leadSources-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leadSources as $leadSource)
                <tr>
                    <td>{{ $leadSource->id }}</td>
                    <td>{{ $leadSource->name }}</td>
                    <td>{{ $leadSource->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.leadSources.destroy', $leadSource->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.leadSources.show', [$leadSource->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @unless(in_array($leadSource->id, [1, 6]))
                                @can('leadSources edit')
                                    <a href="{{ route('admin.leadSources.edit', [$leadSource->id]) }}"
                                        class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                @endcan

                                @can('leadSources delete')
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                @endcan
                            @endunless
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
