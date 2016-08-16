<div class="panel panel-default">
    <div class="panel-heading">reCAPTCHA</div>
    <div class="panel-body">

        @if (! (env('RECAPTCHA_SITEKEY') && env('RECAPTCHA_SECRETKEY')))
            <div class="alert alert-info">
                To utilize Google reCAPTCHA, please get your <code>Site Key</code> and <code>Secret Key</code>
                from <a href="https://www.google.com/recaptcha/intro/index.html" target="_blank"><strong>reCAPTCHA Website</strong></a>,
                and update your <code>RECAPTCHA_SITEKEY</code> and <code>RECAPTCHA_SECRETKEY</code> environment variables inside <code>.env</code> file.
            </div>
        @else
            @if (settings('registration.captcha.enabled'))
                {!! Form::open(['route' => 'settings.registration.captcha.disable', 'id' => 'captcha-settings-form']) !!}
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-times"></i>
                    Disable
                </button>
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => 'settings.registration.captcha.enable', 'id' => 'captcha-settings-form']) !!}
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh"></i>
                    Enable
                </button>
                {!! Form::close() !!}
            @endif
        @endif
    </div>
</div>