@extends('layouts.auth')

@section('page-title', 'Login')

@section('content')

<div class="form-wrap col-md-5 auth-form" id="login">
    <div style="text-align: center; margin-bottom: 25px;">
        <img src="{{ url('assets/img/vanguard-logo.png') }}" alt="{{ settings('app_name') }}">
    </div>

    {{-- This will simply include partials/messages.blade.php view here --}}
    @include('partials/messages')

    <form role="form" action="<?= url('login') ?>" method="POST" id="login-form" autocomplete="off">
        <input type="hidden" value="<?= csrf_token() ?>" name="_token">

        @if (Input::has('to'))
            <input type="hidden" value="{{ Input::get('to') }}" name="to">
        @endif

        <div class="form-group input-icon">
            <label for="username" class="sr-only">Email or Username</label>
            <i class="fa fa-user"></i>
            <input type="email" name="username" id="username" class="form-control" placeholder="Email or Username">
        </div>
        <div class="form-group password-field input-icon">
            <label for="password" class="sr-only">Password</label>
            <i class="fa fa-lock"></i>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            @if (settings('forgot_password'))
                <a href="<?= url('password/remind') ?>" class="forgot">I forgot my password</a>
            @endif
        </div>
        <div class="checkbox">

            @if (settings('remember_me'))
                <input type="checkbox" name="remember" id="remember" value="1"/>
                <label for="remember">Remember me?</label>
            @endif

            @if (settings('reg_enabled'))
                <a href="<?= url("register") ?>" style="float: right;">Don't have an account?</a>
            @endif
        </div>
        <div class="form-group">
             <button type="submit" class="btn btn-custom btn-lg btn-block" id="btn-login">
                Log In
            </button>
        </div>
       
    </form>

    @include('auth.social.buttons')

</div>

@stop

@section('scripts')
    {!! HTML::script('assets/js/as/login.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\LoginRequest', '#login-form') !!}
@stop