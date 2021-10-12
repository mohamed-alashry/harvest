<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Edit Group Session</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Date Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('date', 'Date:') !!}
                                <x-date-picker wire:model="date" data-date-orientation="bottom" placeholder="Date" />
                            </div>

                            <!-- Interval Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('interval_id', 'Interval:') !!}
                                {!! Form::select(null, $intervals, null, ['wire:model' => 'interval_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Instructor Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('instructor_id', 'Instructor:') !!}
                                {!! Form::select(null, $instructors, null, ['wire:model' => 'instructor_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Room Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('room_id', 'Room:') !!}
                                {!! Form::select(null, $rooms, null, ['wire:model' => 'room_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Status Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('status', 'Status:') !!}
                                <label class="radio-inline">
                                    {!! Form::radio(null, '1', null, ['wire:model' => 'status']) !!} Active
                                </label>

                                <label class="radio-inline">
                                    {!! Form::radio(null, '0', null, ['wire:model' => 'status']) !!} Cancelled
                                </label>

                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.groupSessions.index', ['group' => $groupSession->group_id]) }}"
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
