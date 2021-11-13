<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>{{ $exam ? 'Edit' : 'Create' }} Exam</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Title Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'title', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Duration Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('duration', 'Duration:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'duration', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Success Rate Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('success_rate', 'Success Rate:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'success_rate', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Track Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('track', 'Track:') !!}
                                {!! Form::select(null, $tracks, null, ['wire:model' => 'track_id', 'class' => 'form-control', 'placeholder' => 'Select Track...']) !!}
                            </div>

                            <!-- Sub Track Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('course', 'Sub Track:') !!}
                                {!! Form::select(null, $courses, null, ['wire:model' => 'course_id', 'class' => 'form-control', 'placeholder' => 'Select course...']) !!}
                            </div>

                            <!-- Levels Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('levels', 'Levels:') !!}
                                {!! Form::select(null, $stageLevels, null, ['wire:model' => 'levels', 'class' => 'form-control', 'multiple' => true, 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.trainingServices.index') }}"
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
