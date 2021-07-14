<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>{{ $offer ? 'Edit' : 'Create' }} Offer</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Title Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'title', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Discipline Category Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('disciplines', 'Discipline Category:') !!}
                                {!! Form::select(null, $disciplines_data, null, ['wire:model' => 'disciplines', 'multiple' => true, 'class' => 'form-control']) !!}
                            </div>

                            <!-- Items Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('items', 'Items:') !!}
                                {!! Form::select(null, $items_data, null, ['wire:model' => 'items', 'multiple' => true, 'class' => 'form-control']) !!}
                            </div>

                            <!-- Service Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('services', 'Service:') !!}
                                {!! Form::select(null, $services_data, null, ['wire:model' => 'services', 'multiple' => true, 'class' => 'form-control']) !!}
                            </div>

                            <!-- Start Date Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('start_date', 'Start Date:') !!}
                                {!! Form::date(null, null, ['wire:model.debounce.500ms' => 'start_date', 'class' => 'form-control']) !!}
                            </div>

                            <!-- End Date Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('end_date', 'End Date:') !!}
                                {!! Form::date(null, null, ['wire:model.debounce.500ms' => 'end_date', 'class' => 'form-control']) !!}
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

                            <!-- Total Amount Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('total_amount', 'Total Amount:') !!}
                                <span>{{ $total_amount }}</span>
                            </div>

                            {{-- Installment --}}
                            @if ($payment_plan_id == 1)
                                <!-- Payment Plan Id Field -->
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
                                    {!! Form::select(null, config('system_variables.lead_payments.due_dates'), null, ['wire:model' => 'installment.first_due_date', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>

                                <!-- Second Payment Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('second_payment', 'Second Payment:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'installment.second_payment', 'class' => 'form-control']) !!}
                                </div>

                                <!-- Second Due Date Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('second_due_date', 'Second Due Date:') !!}
                                    {!! Form::select(null, config('system_variables.lead_payments.due_dates'), null, ['wire:model' => 'installment.second_due_date', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>

                                <!-- Third Payment Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('third_payment', 'Third Payment:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'installment.third_payment', 'class' => 'form-control']) !!}
                                </div>

                                <!-- Third Due Date Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('third_due_date', 'Third Due Date:') !!}
                                    {!! Form::select(null, config('system_variables.lead_payments.due_dates'), null, ['wire:model' => 'installment.third_due_date', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>

                                <!-- Fourth Payment Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('fourth_payment', 'Fourth Payment:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'installment.fourth_payment', 'class' => 'form-control']) !!}
                                </div>

                                <!-- Fourth Due Date Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('fourth_due_date', 'Fourth Due Date:') !!}
                                    {!! Form::select(null, config('system_variables.lead_payments.due_dates'), null, ['wire:model' => 'installment.fourth_due_date', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>
                            @endif

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
