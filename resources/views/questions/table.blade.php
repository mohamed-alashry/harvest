<div class="table-responsive-sm">
    <table class="table table-striped" id="questions-table">
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
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->skill }}</td>
                    <td>{{ $question->question }}</td>
                    <td>
                        @if ($question->skill == 'Reading' && !$question->parent_id)
                            Paragraph
                        @elseif ($question->skill == 'Listening' && !$question->parent_id)
                            MP3
                        @else
                            Question
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['route' => ['admin.questions.destroy', $question->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.questions.show', [$question->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                            @can('questions edit')
                                <a href="{{ route('admin.questions.edit', [$question->id]) }}"
                                    class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('questions delete')
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
