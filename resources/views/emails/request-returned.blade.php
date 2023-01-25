@component('mail::message')
# Request returned

Thank you for returning your items.

Items returned:
- {{$req->Inventory->name}}

@component('mail::button', ['url' => route('inventory')])
View available inventory
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
