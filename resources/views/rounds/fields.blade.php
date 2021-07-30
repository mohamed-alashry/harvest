<!-- Service Fee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_fee_id', 'Service Fee Id:') !!}
    <select name="service_fee_id" class="form-control">
        <option value="">Select Service Fee</option>
        @foreach ($serviceFees as $serviceFee)
            <option value="{{ $serviceFee->id }}"
                {{ isset($round) && $serviceFee->id == $round->service_fee_id ? 'selected' : '' }}>
                {{ $serviceFee->trainingService->title . ' | ' . $serviceFee->timeframe->title }}
            </option>
        @endforeach
    </select>
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.rounds.index') }}" class="btn btn-secondary">Cancel</a>
</div>
