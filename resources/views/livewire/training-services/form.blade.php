<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>{{ $trainingService ? 'Edit' : 'Create' }} Training Service</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Track Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('track', 'Track:') !!}
                                {!! Form::select(null, $tracks, null, ['wire:model' => 'track_id', 'class' => 'form-control', 'placeholder' => 'Select Track...']) !!}
                            </div>

                            <!-- Course Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('course', 'Course:') !!}
                                {!! Form::select(null, $courses, null, ['wire:model' => 'course_id', 'class' => 'form-control', 'placeholder' => 'Select course...']) !!}
                                levels: {{ $levels }}
                            </div>

                            <!-- Title Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'title', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Pattern Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('pattern', 'Pattern:') !!}
                                {!! Form::select(null, ['AM' => 'Morning (AM)', 'PM' => 'Evening (PM)', 'MIX' => 'AM/PM (MIX)'], null, ['wire:model' => 'pattern', 'class' => 'form-control', 'placeholder' => 'Select Pattern...']) !!}
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
