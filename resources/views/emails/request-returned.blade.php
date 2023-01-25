@component('mail::message')
# Request returned

Thank you for returning your items.

Item(s) returned:
- {{$req->Inventory->name}}

@component('mail::button', ['url' => route('inventory')])
View available inventory
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
