@component('mail::message')
# Request approved for {{$req->Inventory->name}}

Quantity: {{$req->quantity}}

Once you collect it, then the status will be changed to active.

@component('mail::button', ['url' => route('requests')])
View my requests
@endcomponent

Thanks,<br>
Hardware Checkout Support Team
@endcomponent
