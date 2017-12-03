@component('mail::message')
## Hey {{ $user->name }}

You are almost ready to start enjoying the app. Simply click the below button to verify your email address.

@component('mail::button', ['url' => route('verify', [$user, $user->verification_code])])
Verify email address
@endcomponent

@endcomponent
