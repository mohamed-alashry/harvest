<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>{{ $group ? 'Edit' : 'Create' }} Group</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Title Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'title', 'disabled' => !!$parent_id, 'class' => 'form-control']) !!}
                            </div>

                            <!-- Discipline Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('discipline_id', 'Discipline:') !!}
                                {!! Form::select(null, $disciplines, null, ['wire:model' => 'discipline_id', 'disabled' => !!$parent_id, 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Round Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('round_id', 'Round:') !!}
                                {!! Form::select(null, $rounds, null, ['wire:model' => 'round_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Days Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('days', 'Days:') !!}
                                {{-- {!! Form::select(null, $daysData, null, ['wire:model' => 'days', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!} --}}
                                <select wire:model="days" class="form-control">
                                    <option value="">Select Option...</option>
                                    @foreach ($daysData as $day)
                                        <option value="{{ $day }}">
                                            {{ config('system_variables.timeframes.days')[$day] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Sub Round Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('sub_round_id', 'Sub Round:') !!}
                                {!! Form::select(null, $subRounds, null, ['wire:model' => 'sub_round_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Interval Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('interval_id', 'Interval:') !!}
                                {!! Form::select(null, $intervals, null, ['wire:model' => 'interval_id', 'disabled' => !!$parent_id, 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Branch Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('branch_id', 'Branch:') !!}
                                {!! Form::select(null, $branches, null, ['wire:model' => 'branch_id', 'disabled' => !!$parent_id, 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Instructor Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('instructor_id', 'Instructor:') !!}
                                {!! Form::select(null, $instructors, null, ['wire:model' => 'instructor_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Room Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('room_id', 'Room:') !!}
                                {!! Form::select(null, $rooms, null, ['wire:model' => 'room_id', 'disabled' => !!$parent_id, 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Admin Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('admin_id', 'Admin:') !!}
                                {!! Form::select(null, $admins, null, ['wire:model' => 'admin_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Track Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('track', 'Track:') !!}
                                {!! Form::select(null, $tracks, null, ['wire:model' => 'track_id', 'disabled' => !!$parent_id, 'class' => 'form-control', 'placeholder' => 'Select Track...']) !!}
                            </div>

                            <!-- Sub Track Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('course', 'Sub Track:') !!}
                                {!! Form::select(null, $courses, null, ['wire:model' => 'course_id', 'disabled' => !!$parent_id, 'class' => 'form-control', 'placeholder' => 'Select course...']) !!}
                            </div>

                            <!-- Levels Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('levels', 'Levels:') !!}
                                {!! Form::select(null, $stageLevels, null, ['wire:model' => 'levels', 'class' => 'form-control', 'multiple' => true, 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.groups.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
