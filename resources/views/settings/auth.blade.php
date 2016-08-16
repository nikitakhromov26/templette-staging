@extends('layouts.app')

@section('page-title', 'Authentication Settings')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Authentication
            <small>system auth & registration settings</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="javascript:;">Settings</a></li>
                    <li class="active">Authentication</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#auth" aria-controls="auth" role="tab" data-toggle="tab">
            <i class="fa fa-lock"></i>
            Authentication
        </a>
    </li>
    <li role="presentation">
        <a href="#registration" aria-controls="registration" role="tab" data-toggle="tab">
            <i class="fa fa-user-plus"></i>
            Registration
        </a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="auth">
        <div class="row">
            <div class="col-md-6">
                @include('settings.partials.auth')
            </div>
            <div class="col-md-6">
                @include('settings.partials.throttling')
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @include('settings.partials.two-factor')
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="registration">
        <div class="row">
            <div class="col-md-6">
                @include('settings.partials.registration')
            </div>
            <div class="col-md-6">
                @include('settings.partials.recaptcha')
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    {!! HTML::script('assets/plugins/bootstrap-switch/bootstrap-switch.min.js') !!}
    <script>
        $(".switch").bootstrapSwitch({ size: 'small' });
    </script>
@stop

@section('styles')
    {!! HTML::style('assets/plugins/bootstrap-switch/bootstrap-switch.css') !!}
@stop