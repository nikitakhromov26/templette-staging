<p>Hi {{ $user->present()->nameOrEmail }},</p>

<p>New user was just registered on {{ settings('app_name') }} website.</p>

<p>To view user details just visit the link below:</p>

<p><a href="{{ route('user.show', $newUser->id) }}">{{ route('user.show', $newUser->id) }}</a></p>

Many Thanks, <br/>
{{ settings('app_name') }}