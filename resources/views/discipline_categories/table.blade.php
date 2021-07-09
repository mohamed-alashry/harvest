<div class="table-responsive-sm">
    <table class="table table-striped" id="disciplineCategories-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Max Student</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplineCategories as $disciplineCategory)
                <tr>
                    <td>{{ $disciplineCategory->name }}</td>
                    <td>{{ $disciplineCategory->max_student }}</td>
                    <td>{{ $disciplineCategory->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.disciplineCategories.destroy', $disciplineCategory->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.disciplineCategories.show', [$disciplineCategory->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('disciplineCategories edit')
                                <a href="{{ route('admin.disciplineCategories.edit', [$disciplineCategory->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('disciplineCategories delete')
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
