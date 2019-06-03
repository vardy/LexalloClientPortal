@component('mail::message')
# User

Response Email: {{ $user->email }}
Username: {{ $user->name }}
Company: {{ $user->company }}

# Specifications

### Source language

{{ $quote_request_submission->source_language }}

### Target language

{{ $quote_request_submission->target_language }}

### Delivery date / time

{{ $quote_request_submission->delivery_date }}

## Other instructions / comments

{{ $quote_request_submission->other_comments }}

@endcomponent
