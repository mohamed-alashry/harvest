@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('admin.groupSessions.index', ['group' => $groupSession->group_id]) !!}">Group Session</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <livewire:group-sessions.edit :groupSession="$groupSession" />
@endsection
