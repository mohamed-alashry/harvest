<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $offer->id }}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        <p>{{ $offer->title }}</p>
    </div>

    <!-- Fees Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fees', 'Fees:') !!}
        <p>{{ $offer->fees }}</p>
    </div>

    <!-- Start Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('start_date', 'Start Date:') !!}
        <p>{{ $offer->start_date }}</p>
    </div>

    <!-- End Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('end_date', 'End Date:') !!}
        <p>{{ $offer->end_date }}</p>
    </div>

    <!-- Payment Plan Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('payment_plan_id', 'Payment Plan:') !!}
        <p>{{ $offer->paymentPlan->title }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $offer->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $offer->updated_at }}</p>
    </div>
</div>
