@component('mail::message')
# User

Response Email: {{ $user->email }}

Username: {{ $user->name }}

Company: {{ $user->company }}

# Message

{{ $reach_coo_submission->message }}
@endcomponent
