<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>{{ $leadPayment ? 'Edit' : 'Create' }} Payment</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
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

                            <!-- Amount Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('amount', 'Amount:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'amount', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Payment Method Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('payment_method_id', 'Payment Method:') !!}
                                {!! Form::select(null, $paymentMethods, null, ['wire:model' => 'payment_method_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Reference Number Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('reference_num', 'Reference Number:') !!}
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'reference_num', 'class' => 'form-control']) !!}
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
