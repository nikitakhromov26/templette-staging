<div class="panel panel-default">
    <div class="panel-heading">Login Details</div>
    <div class="panel-body">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email"
                   name="email" placeholder="Email" value="{{ $edit ? $user->email : '' }}">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="(optional)"
                   name="username" value="{{ $edit ? $user->username : '' }}">
        </div>
        <div class="form-group">
            <label for="password">{{ $edit ? "New" : '' }} Password</label>
            <input type="password" class="form-control" id="password"
                   name="password" @if ($edit) placeholder="Leave field blank if you don't want to change it" @endif>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm {{ $edit ? "New" : '' }} Password</label>
            <input type="password" class="form-control" id="password_confirmation"
                   name="password_confirmation" @if ($edit) placeholder="Leave field blank if you don't want to change it" @endif>
        </div>
        @if ($edit)
            <button type="submit" class="btn btn-primary" id="update-login-details-btn">
                <i class="fa fa-refresh"></i>
                Update Details
            </button>
        @endif
    </div>
</div>