<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        Group Session Attendances
                        <div class="pull-right">
                            @can('groupSessionAttendances edit')
                                @if ($editable)
                                    <button wire:click='save()' class='btn btn-success'>
                                        <i class="fa fa-check"></i></button>
                                @else
                                    <button wire:click='toggleEdit()' class='btn btn-info'>
                                        <i class="fa fa-edit"></i></button>
                                @endif
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped" id="groupSessionAttendances-table">
                                <thead>
                                    <tr>
                                        @if ($editable)
                                            <th></th>
                                        @endif
                                        <th>Lead</th>
                                        <th>Attendance</th>
                                        <th colspan="2">Makeup Session</th>
                                        {{-- <th colspan="2">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            @if ($editable)
                                                <td>{!! Form::checkbox(null, $attendance->id, null, ['wire:model' => 'present.' . $loop->index]) !!}</td>
                                            @endif
                                            <td>{{ $attendance->lead->name['en'] }}</td>
                                            <td>
                                                @if ($attendance->attendance === 1)
                                                    Present
                                                @elseif ($attendance->attendance === 0)
                                                    Absent
                                                @else
                                                    __
                                                @endif
                                            </td>
                                            <td>
                                                @if ($attendance->need_makeup)
                                                    @if ($attendance->makeup->count())
                                                        <i class="fa fa-check-square fa-lg"></i>
                                                    @else
                                                        <button wire:click="addToMakeup({{ $attendance->id }})"
                                                            type="button" class="btn btn-success"><i
                                                                class="fa fa-plus"></i></button>
                                                    @endif
                                                @endif
                                            </td>
                                            {{-- <td>
                                                <div class='btn-group'>
                                                    <a href="{{ route('admin.groupSessionAttendances.show', [$groupSessionAttendance->id]) }}"
                                                            class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
