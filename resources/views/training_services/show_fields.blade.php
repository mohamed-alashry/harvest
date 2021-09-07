<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $trainingService->id }}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        <p>{{ $trainingService->title }}</p>
    </div>

    <!-- Levels Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('levels', 'Levels:') !!}
        <p>{{ implode(', ', $trainingService->levels->pluck('name')->toArray()) }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $trainingService->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $trainingService->updated_at }}</p>
    </div>
</div>
