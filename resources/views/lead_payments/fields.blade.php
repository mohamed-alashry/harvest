<!-- Paymentable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paymentable', 'Paymentable:') !!}
    {!! Form::select('paymentable', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method_id', 'Payment Method Id:') !!}
    {!! Form::select('payment_method_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Reference Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference_num', 'Reference Num:') !!}
    {!! Form::text('reference_num', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.leadPayments.index') }}" class="btn btn-secondary">Cancel</a>
</div>
