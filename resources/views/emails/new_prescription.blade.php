@component('mail::message')
# You've got a new Prescription
@component('mail::panel')
Hello, {{ $patient->name }}!
<br>
<p>You have a new drug prescription from Dr. <b>{{$prescription->doctor->name}}</b>. Below are some details</p> 
@endcomponent

@component('mail::table')
| Prescription       | Dosage        | Duration  |
| :------------------ |:-------------| :--------|
| {{$prescription->prescription}}| {{$prescription->usage}} daily | {{$prescription->daily}} days     |
@endcomponent


@component('mail::button', ['url' => config('app.url')])
Click here to view full details
@endcomponent

<div style="text-align: center;">
Thanks,<br>
{{ config('app.name') }}
</div>

@endcomponent
