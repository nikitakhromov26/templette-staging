@extends('layouts.app')

@section('page-title', $user->present()->nameOrEmail . ' - Active Sessions')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ $user->present()->nameOrEmail }}
            <small>active sessions</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>

                    @if (isset($adminView))
                        <li><a href="{{ route('user.list') }}">Users</a></li>
                        <li><a href="{{ route('user.show', $user->id) }}">{{ $user->present()->name }}</a></li>
                    @endif

                    <li class="active">Sessions</li>
                </ol>
            </div>

        </h1>
    </div>
</div>

@include('partials.messages')

<div class="table-responsive">
    <table class="table">
        <thead>
            <th>Ip Address</th>
            <th>User Agent</th>
            <th>Last Activity</th>
            <th class="text-center">Action</th>
        </thead>
        <tbody>
            @if (count($sessions))
                @foreach ($sessions as $session)
                    <tr>
                        <td>{{ $session->ip_address }}</td>
                        <td>{{ $session->user_agent }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp($session->last_activity)->format('Y-m-d H:i:s') }}</td>
                        <td class="text-center">
                            <a href="{{ isset($profile) ? route('profile.sessions.invalidate', $session->id) : route('user.sessions.invalidate', [$user->id, $session->id]) }}"
                                class="btn btn-danger btn-circle" title="Invalidate Session"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="DELETE"
                                data-confirm-title="Please confirm"
                                data-confirm-text="Are you sure that you want to invalidate this session?"
                                data-confirm-delete="Yes, proceed!">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"><em>No records found.</em></td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@stop
