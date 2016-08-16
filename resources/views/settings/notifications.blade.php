@extends('layouts.app')

@section('page-title', 'Notifications Settings')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Notifications Settings
            <small>manage system notification settings</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="javascript:;">Settings</a></li>
                    <li class="active">Notifications</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Email Notifications</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'settings.notifications.update', 'id' => 'notification-settings-form']) !!}
                    <div class="form-group">
                        <label for="notifications_signup_email">Notify Administrators when user signs up?</label>
                        <br>
                        <input type="hidden" name="notifications_signup_email" value="0">
                        <input type="checkbox" name="notifications_signup_email" class="switch" value="1"
                               data-on-text="YES" data-off-text="NO" {{ settings('notifications_signup_email') ? 'checked' : '' }}>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-refresh"></i>
                        Update Settings
                    </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    {!! HTML::script('assets/plugins/bootstrap-switch/bootstrap-switch.min.js') !!}
    <script>
        $(".switch").bootstrapSwitch({size: 'small'});
    </script>
@stop

@section('styles')
    {!! HTML::style('assets/plugins/bootstrap-switch/bootstrap-switch.css') !!}
@stop