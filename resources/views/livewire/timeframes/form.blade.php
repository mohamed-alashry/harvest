<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>{{ $timeframe ? 'Edit' : 'Create' }} Time Frame</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Title Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'title', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Intervals Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('intervals', 'Intervals:') !!}
                                {!! Form::select(null, $intervals_data, null, ['wire:model' => 'intervals', 'multiple' => true, 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Total Hours Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('total_hours', 'Total Hours:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'total_hours', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Session Hours Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('session_hours', 'Session Hours:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'session_hours', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Week Session Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('week_session', 'Week Session:') !!}
                                {!! Form::select(null, config('system_variables.timeframes.week_sessions'), null, ['wire:model' => 'week_session', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Days Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('days', 'Days:') !!}
                                {!! Form::select(null, config('system_variables.timeframes.days'), null, ['wire:model' => 'days', 'multiple' => true, 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Status Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('status', 'Status:') !!}
                                <label class="radio-inline">
                                    {!! Form::radio(null, '1', null, ['wire:model' => 'status']) !!} Active
                                </label>

                                <label class="radio-inline">
                                    {!! Form::radio(null, '0', null, ['wire:model' => 'status']) !!} Inactive
                                </label>

                            </div>

                            <!-- Preview -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('preview', 'Time Frame Preview:') !!}
                                {{ $preview }}
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.timeframes.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
