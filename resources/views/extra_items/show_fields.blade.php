<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $extraItem->id }}</p>
</div>


<!-- Item Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_category_id', 'Item Category:') !!}
    <p>{{ $extraItem->itemCategory->name }}</p>
</div>


<!-- Payment Method Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method_id', 'Payment Method:') !!}
    <p>{{ $extraItem->paymentMethod->title }}</p>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $extraItem->name }}</p>
</div>


<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $extraItem->price }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $extraItem->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $extraItem->updated_at }}</p>
</div>
