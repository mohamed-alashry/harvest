<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $leadPayment->id }}</p>
</div>


<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ config('system_variables.lead_payments.types.' . $leadPayment->paymentable_type) }}</p>
</div>


<!-- Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Service:') !!}
    <p>
        @switch($leadPayment->paymentable_type)
            @case('App\\Models\\ExtraItem')
                {{ $leadPayment->paymentable->name }}
            @break
            @case('App\\Models\\Offer')
                {{ $leadPayment->paymentable->title }}
            @break
            @default
                {{ $leadPayment->paymentable->trainingService->title }}
        @endswitch
    </p>
</div>


<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $leadPayment->amount }}</p>
</div>


<!-- Payment Method Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method_id', 'Payment Method:') !!}
    <p>{{ $leadPayment->paymentMethod->title }}</p>
</div>


<!-- Reference Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference_num', 'Reference Num:') !!}
    <p>{{ $leadPayment->reference_num }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $leadPayment->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $leadPayment->updated_at }}</p>
</div>
