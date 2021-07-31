<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        Leads
                        <div class="pull-right">
                            <button wire:click="toggleAssign()" class="btn btn-success btn-sm" title="assign"><i
                                    class="fa fa-check"></i></button>
                            <button wire:click="toggleFilter()" class="btn btn-warning btn-sm"><i
                                    class="fa fa-filter"></i></button>
                            @can('leads create')
                                <a href="{{ route('admin.leads.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i></a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($show_assign)
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $agents, null, ['wire:model' => 'assigned_employee', 'class' => 'form-control', 'placeholder' => 'Select Agent...']) !!}
                                </div>

                                <div class="form-group col-sm-1">
                                    <button wire:click="submitAssign()" class="btn btn-success btn-block"
                                        title="assign"><i class="fa fa-check"></i></button>
                                </div>
                            </div>
                        @endif
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
                                    {!! Form::select(null, ['Male' => 'Male', 'Female' => 'Female'], null, ['wire:model' => 'gender', 'class' => 'form-control', 'placeholder' => 'Select Gender...']) !!}
                                </div>
                            </div>
                        @endif

                        <div class="table-responsive-sm">
                            <table class="table table-striped" id="leads-table">
                                <thead>
                                    <tr>
                                        @if ($show_assign)
                                            <th>Assign</th>
                                        @endif
                                        <th>Registration At</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Assigned Employee</th>
                                        <th>Convert to Customer</th>
                                        <th>Cases</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leads as $lead)
                                        <tr>
                                            @if ($show_assign)
                                                <td>{!! Form::checkbox(null, $lead->id, null, ['wire:model' => 'assign_leads.' . $loop->index]) !!}</td>
                                            @endif
                                            <td>{{ $lead->created_at }}</td>
                                            <td>{{ $lead->name['en'] }}</td>
                                            <td>{{ $lead->mobile_1 }}</td>
                                            <td>{{ $lead->assignedEmployee->name ?? '' }}</td>
                                            <td>
                                                <button wire:click="toCustomer({{ $lead->id }})"
                                                    class="btn btn-success"><i class="fa fa-user"></i></button>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.leadCases.index', ['lead' => $lead->id]) }}"
                                                    class="btn btn-warning">{{ $lead->cases_count }}</a>
                                            </td>
                                            <td>
                                                {!! Form::open(['route' => ['admin.leads.destroy', $lead->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{{ route('admin.leads.show', [$lead->id]) }}"
                                                        class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                                                    @can('leads edit')
                                                        <a href="{{ route('admin.leads.edit', [$lead->id]) }}"
                                                            class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                                    @endcan

                                                    @can('leads delete')
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
