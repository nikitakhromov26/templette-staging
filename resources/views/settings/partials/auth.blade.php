<div class="panel panel-default">
    <div class="panel-heading">General</div>
    <div class="panel-body">
        {!! Form::open(['route' => 'settings.auth.update', 'id' => 'auth-general-settings-form']) !!}

        <div class="form-group">
            <label for="remember_me">
                Allow "Remember Me"?
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Should 'Remember Me' checkbox be displayed on login form?"></span>
            </label>
            <br>
            <input type="hidden" name="remember_me" value="0">
            {!! Form::checkbox('remember_me', 1, settings('remember_me'), ['class' => 'switch']) !!}
        </div>

        <div class="form-group">
            <label for="forgot_password">
                Forgot Password
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Enable/Disable forgot password feature."></span>
            </label>
            <br>
            <input type="hidden" name="forgot_password" value="0">
            {!! Form::checkbox('forgot_password', 1, settings('forgot_password'), ['class' => 'switch']) !!}
        </div>

        <div class="form-group">
            <label for="login_reset_token_lifetime">
                Reset Token Lifetime
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Number of minutes that the reset token should be considered valid."></span>
            </label>
            <input type="text" name="login_reset_token_lifetime" class="form-control" value="{{ settings('login_reset_token_lifetime', 30) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-refresh"></i>
            Update Settings
        </button>

        {!! Form::close() !!}
    </div>
</div>