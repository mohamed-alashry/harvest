<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit fa-lg"></i>
                        <strong>Edit Course</strong>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}
                        <div class="row">
                            <!-- Track Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('parent_id', 'Track:') !!}
                                {!! Form::select(null, $tracks, null, ['class' => 'form-control', 'wire:model' => 'parent_id', 'placeholder' => 'Select Track...']) !!}
                            </div>

                            <!-- Course Title Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('title', 'Course Title:') !!}
                                {!! Form::text(null, null, ['class' => 'form-control', 'wire:model.debounce.500ms' => 'title']) !!}
                            </div>

                            <!-- Stages -->
                            @foreach ($stages as $i => $stage)

                                <div class="form-group col-sm-12">
                                    <hr>
                                    <h3>
                                        Stage <button wire:click="deleteStage({{ $i }})"
                                            wire:key="delete-stage-{{ $i }}" type="button"
                                            class="btn btn-outline-danger btn-sm rounded-circle">X</button>
                                    </h3>
                                </div>

                                <!-- Name Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('name', 'Name:') !!}
                                    {!! Form::text(null, null, ['class' => 'form-control', 'wire:model.debounce.500ms' => "stages.$i.name", 'wire:key' => "stage-$i"]) !!}
                                </div>

                                @foreach ($stage['levels'] as $n => $level)

                                    <!-- Level Name Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('level', 'Level Name:') !!}
                                        {!! Form::text(null, null, ['class' => 'form-control', 'wire:model.debounce.500ms' => "stages.$i.levels.$n.name", 'wire:key' => "level-$i-$n"]) !!}
                                    </div>

                                @endforeach

                                <div class="form-group col-sm-12">
                                    <button wire:click='addStageLevel({{ $i }})'
                                        wire:key="add-level-{{ $i }}-{{ $n }}" type="button"
                                        class="btn btn-warning">Add Level</button>
                                </div>

                            @endforeach

                            <div class="form-group col-sm-12">
                                <hr>
                                <p>Levels: {{ $levels }}</p>
                                <button wire:click='addStage()' wire:key="add-stage" type="button"
                                    class="btn btn-success">Add Stage</button>
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
