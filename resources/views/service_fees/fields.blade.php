<!-- Training Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('training_service_id', 'Training Service:') !!}
    {!! Form::select('training_service_id', $services, null, ['class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
</div>

<!-- Timeframe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timeframe_id', 'Timeframe:') !!}
    {!! Form::select('timeframe_id', $timeframes, null, ['class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
</div>

<!-- Payment Method Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method_id', 'Payment Method:') !!}
    {!! Form::select('payment_method_id', $paymentMethods, null, ['class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
</div>

<!-- Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fees', 'Fees:') !!}
    {!! Form::text('fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.serviceFees.index') }}" class="btn btn-secondary">Cancel</a>
</div>
