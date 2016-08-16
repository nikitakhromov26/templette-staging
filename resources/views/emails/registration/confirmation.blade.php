<h1>{{ settings('app_name') }}</h1>
<p>Thank you for registering on {{ settings('app_name') }} website.</p>

<p>Please confirm your email by clicking on the link below:</p>

<a href="{{ route('register.confirm-email', $token) }}">Confirm Email</a> <br/><br/>

<p>If you can't click on that link, just copy and paste following url in your browser's address bar:</p>

<p>{{ route('register.confirm-email', $token) }}</p>

Many Thanks, <br/>
{{ settings('app_name') }}