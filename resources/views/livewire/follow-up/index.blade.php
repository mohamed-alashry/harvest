<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        Follow Up
                        <div class="pull-right">
                            <button wire:click="toggleFilter()" class="btn btn-warning btn-sm"><i
                                    class="fa fa-filter"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-1">
                                {!! Form::select(null, [10 => 10, 20 => 20, 50 => 50, 100 => 100], null, ['wire:model' => 'per_page', 'class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-sm-4">
                                {!! Form::text(null, null, ['wire:model.debounce.500ms' => 'search', 'class' => 'form-control', 'placeholder' => 'Search By: Name, Mobile, Email']) !!}
                            </div>
                        </div>
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
                                    {!! Form::select(null, config('data.feedback'), null, ['wire:model' => 'feedback', 'class' => 'form-control', 'placeholder' => 'Select Feedback...']) !!}
                                </div>
                            </div>
                        @endif

                        <div class="table-responsive-sm">
                            <table class="table table-striped" id="leads-table">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Registration At</th>
                                        <th>Name</th>
                                        <th>Branch</th>
                                        <th>FeedBack</th>
                                        <th>Action</th>
                                        <th>Action Date</th>
                                        <th>Overdue</th>
                                        <th>Agent</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($followups as $followup)
                                        <tr>
                                            <td>{{ $followup->id }}</td>
                                            <td>{{ $followup->lead->created_at }}</td>
                                            <td>{{ $followup->lead->name['en'] }}</td>
                                            <td>{{ $followup->lead->branch->name }}</td>
                                            <td>{{ $followup->feedback }}</td>
                                            <td>{{ $followup->action }}</td>
                                            <td>{{ $followup->date->format('Y-m-d') }}</td>
                                            <td>{{ $followup->date->diff(now())->days }}</td>
                                            <td>{{ $followup->employee->name ?? '' }}</td>
                                            <td>
                                                {!! Form::open(['route' => ['admin.leadCases.destroy', $followup->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a class="btn btn-ghost-success"
                                                        href="{{ route('admin.leadPayments.create', ['customer' => $followup->id]) }}"><i
                                                            class="fa fa-money fa-lg"></i></a>

                                                    <button wire:click="newFollowUp({{ $followup->id }})"
                                                        class="btn btn-ghost-success"><i
                                                            class="fa fa-phone"></i></button>

                                                    @can('leadCases edit')
                                                        <a href="{{ route('admin.leadCases.edit', [$followup->id]) }}"
                                                            class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                                    @endcan

                                                    @can('leadCases delete')
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
                            {{ $followups->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
