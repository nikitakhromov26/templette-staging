<div class="panel panel-default">
    <div class="panel-heading">Authentication Throttling</div>
    <div class="panel-body">
        {!! Form::open(['route' => 'settings.auth.update', 'id' => 'auth-throttle-settings-form']) !!}

        <div class="form-group">
            <label for="name">Throttle Authentication</label>
            <br>
            <input type="hidden" name="throttle_enabled" value="0">
            {!! Form::checkbox('throttle_enabled', 1, settings('throttle_enabled'), ['class' => 'switch']) !!}
        </div>

        <div class="form-group">
            <label for="throttle_attempts">
                Maximum Number of Attempts
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Maximum number of incorrect login attempts before lockout."></span>
            </label>
            <input type="text" name="throttle_attempts" class="form-control"
                   value="{{ settings('throttle_attempts', 10) }}">
        </div>

        <div class="form-group">
            <label for="throttle_lockout_time">
                Lockout Time
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Number of minutes to lock the user out for after specified
                      maximum number of incorrect login attempts."></span>
            </label>
            <input type="text" name="throttle_lockout_time" class="form-control"
                   value="{{ settings('throttle_lockout_time', 1) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-refresh"></i>
            Update Settings
        </button>

        {!! Form::close() !!}
    </div>
</div>