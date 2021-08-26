<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        Customers
                        <div class="pull-right">
                            <button wire:click="toggleFilter()" class="btn btn-warning btn-sm"><i
                                    class="fa fa-filter"></i></button>
                            @can('customers create')
                                <a href="{{ route('admin.customers.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i></a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($show_filter)
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $leadSources, null, ['wire:model' => 'lead_source', 'class' => 'form-control', 'placeholder' => 'Select Lead Source...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $knowChannels, null, ['wire:model' => 'know_channel', 'class' => 'form-control', 'placeholder' => 'Select Know Channel...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, ['AM' => 'Morning (AM)', 'PM' => 'Evening (PM)', 'MIX' => 'Mix (AM/PM)'], null, ['wire:model' => 'time', 'class' => 'form-control', 'placeholder' => 'Select Time...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $services, null, ['wire:model' => 'service', 'class' => 'form-control', 'placeholder' => 'Select Service...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $offers, null, ['wire:model' => 'offer', 'class' => 'form-control', 'placeholder' => 'Select Offer...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $branches, null, ['wire:model' => 'branch', 'class' => 'form-control', 'placeholder' => 'Select Branch...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $agents, null, ['wire:model' => 'agent', 'class' => 'form-control', 'placeholder' => 'Select Agent...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'mobile_1', 'class' => 'form-control', 'placeholder' => 'Search By Mobile']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'name', 'class' => 'form-control', 'placeholder' => 'Search By Name']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    <x-date-picker wire:model="registration_from" data-date-orientation="bottom"
                                        placeholder="Registration Date From" />
                                </div>

                                <div class="form-group col-sm-4">
                                    <x-date-picker wire:model="registration_to" data-date-orientation="bottom"
                                        placeholder="Registration Date To" />
                                </div>
                            </div>
                        @endif

                        <div class="table-responsive-sm">
                            <table class="table table-striped" id="leads-table">
                                <thead>
                                    <tr>
                                        <th>Registration At</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Assigned Employee</th>
                                        <th>Old Customer</th>
                                        <th>Payments</th>
                                        <th>Follow Up</th>
                                        <th>Last Follow Up Date</th>
                                        <th>Last Follow Up Feedback</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leads as $lead)
                                        <tr>
                                            <td>{{ $lead->created_at }}</td>
                                            <td>{{ $lead->name['en'] }}</td>
                                            <td>{{ $lead->mobile_1 }}</td>
                                            <td>{{ $lead->assignedEmployee->name ?? '' }}</td>
                                            <td>{{ $lead->old_customer ? 'Yes' : 'No' }}</td>
                                            <td>
                                                <a href="{{ route('admin.leadPayments.index', ['customer' => $lead->id]) }}"
                                                    class="btn btn-warning">{{ $lead->payments_count }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.leadCases.index', ['lead' => $lead->id]) }}"
                                                    class="btn btn-warning">{{ $lead->cases_count }}</a>
                                            </td>
                                            <td>{{ $lead->cases[0]->created_at ?? '' }}</td>
                                            <td>{{ $lead->cases[0]->feedback ?? '' }}</td>
                                            <td>
                                                {!! Form::open(['route' => ['admin.customers.destroy', $lead->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{{ route('admin.customers.show', [$lead->id]) }}"
                                                        class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                                                    @can('customers edit')
                                                        <a href="{{ route('admin.customers.edit', [$lead->id]) }}"
                                                            class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                                    @endcan

                                                    @can('customers delete')
                                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                    @endcan
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pull-right mr-3">
                            {{ $leads->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
