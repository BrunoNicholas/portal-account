@component('mail::message')
# New shop created.

Hello {{ explode(' ', trim(Auth::user()->name))[0] }}, 
Your new shop has been created successfully.

## This is the Shop
	<?php $i=0; ?>
	
	@if($shop->shop_name) Shop Name: {{ $shop->shop_name }} @endif

	@if($shop->categories_id) Major Category: {{ App\Models\Categories::where('id',$shop->categories_id)->first()->display_name }} @endif

	@if($shop->shop_email)  Email: {{ $shop->shop_email }} @endif

	@if($shop->shop_telephone) Telephone Number: {{ $shop->shop_telephone }} @endif
	
	@if($shop->shop_location) {{ ++$i }}. Location: {{ $shop->shop_location }} @endif

	@if($shop->status) Shop Status: {{ $shop->status }} @endif

	@if($shop->description) Description: {{ $shop->description }} @endif


@component('mail::button', ['url' => route('shops.show',[$type, $shop->id])])
View Shop Profile
@endcomponent

Thanks for partnering with us,<br>

Regards, {{ config('app.name') }}
@endcomponent
