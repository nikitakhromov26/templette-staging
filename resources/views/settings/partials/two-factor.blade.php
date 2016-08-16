<div class="panel panel-default">
    <div class="panel-heading">Two-Factor Authentication</div>
    <div class="panel-body">
        @if (! env('AUTHY_KEY'))
            <div class="alert alert-info">
                In order to enable Two-Factor Authentication you have to register and create
                new application on <a href="https://www.authy.com/" target="_blank"><strong>Authy Website</strong></a>,
                and update your <code>AUTHY_KEY</code> environment variable inside <code>.env</code> file.
            </div>
        @else
            @if (settings('2fa.enabled'))
                {!! Form::open(['route' => 'settings.auth.2fa.disable', 'id' => 'auth-2fa-settings-form']) !!}
                <button type="submit" class="btn btn-danger" data-toggle="loader" data-loading-text="Disabling...">
                    <i class="fa fa-times"></i>
                    Disable
                </button>
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => 'settings.auth.2fa.enable', 'id' => 'auth-2fa-settings-form']) !!}
                <button type="submit" class="btn btn-primary" data-toggle="loader" data-loading-text="Enabling...">
                    <i class="fa fa-phone"></i>
                    Enable
                </button>
                {!! Form::close() !!}
            @endif
        @endif
    </div>
</div>