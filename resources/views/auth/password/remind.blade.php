@extends('layouts.auth')

@section('page-title', 'Reset Password')

@section('content')

<div class="form-wrap col-md-5 auth-form">
    <h1>Forgot Your Password?</h1>

    @include('partials.messages')

    <form role="form" action="<?= url('password/remind') ?>" method="POST" id="remind-password-form" autocomplete="off">
        <input type="hidden" value="<?= csrf_token() ?>" name="_token">

        <div class="form-group password-field input-icon">
            <label for="password" class="sr-only">E-Mail</label>
            <i class="fa fa-at"></i>
            <input type="email" name="email" id="email" class="form-control" placeholder="Your E-Mail">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-custom btn-lg btn-block" id="btn-reset-password">
                Reset Password
            </button>
        </div>
    </form>
</div>

@stop

@section('scripts')
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\PasswordRemindRequest', '#remind-password-form') !!}
@stop