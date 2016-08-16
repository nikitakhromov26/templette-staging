<div class="panel panel-default">
    <div class="panel-heading">Two-Factor Authentication</div>
    <div class="panel-body">
        @if (! Authy::isEnabled($user))
            <div class="alert alert-info">
                In order to enable Two-Factor Authentication, you <strong>must</strong>
                install <a target="_blank" href="https://www.authy.com/">Authy</a> application on your phone.
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country_code">Country Code</label>
                        <input type="text" class="form-control" id="country_code" placeholder="381"
                               name="country_code" value="{{ $user->two_factor_country_code }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Cell Phone</label>
                        <input type="text" class="form-control" id="phone_number" placeholder="Phone without country code"
                               name="phone_number" value="{{ $user->two_factor_phone }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" data-toggle="loader" data-loading-text="Enabling...">
                <i class="fa fa-phone"></i>
                Enable
            </button>
        @else
            <button type="submit" class="btn btn-danger" data-toggle="loader" data-loading-text="Disabling...">
                <i class="fa fa-close"></i>
                Disable
            </button>
        @endif
    </div>
</div>
