<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Create Payment</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Lead Level Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('paymentable_type', 'Lead Level:') !!}
                                <p>{{ $lead->pt_level }}</p>
                            </div>
                            <!-- Type Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('paymentable_type', 'Type:') !!}
                                {!! Form::select(null, config('system_variables.lead_payments.types'), null, ['wire:model' => 'paymentable_type', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Option Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('paymentable_id', 'Option:') !!}
                                {!! Form::select(null, $services, null, ['wire:model' => 'paymentable_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            @if (isset($service))
                                <div class="form-group col-sm-12">
                                    <hr>
                                </div>

                                <!-- Payment Plan Field -->
                                <div class="form-group col-sm-4">
                                    {!! Form::label('amount', 'Payment Plan:') !!}
                                    {{ $service->payment_plan_id == 2 ? 'Cash' : 'Installment' }}
                                </div>

                                <!-- Amount Field -->
                                <div class="form-group col-sm-4">
                                    {!! Form::label('amount', 'Amount:') !!}
                                    {{ $paymentable_type == 'App\\Models\\ExtraItem' ? $service->price : $service->fees }}
                                </div>

                                @if ($service->payment_plan_id == 1)
                                    <!-- Deposit Field -->
                                    <div class="form-group col-sm-4">
                                        {!! Form::label('amount', 'Deposit:') !!}
                                        {{ $subPayments[0]['amount'] }}
                                    </div>
                                @endif

                                <!-- Payment Method Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('payment_method_id', 'Payment Method:') !!}
                                    {!! Form::select(null, $paymentMethods, null, ['wire:model' => 'subPayments.0.payment_method_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>

                                <!-- Reference Number Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('reference_num', 'Reference Number:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'subPayments.0.reference_num', 'class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-sm-12">
                                    @php
                                        $itiration = ['Deposit', 'First', 'Second', 'Third', 'Fourth'];
                                    @endphp
                                    @foreach ($subPayments as $subPayment)
                                        @if ($loop->index != 0)
                                            <div class="row" wire:key="{{ $loop->index }}">
                                                <div class="form-group col-sm-12">
                                                    <hr>
                                                    <h4>{{ $itiration[$loop->index] . ' Payment' }}</h4>
                                                </div>

                                                <!-- Amount Field -->
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('amount', 'Amount:') !!}
                                                    {{ $subPayment['amount'] }}
                                                </div>

                                                <!-- Due Date Field -->
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('due_date', 'Due Date:') !!}
                                                    {{ $subPayment['due_date'] }}
                                                    {{-- {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'subPayments.' . $loop->index . '.reference_num', 'class' => 'form-control']) !!} --}}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                @if ($convertToCustomer)
                                    <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary">Cancel</a>
                                @else
                                    <a href="{{ route('admin.leadPayments.index', ['customer' => $lead->id]) }}"
                                        class="btn btn-secondary">Cancel</a>
                                @endif
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
