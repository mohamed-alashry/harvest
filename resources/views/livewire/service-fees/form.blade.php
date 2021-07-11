<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>{{ $serviceFee ? 'Edit' : 'Create' }} Service Fees</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Training Service Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('training_service_id', 'Training Service:') !!}
                                {!! Form::select(null, $services, null, ['wire:model' => 'training_service_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Timeframe Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('timeframe_id', 'Timeframe:') !!}
                                {!! Form::select(null, $timeframes, null, ['wire:model' => 'timeframe_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Fees Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('fees', 'Fees:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'fees', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Payment Plan Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('payment_plan_id', 'Payment Plan:') !!}
                                {!! Form::select(null, $paymentPlans, null, ['wire:model' => 'payment_plan_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            {{-- Installment --}}
                            @if ($payment_plan_id == 1)
                                <div class="form-group col-sm-12">
                                    <hr>
                                    <h4>Installment</h4>
                                </div>

                                <!-- Deposit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::label('deposit', 'Deposit:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'installment.deposit', 'class' => 'form-control']) !!}
                                </div>

                                <!-- First Payment Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('first_payment', 'First Payment:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'installment.first_payment', 'class' => 'form-control']) !!}
                                </div>

                                <!-- First Due Date Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('first_due_date', 'First Due Date:') !!}
                                    {!! Form::select(null, $dueDates, null, ['wire:model' => 'installment.first_due_date', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>

                                <!-- Second Payment Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('second_payment', 'Second Payment:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'installment.second_payment', 'class' => 'form-control']) !!}
                                </div>

                                <!-- Second Due Date Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('second_due_date', 'Second Due Date:') !!}
                                    {!! Form::select(null, $dueDates, null, ['wire:model' => 'installment.second_due_date', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>

                                <!-- Third Payment Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('third_payment', 'Third Payment:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'installment.third_payment', 'class' => 'form-control']) !!}
                                </div>

                                <!-- Third Due Date Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('third_due_date', 'Third Due Date:') !!}
                                    {!! Form::select(null, $dueDates, null, ['wire:model' => 'installment.third_due_date', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>

                                <!-- Fourth Payment Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('fourth_payment', 'Fourth Payment:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'installment.fourth_payment', 'class' => 'form-control']) !!}
                                </div>

                                <!-- Fourth Due Date Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('fourth_due_date', 'Fourth Due Date:') !!}
                                    {!! Form::select(null, $dueDates, null, ['wire:model' => 'installment.fourth_due_date', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>
                            @endif

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.serviceFees.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
