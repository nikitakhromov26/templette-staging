@extends('layouts.auth')

@section('page-title', 'Two Factor Authentication')

@section('content')

<div class="form-wrap col-md-5 auth-form">
    <h1>Two-Factor Authentication</h1>

    @include('partials.messages')

    <form role="form" action="<?= route('auth.token.validate') ?>" method="POST" autocomplete="off">
        <input type="hidden" value="<?= csrf_token() ?>" name="_token">

        <div class="form-group password-field input-icon">
            <label for="password" class="sr-only">Token</label>
            <i class="fa fa-lock"></i>
            <input type="text" name="token" id="token" class="form-control" placeholder="Authy 2FA Token">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-custom btn-lg btn-block" id="btn-reset-password">
                Validate
            </button>
        </div>
    </form>
</div>

@stop