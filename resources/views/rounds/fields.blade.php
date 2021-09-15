<!-- TimeFrame Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timeframe_id', 'TimeFrame:') !!}
    @if (isset($round))
        <p>{{ $round->timeframe->title }}</p>
    @else
        <select name="timeframe_id" class="form-control">
            <option value="">Select TimeFrame</option>
            @foreach ($timeframes as $timeframe)
                <option value="{{ $timeframe->id }}"
                    {{ isset($round) && $timeframe->id == $round->timeframe_id ? 'selected' : '' }}>
                    {{ $timeframe->title }}
                </option>
            @endforeach
        </select>
    @endif
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
