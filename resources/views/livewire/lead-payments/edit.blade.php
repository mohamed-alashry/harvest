<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Edit Payment</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Type Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('paymentable_type', 'Type:') !!}
                                {{ config('system_variables.lead_payments.types')[$paymentable_type] }}
                            </div>

                            <!-- Service Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('paymentable_id', 'Service:') !!}
                                @switch($paymentable_type)
                                    @case('App\\Models\\ExtraItem')
                                        {{ $service->name }}
                                    @break
                                    @case('App\\Models\\Offer')
                                        {{ $service->title }}
                                    @break
                                    @default
                                        {{ $service->trainingService->title }}
                                @endswitch
                            </div>

                            <!-- Payment Plan Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('amount', 'Payment Plan:') !!}
                                {{ $service->payment_plan_id == 2 ? 'Cash' : 'Installment' }}
                            </div>

                            <!-- Amount Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('amount', 'Amount:') !!}
                                {{ $paymentable_type == 'App\\Models\\ExtraItem' ? $service->price : $service->fees }}
                            </div>

                            <div class="form-group col-sm-12">
                                @php
                                    $itiration = ['Deposit', 'First', 'Second', 'Third', 'Fourth'];
                                @endphp
                                @foreach ($installments as $installment)
                                    <div class="row" wire:key="{{ $loop->index }}">
                                        <div class="form-group col-sm-12">
                                            <hr>
                                            <h4>{{ $itiration[$loop->index] . ' Payment' }}</h4>
                                        </div>

                                        <!-- Amount Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('amount', 'Amount:') !!}
                                            {{ $installment->amount }}
                                        </div>

                                        <!-- Due Date Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('due_date', 'Due Date:') !!}
                                            {{ $installment->due_date }}
                                        </div>

                                        @if ($installment->paid)
                                            <!-- Payment Method Field -->
                                            <div class="form-group col-sm-6">
                                                {!! Form::label('payment_method_id', 'Payment Method:') !!}
                                                {{ $installment->paymentMethod->title }}
                                            </div>

                                            <!-- Reference Number Field -->
                                            <div class="form-group col-sm-6">
                                                {!! Form::label('reference_num', 'Reference Number:') !!}
                                                {{ $installment->reference_num }}
                                            </div>
                                        @else
                                            <!-- Payment Method Field -->
                                            <div class="form-group col-sm-6">
                                                {!! Form::label('payment_method_id', 'Payment Method:') !!}
                                                {!! Form::select(null, $paymentMethods, null, ['wire:model' => 'subPayments.' . $installment->id . '.payment_method_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                            </div>

                                            <!-- Reference Number Field -->
                                            <div class="form-group col-sm-6">
                                                {!! Form::label('reference_num', 'Reference Number:') !!}
                                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'subPayments.' . $installment->id . '.reference_num', 'class' => 'form-control']) !!}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.leadPayments.index', ['customer' => $lead->id]) }}"
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
