@extends('layouts.app')

@section('page-title', $user->present()->nameOrEmail)

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ $user->present()->nameOrEmail }}
            <small>user details</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('user.list') }}">Users</a></li>
                    <li class="active">{{ $user->present()->nameOrEmail }}</li>
                </ol>
            </div>

        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-5">
        <div id="edit-user-panel" class="panel panel-default">
            <div class="panel-heading">
                Details
                <div class="pull-right">
                    <a href="{{ route('user.edit', $user->id) }}" class="edit"
                       data-toggle="tooltip" data-placement="top" title="Edit User">
                        Edit
                    </a>
                </div>
            </div>
            <div class="panel-body panel-profile">
                <div class="image">
                    <img alt="image" class="img-circle" src="{{ $user->present()->avatar }}">
                </div>
                <div class="name"><strong>{{ $user->present()->name }}</strong></div>

                @if ($socialNetworks)
                    <div class="icons">
                        @if ($socialNetworks->facebook)
                            <a href="{{ $socialNetworks->facebook }}" class="btn btn-circle btn-facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->twitter)
                            <a href="{{ $socialNetworks->twitter }}" class="btn btn-circle btn-twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->google_plus)
                            <a href="{{ $socialNetworks->google_plus }}" class="btn btn-circle btn-google">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->linked_in)
                            <a href="{{ $socialNetworks->linked_in }}" class="btn btn-circle btn-linkedin">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->skype)
                            <a href="{{ $socialNetworks->skype }}" class="btn btn-skype">
                                <i class="fa fa-skype"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->dribbble)
                            <a href="{{ $socialNetworks->dribbble }}" class="btn btn-circle btn-dribbble">
                                <i class="fa fa-dribbble"></i>
                            </a>
                        @endif
                    </div>
                @endif

                <br>

                <table class="table table-hover table-details">
                    <thead>
                        <tr>
                            <th colspan="3">Contact Informations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>E-Mail</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        </tr>
                        @if ($user->phone)
                            <tr>
                                <td>Phone</td>
                                <td><a href="telto:{{ $user->phone }}">{{ $user->phone }}</a></td>
                            </tr>
                        @endif

                        @if ($socialNetworks && $socialNetworks->skype)
                            <tr>
                                <td>Skype</td>
                                <td>{{ $socialNetworks->skype }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="3">Additional Informations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Birth</td>
                        <td>{{ $user->present()->birthday }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $user->present()->fullAddress }}</td>
                    </tr>
                    <tr>
                        <td>Last Logged In</td>
                        <td>{{ $user->present()->lastLogin }}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                Latest Activity
                <div class="pull-right">
                    <a href="{{ route('activity.user', $user->id) }}" class="edit"
                       data-toggle="tooltip" data-placement="top" title="Complete Activity Log">
                        View All
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table user-activity">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userActivities as $activity)
                            <tr>
                                <td>{{ $activity->description }}</td>
                                <td>{{ $activity->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop