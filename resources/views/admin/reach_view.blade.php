<p><a href="/admin">Back to main page.</a></p>

<div>
    <h2>From: {{ $user->name }} @ {{ $user->company }}</h2>
</div>

<hr>

<div>
    <p><i>Message:</i></p>

    <p>
        {{ $messageContent }}
    </p>
</div>

<hr>

<div>
    <p>
        Email: {{$user->email}}
    </p>
</div>