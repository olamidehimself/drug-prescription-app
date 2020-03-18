@component('mail::message')
# Hello, Patient

This mail is to remind is to remind you that you have pending prescriptions not yet matk as completed

@component('mail::button', ['url' => config('app.url')])
Click here to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
