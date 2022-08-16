@component('mail::message')
# Request rejected for {{$req->Inventory->name}}

This is a notification that your request was rejected, sorry.

You can request this item again at any time if you wish.

@component('mail::button', ['url' => route('requests')])
View my requests
@endcomponent

Thanks,<br>
Hardware Checkout Support Team
@endcomponent
