@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Welcome <?= Auth::user()->username ?: Auth::user()->first_name ?>!
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>

        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">New Users This Month</div>
                        <div class="text-huge">{{ $stats['new'] }}</div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.list') }}">
                <div class="panel-footer">
                    <span class="pull-left">View All Users</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">Total Users</div>
                        <div class="text-huge">{{ $stats['total'] }}</div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.list') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">Banned Users</div>
                        <div class="text-huge">{{ $stats['banned'] }}</div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-times fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.list', ['status' => \Vanguard\Support\Enum\UserStatus::BANNED]) }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-purple">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">Unconfirmed Users</div>
                        <div class="text-huge">{{ $stats['unconfirmed'] }}</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.list', ['status' => \Vanguard\Support\Enum\UserStatus::UNCONFIRMED]) }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Registration History</div>
            <div class="panel-body">
                <div>
                    <canvas id="myChart" height="403"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Latest Registrations</div>
            <div class="panel-body">
                @if (count($latestRegistrations))
                    <div class="list-group">
                        @foreach ($latestRegistrations as $user)
                            <a href="{{ route('user.show', $user->id) }}" class="list-group-item">
                                <img class="img-circle" src="{{ $user->present()->avatar }}">
                                &nbsp; <strong>{{ $user->present()->nameOrEmail }}</strong>
                                <span class="list-time text-muted small">
                                    <em>{{ $user->created_at->diffForHumans() }}</em>
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('user.list') }}" class="btn btn-default btn-block">View All Users</a>
                @else
                    <p class="text-muted">No records found...</p>
                @endif
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    <script>var users = {!! json_encode(array_values($usersPerMonth)) !!};</script>
    {!! HTML::script('assets/js/chart.min.js') !!}
    {!! HTML::script('assets/js/as/dashboard-admin.js') !!}
@stop