<div class="row">
    @if (!isset($leadCase))
        {!! Form::hidden('lead_id', request('lead')) !!}
    @endif

    <!-- Label Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('label_id', 'Label:') !!}
        {!! Form::select('label_id', $labels, null, ['class' => 'form-control', 'id' => 'label-select', 'placeholder' => 'Select Option...']) !!}
    </div>

    <!-- Label Type Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('label_type_id', 'Label Type:') !!}
        {!! Form::select('label_type_id', $labelTypes, null, ['class' => 'form-control', 'id' => 'label-types-select', 'placeholder' => 'Select Option...']) !!}
    </div>

    <!-- Feedback Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('feedback', 'Feedback:') !!}
        {!! Form::select('feedback', config('data.feedback'), null, ['class' => 'form-control', 'id' => 'feedback-select', 'placeholder' => 'Select Option...']) !!}
    </div>

    <!-- Other Feedback Field -->
    <div class="form-group col-sm-6" id="other_feedback-container">
        {!! Form::label('other_feedback', 'Other Feedback:') !!}
        {!! Form::text('other_feedback', null, ['class' => 'form-control']) !!}
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                var val = $('#feedback-select').val()

                toggelOtherFeedback(val)
            });

            $('#feedback-select').change(function() {
                var val = $(this).val()

                toggelOtherFeedback(val)
            });

            function toggelOtherFeedback(val) {
                if (val == 'other') {
                    $('#other_feedback-container').show();
                } else {
                    $('#other_feedback-container').hide();
                    $('#other_feedback').val('');
                }
            }
        </script>
    @endpush

    <!-- Action Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('action', 'Action:') !!}
        {!! Form::select('action', config('data.action'), null, ['class' => 'form-control', 'id' => 'action-select', 'placeholder' => 'Select Option...']) !!}
    </div>

    <!-- Other Action Field -->
    <div class="form-group col-sm-6" id="other_action-container">
        {!! Form::label('other_action', 'Other Action:') !!}
        {!! Form::text('other_action', null, ['class' => 'form-control']) !!}
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                var val = $('#action-select').val()

                toggelOtherAction(val)
            });

            $('#action-select').change(function() {
                var val = $(this).val()

                toggelOtherAction(val)
            });

            function toggelOtherAction(val) {
                if (val == 'other') {
                    $('#other_action-container').show();
                } else {
                    $('#other_action-container').hide();
                    $('#other_action').val('');
                }
            }
        </script>
    @endpush

    <!-- Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('date', 'Action Date:') !!}
        {!! Form::text('date', null, ['class' => 'form-control', 'id' => 'date']) !!}
    </div>

    <!-- Notes Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('notes', 'Notes:') !!}
        {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2]) !!}
    </div>

    {{-- <!-- Status Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status', 'Status:') !!}
        {!! Form::select('status', config('data.status'), null, ['class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
    </div> --}}

    @push('scripts')
        <script type="text/javascript">
            $('#date').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                icons: {
                    up: "icon-arrow-up-circle icons font-2xl",
                    down: "icon-arrow-down-circle icons font-2xl"
                },
                sideBySide: true
            });
        </script>
    @endpush


    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.leadCases.index', ['lead' => isset($leadCase) ? $leadCase->lead_id : request('lead')]) }}"
            class="btn btn-secondary">Cancel</a>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                var val = $('#label-select').val()

                getLabelTypes(val)
            });

            $('#label-select').change(function() {
                var val = $(this).val()

                getLabelTypes(val)
            });

            function getLabelTypes(id) {

                var oldValue = "{{ old('label_type_id', $leadCase->label_type_id ?? '') }}"

                $.post("{{ route('admin.getLabelTypes') }}", {
                        'label_id': id
                    },
                    function(data) {
                        var sel = $("#label-types-select");
                        sel.empty();
                        sel.append('<option value="">Select Option...</option>');

                        for (var i = 0; i < data.length; i++) {
                            if (data[i].id == oldValue) {
                                sel.append('<option value="' + data[i].id + '" selected>' + data[i].name +
                                    '</option>');
                            } else {
                                sel.append('<option value="' + data[i].id + '" >' + data[i].name +
                                    '</option>');
                            }
                        }
                    }
                );
            }
        </script>
    @endpush
</div>
