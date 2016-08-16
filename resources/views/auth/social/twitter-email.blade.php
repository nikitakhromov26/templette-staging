@extends('layouts.auth')

@section('content')

    <div class="form-wrap col-md-6 col-md-offset-3 auth-form">
        <h1>Hey {{ $account->getName() }},</h1>

        <div class="alert alert-warning">
            <strong>One more thing...</strong>
            Twitter does not provide email for authenticated user. Since this is your first time to log in with
            Twitter account, please provide your email below so we can create an account for you.
        </div>

        @include('partials.messages')

        <form role="form" action="<?= url('auth/twitter/email') ?>" method="POST" id="email-form" autocomplete="off">
            <input type="hidden" value="<?= csrf_token() ?>" name="_token">

            <div class="form-group password-field input-icon">
                <label for="password" class="sr-only">E-Mail</label>
                <i class="fa fa-at"></i>
                <input type="email" name="email" id="email" class="form-control" placeholder="Your E-Mail">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-custom btn-lg btn-block">
                    Log Me In
                </button>
            </div>
        </form>
    </div>

@stop

@section('scripts')
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\Social\SaveEmailRequest', '#email-form') !!}
@stop