@extends('layouts.app')

@section('page-title', 'My Profile')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ $user->present()->nameOrEmail }}
            <small>edit profile details</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="javascript:;">Home</a></li>
                    <li class="active">My Profile</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#details" aria-controls="details" role="tab" data-toggle="tab">
            <i class="glyphicon glyphicon-th"></i>
            Details
        </a>
    </li>
    <li role="presentation">
        <a href="#social-networks" aria-controls="social-networks" role="tab" data-toggle="tab">
            <i class="fa fa-youtube"></i>
            Social Networks
        </a>
    </li>
    <li role="presentation">
        <a href="#auth" aria-controls="auth" role="tab" data-toggle="tab">
            <i class="fa fa-lock"></i>
            Authentication
        </a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="details">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                {!! Form::open(['route' => 'profile.update.details', 'method' => 'PUT', 'id' => 'details-form']) !!}
                    @include('user.partials.details', ['profile' => true])
                {!! Form::close() !!}
            </div>
            <div class="col-lg-4 col-md-5">
                {!! Form::open(['route' => 'profile.update.avatar', 'files' => true, 'id' => 'avatar-form']) !!}
                    @include('user.partials.avatar', ['updateUrl' => route('profile.update.avatar-external')])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="social-networks">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'profile.update.social-networks', 'method' => 'PUT', 'id' => 'socials-form']) !!}
                    @include('user.partials.social-networks')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="auth">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['route' => 'profile.update.login-details', 'method' => 'PUT', 'id' => 'socials-form']) !!}
                    @include('user.partials.auth')
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                @if (settings('2fa.enabled'))
                    <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable'; ?>

                    {!! Form::open(['route' => "profile.two-factor.{$route}", 'id' => 'two-factor-form']) !!}
                        @include('user.partials.two-factor')
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
</div>

@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
    {!! HTML::style('assets/plugins/croppie/croppie.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/plugins/croppie/croppie.js') !!}
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/btn.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\UpdateDetailsRequest', '#details-form') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\UpdateProfileLoginDetailsRequest', '#login-details-form') !!}

    @if (config('auth.2fa.enabled'))
        {!! JsValidator::formRequest('Vanguard\Http\Requests\User\EnableTwoFactorRequest', '#two-factor-form') !!}
    @endif
@stop