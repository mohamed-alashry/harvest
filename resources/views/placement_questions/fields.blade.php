<!-- Skill Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skill', 'Skill:') !!}
    {!! Form::select('skill', ['Vocabulary' => 'Vocabulary', 'Grammar' => 'Grammar', 'Reading' => 'Reading', 'Writing' => 'Writing'], null, ['class' => 'form-control', 'placeholder' => 'Select Skill...']) !!}
</div>

<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::textarea('question', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Main Question:') !!}
    {!! Form::select('parent_id', $parentQuestions, null, ['class' => 'form-control', 'placeholder' => 'Select Main Question...']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo') !!}
    @if (isset($placementQuestion) && $placementQuestion->photo)
        <p><img src="{{ asset('uploads/' . $placementQuestion->photo) }}" width="200"></p>
    @endif
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.placementQuestions.index') }}" class="btn btn-secondary">Cancel</a>
</div>
