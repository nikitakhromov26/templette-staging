<p>A request has been made to reset your password.</p>

<p>Please click on this link below in order to reset your password:</p>

<a href="{{ url('password/reset/' . $token) }}">Reset Password</a> <br/><br/>

<p>If you can't click on that link, just copy and paste following url in your browser's address bar:</p>

<p>{{ url('password/reset/' . $token) }}</p>

Many Thanks, <br/>
{{ settings('app_name') }}