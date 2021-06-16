<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Create Placement Question</strong>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}
                        <div class="row">
                            <!-- Skill Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('skill', 'Skill:') !!}
                                {!! Form::select('skill', ['Vocabulary' => 'Vocabulary', 'Grammar' => 'Grammar', 'Reading' => 'Reading', 'Writing' => 'Writing', 'Listening' => 'Listening'], null, ['class' => 'form-control', 'wire:model.lazy' => 'skill', 'placeholder' => 'Select Skill...']) !!}
                            </div>

                            <!-- Question Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('question', 'Question:') !!}
                                {!! Form::textarea('question', null, ['class' => 'form-control', 'wire:model.lazy' => 'question', 'rows' => 3]) !!}
                            </div>

                            @if ($skill == 'Reading')
                                <!-- Reading Paragraph Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::label('parent_id', 'Reading Paragraph:') !!}
                                    {!! Form::select('parent_id', $paragraphs, null, ['class' => 'form-control', 'wire:model.lazy' => 'parent_id', 'placeholder' => 'Select Paragraph...']) !!}
                                </div>
                            @endif

                            @if ($skill == 'Listening' && !$parent_id)
                                <!-- mp3 Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('photo', 'mp3:') !!}
                                    {!! Form::file('photo', ['wire:model' => 'photo']) !!}
                                </div>
                                <div class="clearfix"></div>
                            @endif

                            @if ($skill == 'Listening' && !$photo)
                                <!-- Listening Question Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('parent_id', 'Listening Question:') !!}
                                    {!! Form::select('parent_id', $paragraphs, null, ['class' => 'form-control', 'wire:model.lazy' => 'parent_id', 'placeholder' => 'Select Question...']) !!}
                                </div>
                            @endif

                            @if (in_array($skill, ['Vocabulary', 'Grammar']))
                                <!-- Answers -->
                                <div class="form-group col-sm-12">
                                    <hr>
                                    <h3>Answers</h3>
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('answers', 'Answer 1:') !!}
                                    {!! Form::text(null, null, ['class' => 'form-control', 'wire:model.lazy' => 'answers.0']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('answers', 'Answer 2:') !!}
                                    {!! Form::text(null, null, ['class' => 'form-control', 'wire:model.lazy' => 'answers.1']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('answers', 'Answer 3:') !!}
                                    {!! Form::text(null, null, ['class' => 'form-control', 'wire:model.lazy' => 'answers.2']) !!}
                                </div>

                                <!-- Is Correct Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::label('is_correct', 'Correct Answer:') !!}
                                    <label class="radio-inline">
                                        {!! Form::radio('is_correct', 0, null, ['wire:model' => 'is_correct']) !!} Answer 1
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_correct', 1, null, ['wire:model' => 'is_correct']) !!} Answer 2
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_correct', 2, null, ['wire:model' => 'is_correct']) !!} Answer 3
                                    </label>
                                </div>
                            @endif

                            @if (in_array($skill, ['Reading', 'Listening']) && $parent_id)
                                <!-- Answers -->
                                <div class="form-group col-sm-12">
                                    <hr>
                                    <h3>Answers</h3>
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('answers', 'Answer 1:') !!}
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'wire:model.lazy' => 'answers.0']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('answers', 'Answer 2:') !!}
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'wire:model.lazy' => 'answers.1']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('answers', 'Answer 3:') !!}
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'wire:model.lazy' => 'answers.2']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('answers', 'Answer 4:') !!}
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'wire:model.lazy' => 'answers.3']) !!}
                                </div>

                                <!-- Is Correct Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::label('is_correct', 'Correct Answer:') !!}
                                    <label class="radio-inline">
                                        {!! Form::radio('is_correct', 0, null, ['wire:model' => 'is_correct']) !!} Answer 1
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_correct', 1, null, ['wire:model' => 'is_correct']) !!} Answer 2
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_correct', 2, null, ['wire:model' => 'is_correct']) !!} Answer 3
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_correct', 3, null, ['wire:model' => 'is_correct']) !!} Answer 4
                                    </label>
                                </div>
                            @endif

                            @if ($skill == 'Writing')
                                <!-- Photo Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('photo', 'Photo:') !!}
                                    {!! Form::file('photo', ['wire:model' => 'photo']) !!}
                                    @if (isset($placementQuestion) && $placementQuestion->photo)
                                        <p><img src="{{ asset('uploads/' . $placementQuestion->photo) }}" width="200">
                                        </p>
                                    @endif
                                </div>
                                <div class="clearfix"></div>

                                <!-- Ideas -->
                                <div class="form-group col-sm-12">
                                    <hr>
                                    <h3>Ideas To Help</h3>
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('ideas', 'Idea 1:') !!}
                                    {!! Form::text('ideas[]', null, ['class' => 'form-control', 'wire:model.lazy' => 'ideas.0']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('ideas', 'Idea 2:') !!}
                                    {!! Form::text('ideas[]', null, ['class' => 'form-control', 'wire:model.lazy' => 'ideas.1']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('ideas', 'Idea 3:') !!}
                                    {!! Form::text('ideas[]', null, ['class' => 'form-control', 'wire:model.lazy' => 'ideas.2']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('ideas', 'Idea 4:') !!}
                                    {!! Form::text('ideas[]', null, ['class' => 'form-control', 'wire:model.lazy' => 'ideas.3']) !!}
                                </div>

                            @endif

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.placementQuestions.index') }}"
                                    class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
