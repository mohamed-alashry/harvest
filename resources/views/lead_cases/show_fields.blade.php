<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Follow Up Id:') !!}
        <p>{{ $leadCase->id }}</p>
    </div>

    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('lead_id', 'Name:') !!}
        <p>{{ $leadCase->lead->name['en'] }}</p>
    </div>

    <!-- Mobile Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('lead_mobile', 'Mobile:') !!}
        <p>{{ $leadCase->lead->mobile_1 }}</p>
    </div>

    <!-- Branch Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('branch_id', 'Branch:') !!}
        <p>{{ $leadCase->branch->name }}</p>
    </div>

    <!-- Employee Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('employee_id', 'Employee:') !!}
        <p>{{ $leadCase->employee->name }}</p>
    </div>

    <!-- Label Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('label_id', 'Label:') !!}
        <p>{{ $leadCase->label->name }}</p>
    </div>

    <!-- Label Type Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('label_type_id', 'Label Type:') !!}
        <p>{{ $leadCase->labelType->name }}</p>
    </div>

    <!-- Serial Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('serial', 'Serial:') !!}
        <p>{{ $leadCase->serial }}</p>
    </div>

    <!-- Feedback Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('feedback', 'Feedback:') !!}
        <p>{{ $leadCase->feedback }}</p>
    </div>

    <!-- Other Feedback Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('feedback', 'Other Feedback:') !!}
        <p>{{ $leadCase->other_feedback }}</p>
    </div>

    <!-- Action Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('action', 'Action:') !!}
        <p>{{ $leadCase->action }}</p>
    </div>

    <!-- Other Action Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('action', 'Other Action:') !!}
        <p>{{ $leadCase->other_action }}</p>
    </div>

    <!-- Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('date', 'Action Date:') !!}
        <p>{{ $leadCase->date }}</p>
    </div>

    <!-- Notes Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('notes', 'Notes:') !!}
        <p>{{ $leadCase->notes }}</p>
    </div>

    <!-- Status Field -->
    {{-- <div class="form-group col-sm-6">
        {!! Form::label('status', 'Status:') !!}
        <p>{{ $leadCase->status }}</p>
    </div> --}}

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $leadCase->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $leadCase->updated_at }}</p>
    </div>
</div>
