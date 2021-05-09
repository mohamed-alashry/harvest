<!-- Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name En:') !!}
    {!! Form::text('name[en]', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name Ar:') !!}
    {!! Form::text('name[ar]', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control', 'placeholder' => 'select gender...']) !!}
</div>

<!-- Mobile 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile_1', 'Mobile 1:') !!}
    {!! Form::text('mobile_1', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile_2', 'Mobile 2:') !!}
    {!! Form::text('mobile_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Lead Source Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lead_source_id', 'Lead Source:') !!}
    {!! Form::select('lead_source_id', $sources, null, ['class' => 'form-control', 'placeholder' => 'select option...']) !!}
</div>

<!-- Know Channel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('know_channel_id', 'How Did you know about us ?:') !!}
    {!! Form::select('know_channel_id', $channels, null, ['class' => 'form-control', 'placeholder' => 'select option...']) !!}
</div>

<!-- Preferred Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preferred_time', 'Preferred Time:') !!}
    {!! Form::select('preferred_time', ['AM' => 'Morning (AM)', 'PM' => 'Evening (PM)', 'MIX' => 'Mix (AM/PM)'], null, ['class' => 'form-control', 'placeholder' => 'select option...']) !!}
</div>

<!-- Preferred Offer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('offer_id', 'Preferred Offer:') !!}
    {!! Form::select('offer_id', $offers, null, ['class' => 'form-control', 'placeholder' => 'select option...']) !!}
</div>

<!-- Preferred Branch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Preferred Branch:') !!}
    {!! Form::select('branch_id', $branches, null, ['class' => 'form-control', 'placeholder' => 'select option...']) !!}
</div>

<!-- Preferred Training Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('training_service_id', 'Preferred Training Service:') !!}
    {!! Form::select('training_service_id', $services, null, ['class' => 'form-control', 'placeholder' => 'select option...']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2]) !!}
</div>

{{-- <!-- Nationality Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nationality', 'Nationality:') !!}
    {!! Form::select('nationality', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Identification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identification', 'Identification:') !!}
    {!! Form::file('identification') !!}
</div>
<div class="clearfix"></div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    {!! Form::text('dob', null, ['class' => 'form-control','id'=>'dob']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#dob').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::select('country', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Governorate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('governorate', 'Governorate:') !!}
    {!! Form::select('governorate', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::select('city', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- University Field -->
<div class="form-group col-sm-6">
    {!! Form::label('university', 'University:') !!}
    {!! Form::select('university', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Job Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_job', 'Customer Job:') !!}
    {!! Form::select('customer_job', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Workplace Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workplace', 'Workplace:') !!}
    {!! Form::text('workplace', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('full_address', 'Full Address:') !!}
    {!! Form::textarea('full_address', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary">Cancel</a>
</div>
