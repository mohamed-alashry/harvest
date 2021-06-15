<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Create Stage</strong>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}
                        <div class="row">
                            <!-- Skill Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('skill', 'Skill:') !!}
                                {!! Form::select('skill', ['Vocabulary' => 'Vocabulary', 'Grammar' => 'Grammar', 'Reading' => 'Reading', 'Writing' => 'Writing'], null, ['class' => 'form-control', 'wire:model.lazy' => 'skill', 'placeholder' => 'Select Skill...']) !!}
                            </div>

                            <!-- Question Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('question', 'Question:') !!}
                                {!! Form::text('question', null, ['class' => 'form-control', 'wire:model.lazy' => 'question']) !!}
                            </div>

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
