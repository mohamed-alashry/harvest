<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Create Payment</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['wire:submit.prevent' => 'save']) !!}

                        <div class="row">
                            <!-- Lead Name Field -->
                            <div class="form-group col-sm-4">
                                {!! Form::label('lead_name', 'Lead Name:') !!}
                                <p>{{ $lead->name['en'] }}</p>
                            </div>

                            <!-- Lead Mobile Field -->
                            <div class="form-group col-sm-4">
                                {!! Form::label('mobile_1', 'Lead Mobile:') !!}
                                <p>{{ $lead->mobile_1 }}</p>
                            </div>

                            <!-- Lead Level Field -->
                            <div class="form-group col-sm-4">
                                {!! Form::label('pt_level', 'Lead Level:') !!}
                                <p>{{ $lead->pt_level }}</p>
                            </div>

                            <!-- Type Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('paymentable_type', 'Type:') !!}
                                {!! Form::select(null, config('system_variables.lead_payments.types'), null, ['wire:model' => 'paymentable_type', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            <!-- Option Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('paymentable_id', 'Option:') !!}
                                {!! Form::select(null, $services, null, ['wire:model' => 'paymentable_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                            </div>

                            @if (isset($service))
                                <div class="form-group col-sm-12">
                                    <hr>
                                </div>

                                <!-- Payment Plan Field -->
                                <div class="form-group col-sm-3">
                                    {!! Form::label('amount', 'Payment Plan:') !!}
                                    <p>{{ $service->payment_plan_id == 2 ? 'Cash' : 'Installment' }}</p>
                                </div>

                                <!-- Amount Field -->
                                <div class="form-group col-sm-3">
                                    {!! Form::label('amount', 'Amount:') !!}
                                    <p>{{ $amount }}
                                    </p>
                                </div>

                                @if ($service->payment_plan_id == 1)
                                    <!-- Deposit Field -->
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('amount', 'Deposit:') !!}
                                        <p>{{ $subPayments[0]['amount'] }}</p>
                                    </div>
                                @endif

                                @can('leadPayments paymentDiscount')
                                    <!-- Discount Field -->
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('discount', 'Discount:') !!}
                                        {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'discount', 'class' => 'form-control']) !!}
                                    </div>
                                @endcan

                                <!-- Payment Method Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('payment_method_id', 'Payment Method:') !!}
                                    {!! Form::select(null, $paymentMethods, null, ['wire:model' => 'subPayments.0.payment_method_id', 'class' => 'form-control', 'placeholder' => 'Select Option...']) !!}
                                </div>

                                <!-- Reference Number Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('reference_num', 'Reference Number:') !!}
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'subPayments.0.reference_num', 'class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-sm-12">
                                    @php
                                        $itiration = ['Deposit', 'First', 'Second', 'Third', 'Fourth'];
                                    @endphp
                                    @foreach ($subPayments as $subPayment)
                                        @if ($loop->index != 0)
                                            <div class="row" wire:key="{{ $loop->index }}">
                                                <div class="form-group col-sm-12">
                                                    <hr>
                                                    <h4>{{ $itiration[$loop->index] . ' Payment' }}</h4>
                                                </div>

                                                <!-- Amount Field -->
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('amount', 'Amount:') !!}
                                                    {{ $subPayment['amount'] }}
                                                </div>

                                                <!-- Due Date Field -->
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('due_date', 'Due Date:') !!}
                                                    {{ $subPayment['due_date'] }}
                                                    {{-- {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'subPayments.' . $loop->index . '.reference_num', 'class' => 'form-control']) !!} --}}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            <div class="col-sm-12">
                                @if ($suggested_groups)
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped" id="groups-table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Branch</th>
                                                    <th>Interval</th>
                                                    <th>Levels</th>
                                                    <th>Days</th>
                                                    <th>Time Frame</th>
                                                    <th>Room</th>
                                                    <th>Start</th>
                                                    <th>End</th>
                                                    <th colspan="3">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($suggested_groups as $group)
                                                    <tr>
                                                        <td>{{ $group->id }}</td>
                                                        <td>{{ $group->branch->name }}</td>
                                                        <td>{{ $group->interval->name }}</td>
                                                        <td>
                                                            {{ implode(', ', $group->levels->pluck('name')->toArray()) }}
                                                        </td>
                                                        <td>
                                                            {{ config('system_variables.timeframes.days')[$group->subRound->days] }}
                                                        </td>
                                                        <td>{{ $group->round->timeframe->title }}</td>
                                                        <td>{{ $group->room->name }}</td>
                                                        <td>{{ $group->subRound->start_date }}</td>
                                                        <td>{{ $group->subRound->end_date }}</td>
                                                        <td>
                                                            {!! Form::radio(null, $group->id, null, ['wire:model' => 'group_id']) !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                @if ($convertToCustomer)
                                    <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary">Cancel</a>
                                @else
                                    <a href="{{ route('admin.leadPayments.index', ['customer' => $lead->id]) }}"
                                        class="btn btn-secondary">Cancel</a>
                                @endif
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
