@component('mail::message')
# Thank for registration

We are very glad that you have joined us.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/confirmPage'])
    Click this button to confirm your account.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
