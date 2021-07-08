<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_category_id', 'Item Category:') !!}
    {!! Form::select('item_category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method_id', 'Payment Method:') !!}
    {!! Form::select('payment_method_id', $paymentMethods, null, ['class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.extraItems.index') }}" class="btn btn-secondary">Cancel</a>
</div>
