<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        Groups
                        <div class="pull-right">
                            <button wire:click="toggleUpgrade()" class="btn btn-success btn-sm"><i
                                    class="fa fa-level-up"></i></button>
                            <button wire:click="toggleFilter()" class="btn btn-warning btn-sm"><i
                                    class="fa fa-filter"></i></button>
                            @can('groups create')
                                <a href="{{ route('admin.groups.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i></a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-1">
                                {!! Form::select(null, [10 => 10, 20 => 20, 50 => 50, 100 => 100], null, ['wire:model' => 'per_page', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if ($show_upgrade)
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {!! Form::select(null, $disciplines, null, ['wire:model' => 'discipline_id', 'class' => 'form-control', 'placeholder' => 'Select Discipline...']) !!}
                                </div>

                                <div class="form-group col-sm-6">
                                    {!! Form::select(null, $timeframesData, null, ['wire:model' => 'timeframe_id', 'class' => 'form-control', 'placeholder' => 'Select Time Frame...']) !!}
                                </div>

                                <div class="form-group col-sm-6">
                                    {!! Form::select(null, $roundsData, null, ['wire:model' => 'round_id', 'class' => 'form-control', 'placeholder' => 'Select Round...']) !!}
                                </div>

                                <div class="form-group col-sm-6">
                                    <select wire:model="days" class="form-control">
                                        <option value="">Select Days...</option>
                                        @foreach ($daysData as $day)
                                            <option value="{{ $day }}">
                                                {{ config('system_variables.timeframes.days')[$day] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <select wire:model="from_sub_round" class="form-control">
                                        <option value="">Select From...</option>
                                        @foreach ($subRoundFrom as $from)
                                            <option value="{{ $from->id }}">{{ $from->start_date }}</option>
                                        @endforeach
                                    </select>
                                    <span>Groups Count:{{ $selectedGroups ? $selectedGroups->count() : 0 }}</span>
                                </div>

                                <div class="form-group col-sm-6">
                                    <span>To: {{ $to_sub_round->start_date ?? '' }}</span>
                                </div>

                                <div class="form-group col-sm-6">
                                    <button wire:click="upgradeGroups()" class="btn btn-success">Upgrade Groups</button>
                                </div>
                            </div>
                        @endif
                        @if ($show_filter)
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $timeframesData, null, ['wire:model' => 'timeframe_id', 'class' => 'form-control', 'placeholder' => 'Select TimeFrame...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $roundsData, null, ['wire:model' => 'round_id', 'class' => 'form-control', 'placeholder' => 'Select Round...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $subRoundData, null, ['wire:model' => 'sub_round_id', 'class' => 'form-control', 'placeholder' => 'Select Sub Round...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $intervalsData, null, ['wire:model' => 'interval_id', 'class' => 'form-control', 'placeholder' => 'Select Interval...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $roomsData, null, ['wire:model' => 'room_id', 'class' => 'form-control', 'placeholder' => 'Select Room...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $instructorsData, null, ['wire:model' => 'instructor_id', 'class' => 'form-control', 'placeholder' => 'Select Instructor...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $adminsData, null, ['wire:model' => 'admin_id', 'class' => 'form-control', 'placeholder' => 'Select Admin...']) !!}
                                </div>

                                <div class="form-group col-sm-4">
                                    {!! Form::select(null, $levelsData, null, ['wire:model' => 'level_id', 'class' => 'form-control', 'placeholder' => 'Select Level...']) !!}
                                </div>

                                {{-- <div class="form-group col-sm-4">
                                    {!! Form::select(null, ['past' => 'past', 'upcoming' => 'upcoming', 'current' => 'current'], null, ['wire:model' => 'status', 'class' => 'form-control', 'placeholder' => 'Select Status...']) !!}
                                </div> --}}
                            </div>
                        @endif

                        <div class="table-responsive-sm">
                            <table class="table table-striped" id="groups-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Parent Group ID</th>
                                        <th>Round</th>
                                        <th>Discipline</th>
                                        <th>Branch</th>
                                        <th>Room</th>
                                        <th>Instructor</th>
                                        <th>Interval</th>
                                        <th>Students</th>
                                        <th>Sessions</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                        <tr>
                                            <td>{{ $group->id }}</td>
                                            <td>{{ $group->title }}</td>
                                            <td>{{ $group->parent->id ?? 'Parent' }}</td>
                                            <td>{{ $group->round->title }}</td>
                                            <td>{{ $group->discipline->name }}</td>
                                            <td>{{ $group->branch->name }}</td>
                                            <td>{{ $group->room->name }}</td>
                                            <td>{{ $group->instructor->name }}</td>
                                            <td>{{ $group->interval->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.groupStudents.show', $group->id) }}"
                                                    class="btn btn-info">
                                                    {{ $group->students_count }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.groupSessions.index', ['group' => $group->id]) }}"
                                                    class="btn btn-info">
                                                    {{ $group->sessions_count }}
                                                </a>
                                            </td>
                                            <td>{{ $group->status }}</td>
                                            <td>
                                                {!! Form::open(['route' => ['admin.groups.destroy', $group->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{{ route('admin.groups.show', [$group->id]) }}"
                                                        class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                                                    @can('groups edit')
                                                        <a href="{{ route('admin.groups.edit', [$group->id]) }}"
                                                            class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                                    @endcan

                                                    {{-- @can('groups delete')
                                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                    @endcan --}}
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pull-right mr-3">
                            {{ $groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
