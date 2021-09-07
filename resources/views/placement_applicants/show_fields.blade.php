<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $placementApplicant->id }}</p>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $placementApplicant->name }}</p>
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $placementApplicant->email }}</p>
</div>


<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{{ $placementApplicant->mobile }}</p>
</div>


<!-- Branch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch', 'Branch:') !!}
    <p>{{ $placementApplicant->branch->name ?? '' }}</p>
</div>


<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $placementApplicant->gender }}</p>
</div>


<!-- Job Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job', 'Job:') !!}
    <p>{{ $placementApplicant->job }}</p>
</div>


<!-- University Field -->
<div class="form-group col-sm-6">
    {!! Form::label('university', 'University:') !!}
    <p>{{ $placementApplicant->university }}</p>
</div>


<!-- Vocabulary Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vocabulary_score', 'Vocabulary Score:') !!}
    <p>{{ $placementApplicant->vocabulary_score }}</p>
</div>


<!-- Grammar Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grammar_score', 'Grammar Score:') !!}
    <p>{{ $placementApplicant->grammar_score }}</p>
</div>


<!-- Reading Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reading_score', 'Reading Score:') !!}
    <p>{{ $placementApplicant->reading_score }}</p>
</div>


<!-- Listening Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('listening_score', 'Listening Score:') !!}
    <p>{{ $placementApplicant->listening_score }}</p>
</div>


<!-- Speaking Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('speaking_score', 'Speaking Score:') !!}
    <p>{{ $placementApplicant->speaking_score }}</p>
</div>


<!-- Writing Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('writing_score', 'Writing Score:') !!}
    <p>{{ $placementApplicant->writing_score }}</p>
</div>


<!-- Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level', 'Level:') !!}
    <p>{{ $placementApplicant->level }}</p>
</div>


<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{{ $placementApplicant->notes }}</p>
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $placementApplicant->status }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $placementApplicant->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $placementApplicant->updated_at }}</p>
</div>
