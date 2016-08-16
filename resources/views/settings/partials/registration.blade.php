<div class="panel panel-default">
    <div class="panel-heading">General</div>
    <div class="panel-body">
        {!! Form::open(['route' => 'settings.auth.update', 'id' => 'registration-settings-form']) !!}
        <div class="form-group">
            <label for="reg_enabled">Allow Registration?</label>
            <br>
            <input type="hidden" name="reg_enabled" value="0">
            <input type="checkbox" name="reg_enabled"
                   class="switch" data-on-text="YES" data-off-text="NO" value="1"
                    {!! settings('reg_enabled') ? 'checked' : '' !!}>
        </div>

        <div class="form-group">
            <label for="forgot_password">
                Terms & Conditions
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="The user has to confirm that he agree with terms and conditions in order to create account."></span>
            </label>
            <br>
            <input type="hidden" name="tos" value="0">
            {!! Form::checkbox('tos', 1, settings('tos'),
                ['class' => 'switch', 'data-on-text' => 'YES', 'data-off-text' => 'NO']) !!}
        </div>

        <div class="form-group">
            <label for="reg_email_confirmation">Email Confirmation</label>
            <br>
            <input type="hidden" name="reg_email_confirmation" value="0">
            {!! Form::checkbox('reg_email_confirmation', 1, settings('reg_email_confirmation'), ['class' => 'switch']) !!}
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-refresh"></i>
            Update Settings
        </button>
        {!! Form::close() !!}
    </div>
</div>