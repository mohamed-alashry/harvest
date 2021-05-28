<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $placementQuestion->id }}</p>
</div>


<!-- Skill Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skill', 'Skill:') !!}
    <p>{{ $placementQuestion->skill }}</p>
</div>


<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $placementQuestion->question }}</p>
</div>


<!-- Parent Id Field -->
@if ($placementQuestion->parent_id)
    <div class="form-group col-sm-6">
        {!! Form::label('parent_id', 'Main Question:') !!}
        <p>{{ $placementQuestion->parent->question }}</p>
    </div>
@endif


<!-- Photo Field -->
@if ($placementQuestion->photo)
    <div class="form-group col-sm-6">
        {!! Form::label('photo', 'Photo:') !!}
        <p><img src="{{ asset('uploads/' . $placementQuestion->photo) }}" width="200"></p>
    </div>
@endif


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $placementQuestion->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $placementQuestion->updated_at }}</p>
</div>
