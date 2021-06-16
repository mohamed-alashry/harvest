<!-- Applicant Answers Field -->
@foreach ($placementApplicant->answers as $answer)

    <div class="form-group col-sm-12">
        {!! Form::label('writing_score', 'Q: ' . $answer->question->question) !!}
        <p>
            {{ $answer->answer }}
        </p>
    </div>
@endforeach

<div class="form-group col-sm-12">
    <hr>
</div>

<!-- Writing Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('writing_score', 'Writing Score:') !!}
    {!! Form::number('writing_score', null, ['class' => 'form-control', 'step' => 0.5]) !!}
</div>

<!-- Speaking Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('speaking_score', 'Speaking Score:') !!}
    {!! Form::number('speaking_score', null, ['class' => 'form-control', 'step' => 0.5]) !!}
</div>

<!-- Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level', 'Level:') !!}
    {!! Form::number('level', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', 'new', null) !!} New
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', 'done', null) !!} Done
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.placementApplicants.index') }}" class="btn btn-secondary">Cancel</a>
</div>
