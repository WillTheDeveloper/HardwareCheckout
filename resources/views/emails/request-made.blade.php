@component('mail::message')
# Request received

An administrator will review your request soon.

Whether its approved or declined, you will receive an email with information regarding next steps.

@component('mail::button', ['url' => '')])
View your request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
