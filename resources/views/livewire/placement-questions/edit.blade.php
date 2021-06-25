<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Edit Placement Question</strong>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}
                        <div class="row">
                            <!-- Skill Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('skill', 'Skill:') !!}
                                <p>{{ $skill }}</p>
                            </div>

                            <!-- Question Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('question', 'Question:') !!}
                                {!! Form::textarea('question', null, ['class' => 'form-control', 'wire:model.lazy' => 'question', 'rows' => 3]) !!}
                            </div>

                            @if ($skill == 'Reading' && $parent_id)
                                <!-- Reading Paragraph Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::label('parent_id', 'Reading Paragraph:') !!}
                                    <p>{{ $placementQuestion->parent->paragraph }}</p>
                                </div>
                            @endif

                            @if ($skill == 'Listening' && !$parent_id)
                                <!-- mp3 Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('photo', 'mp3:') !!}
                                    {!! Form::file('photo', ['wire:model' => 'photo']) !!}
                                    @if ($placementQuestion->photo)
                                        <p>
                                            <audio controls>
                                                <source src="{{ asset('uploads/' . $placementQuestion->photo) }}"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </p>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            @endif

                            @if ($skill == 'Listening' && $parent_id)
                                <!-- mp3 Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('photo', 'mp3:') !!}
                                    @if ($placementQuestion->parent->photo)
                                        <p>
                                            <audio controls>
                                                <source
                                                    src="{{ asset('uploads/' . $placementQuestion->parent->photo) }}"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </p>
                                    @endif
                                </div>
                                <div class="clearfix"></div>

                                <!-- Listening question Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('parent_id', 'Listening question:') !!}
                                    <p>{{ $placementQuestion->parent->paragraph }}</p>
                                </div>
                            @endif

                            @if ($answers)
                                <!-- Answers -->
                                <div class="form-group col-sm-12">
                                    <hr>
                                    <h3>Answers</h3>
                                </div>
                                @foreach ($answers as $key => $value)
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('answers', 'Answer ' . $loop->iteration . ':') !!}
                                        {!! Form::text(null, $value, ['class' => 'form-control', 'wire:model.lazy' => 'answers.' . $key]) !!}
                                    </div>
                                @endforeach

                                <!-- Is Correct Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::label('is_correct', 'Correct Answer:') !!}
                                    @foreach ($answers as $key => $value)
                                        <label class="radio-inline">
                                            {!! Form::radio('is_correct', $key, $key == $is_correct, ['wire:model' => 'is_correct']) !!} Answer {{ $loop->iteration }}
                                        </label>
                                    @endforeach
                                </div>
                            @endif

                            @if ($skill == 'Writing')
                                <!-- Photo Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('photo', 'Photo:') !!}
                                    {!! Form::file('photo', ['wire:model' => 'photo']) !!}
                                    @if ($placementQuestion->photo)
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
                                @foreach ($ideas as $key => $value)
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('ideas', 'Idea ' . $loop->iteration . ':') !!}
                                        {!! Form::text(null, $value, ['class' => 'form-control', 'wire:model.lazy' => 'ideas.' . $key]) !!}
                                    </div>
                                @endforeach
                            @endif

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                <div wire:loading target="photo">Uploading...</div>
                                {!! Form::submit('Save', ['class' => 'btn btn-primary', 'wire:loading.remove' => '', 'target' => 'photo']) !!}
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
