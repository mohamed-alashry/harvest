<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $serviceFee->id }}</p>
</div>


<!-- Training Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('training_service_id', 'Training Service:') !!}
    <p>{{ $serviceFee->trainingService->title }}</p>
</div>


<!-- Payment Plan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_plan_id', 'Payment Plan:') !!}
    <p>{{ $serviceFee->paymentPlan->title }}</p>
</div>


<!-- Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fees', 'Fees:') !!}
    <p>{{ $serviceFee->fees }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $serviceFee->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $serviceFee->updated_at }}</p>
</div>
