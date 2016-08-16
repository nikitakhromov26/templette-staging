@extends('layouts.auth')

@section('page-title', 'Reset Password')

@section('content')

<div class="form-wrap col-md-5 auth-form">
    <h1>Reset Your Password</h1>

    @include('partials.messages')

    <form role="form" action="{{ url('password/reset') }}" method="POST" id="reset-password-form" autocomplete="off">

         {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group password-field input-icon">
            <label for="password" class="sr-only">Your Email</label>
            <i class="fa fa-lock"></i>
            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
        </div>

        <div class="form-group password-field input-icon">
            <label for="password" class="sr-only">New Password</label>
            <i class="fa fa-lock"></i>
            <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
        </div>

        <div class="form-group password-field input-icon">
            <label for="password" class="sr-only">Confirm New Password</label>
            <i class="fa fa-lock"></i>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm New Password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-custom btn-lg btn-block" id="btn-reset-password">
                Update Password
            </button>
        </div>

    </form>
</div>

@stop