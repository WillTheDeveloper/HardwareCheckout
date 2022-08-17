@component('mail::message')
# Late return for {{$req->Inventory->name}}

The request for {{$req->Inventory->name}} is late and should be returned as soon as possible.

The request for this item was made {{$req->created_at->diffForHumans()}}

@component('mail::button', ['url' => route('requests')])
View late requests
@endcomponent

Thanks,<br>
Hardware Checkout Support Team
@endcomponent
