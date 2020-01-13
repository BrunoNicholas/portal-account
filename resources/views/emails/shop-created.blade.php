@component('mail::message')
# New shop created.

Hello {{ explode(' ', trim(Auth::user()->name))[0] }}, 
Your new shop has been created successfully.

## This is the Shop
	<?php $i=0; ?>
	
	@if($shop->shop_name) {{ ++$i }}. Shop Name: {{ $shop->shop_name }} @endif

	@if($shop->user_id) {{ ++$i }}. Shop Administrator: {{ App\User::where('id',$shop->user_id)->first()->name }} @endif

	@if($shop->categories_id) {{ ++$i }}. Major Category: {{ App\Models\Categories::where('id',$shop->categories_id)->first()->display_name }} @endif

	@if($shop->shop_email) {{ ++$i }}. Email: {{ $shop->shop_email }} @endif

	@if($shop->shop_telephone) {{ ++$i }}. Telephone Number: {{ $shop->shop_telephone }} @endif
	
	@if($shop->shop_location) {{ ++$i }}. Location: {{ $shop->shop_location }} @endif

	@if($shop->products_services) {{ ++$i }}. Other Products : {{ $shop->products_services }} @endif

	@if($shop->status) {{ ++$i }}. Shop Status: {{ $shop->status }} @endif

	@if($shop->description) {{ ++$i }}. Description: {{ $shop->description }} @endif


@component('mail::button', ['url' => route('shops.show',[$type, $shop->id])])
View Shop Profile
@endcomponent

Thanks for partnering with us,<br>

Regards, {{ config('app.name') }}
@endcomponent
