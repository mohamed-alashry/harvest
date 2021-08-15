<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $lead->id }}</p>
    </div>

    <!-- Name En Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name En:') !!}
        <p>{{ $lead->name['en'] }}</p>
    </div>

    <!-- Name Ar Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name Ar:') !!}
        <p>{{ $lead->name['ar'] }}</p>
    </div>

    <!-- Gender Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('gender', 'Gender:') !!}
        <p>{{ $lead->gender }}</p>
    </div>

    <!-- Mobile 1 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('mobile_1', 'Mobile 1:') !!}
        <p>{{ $lead->mobile_1 }}</p>
    </div>

    <!-- Mobile 2 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('mobile_2', 'Mobile 2:') !!}
        <p>{{ $lead->mobile_2 }}</p>
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        <p>{{ $lead->email }}</p>
    </div>

    <!-- Lead Source Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('lead_source', 'Lead Source:') !!}
        <p>{{ $lead->lead_source->name }}</p>
    </div>

    <!-- Know Channel Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('know_from', 'How Did you know about us ?:') !!}
        <p>{{ $lead->know_channel->name }}</p>
    </div>

    <!-- Preferred Time Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('preferred_time', 'Preferred Time:') !!}
        <p>{{ $lead->preferred_time }}</p>
    </div>

    <!-- Preferred Offer Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('preferred_offer', 'Preferred Offer:') !!}
        <p>{{ $lead->offer->title }}</p>
    </div>

    <!-- Preferred Branch Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('preferred_branch', 'Preferred Branch:') !!}
        <p>{{ $lead->branch->name }}</p>
    </div>

    <!-- Preferred Training Service Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('preferred_training_service', 'Preferred Training Service:') !!}
        <p>{{ $lead->training_service->title }}</p>
    </div>

    <!-- Notes Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('notes', 'Notes:') !!}
        <p>{{ $lead->notes }}</p>
    </div>

    <!-- Assigned Employee Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('assigned_employee_id', 'Assigned Employee:') !!}
        <p>{{ $lead->assignedEmployee->name ?? '' }}</p>
    </div>

    {{-- <!-- Nationality Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nationality', 'Nationality:') !!}
    <p>{{ $lead->nationality }}</p>
</div>

<!-- Identification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identification', 'Identification:') !!}
    <p>{{ $lead->identification }}</p>
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    <p>{{ $lead->dob }}</p>
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $lead->country }}</p>
</div>

<!-- Governorate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('governorate', 'Governorate:') !!}
    <p>{{ $lead->governorate }}</p>
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $lead->city }}</p>
</div>

<!-- University Field -->
<div class="form-group col-sm-6">
    {!! Form::label('university', 'University:') !!}
    <p>{{ $lead->university }}</p>
</div>

<!-- Customer Job Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_job', 'Customer Job:') !!}
    <p>{{ $lead->customer_job }}</p>
</div>

<!-- Workplace Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workplace', 'Workplace:') !!}
    <p>{{ $lead->workplace }}</p>
</div> --}}

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $lead->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $lead->updated_at }}</p>
    </div>
</div>
