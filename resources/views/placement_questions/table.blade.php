<div class="table-responsive-sm">
    <table class="table table-striped" id="placementQuestions-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Skill</th>
                <th>Question</th>
                <th>Question Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($placementQuestions as $placementQuestion)
                <tr>
                    <td>{{ $placementQuestion->id }}</td>
                    <td>{{ $placementQuestion->skill }}</td>
                    <td>{{ $placementQuestion->question }}</td>
                    <td>
                        @if ($placementQuestion->skill == 'Reading' && !$placementQuestion->parent_id)
                            Paragraph
                        @else
                            Question
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['route' => ['admin.placementQuestions.destroy', $placementQuestion->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.placementQuestions.show', [$placementQuestion->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('placementQuestions edit')
                                <a href="{{ route('admin.placementQuestions.edit', [$placementQuestion->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('placementQuestions delete')
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
