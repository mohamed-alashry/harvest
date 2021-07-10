<div class="table-responsive-sm">
    <table class="table table-striped" id="offers-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Fees</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
                <tr>
                    <td>{{ $offer->title }}</td>
                    <td>{{ $offer->fees }}</td>
                    <td>{{ $offer->start_date }}</td>
                    <td>{{ $offer->end_date }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.offers.destroy', $offer->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.offers.show', [$offer->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>

                            @can('offers edit')
                                <a href="{{ route('admin.offers.edit', [$offer->id]) }}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                            @endcan

                            @can('offers delete')
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
