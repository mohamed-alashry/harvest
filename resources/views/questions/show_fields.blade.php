<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $question->id }}</p>
</div>


<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $question->question }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $question->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $question->updated_at }}</p>
</div>


