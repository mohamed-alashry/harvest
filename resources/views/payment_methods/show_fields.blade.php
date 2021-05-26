<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $paymentMethod->id }}</p>
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $paymentMethod->title }}</p>
</div>


<!-- Has Transaction Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_transaction_number', 'Has Transaction Number:') !!}
    <p>{{ $paymentMethod->has_transaction_number ? 'Yes' : 'No' }}</p>
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $paymentMethod->status ? 'Active' : 'Inactive' }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $paymentMethod->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $paymentMethod->updated_at }}</p>
</div>
