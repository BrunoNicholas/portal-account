@component('mail::message')
# New salon created!

Hello {{ explode(' ', trim(Auth::user()->name))[0] }},
Your new salon has been created successfully!

## This is the Salon
	<?php $i=0; ?>
	
	@if($salon->salon_name) Salon Name: {{ $salon->salon_name }} @endif

	@if($salon->user_id) Salon Administrator: {{ App\User::where('id',$salon->user_id)->first()->name }} @endif

	@if($salon->company_id) Main Company: {{ App\Models\Company::where('id',$salon->company_id)->first()->company_name }} @endif

	@if($salon->categories_id) Major Category: {{ App\Models\Categories::where('id',$salon->categories_id)->first()->display_name }} @endif

	@if($salon->salon_telephone) Phone Contact : {{ $salon->salon_telephone }} @endif

	@if($salon->salon_category) Other categories: {{ $salon->salon_category }} @endif

	@if($salon->salon_location) Location : {{ $salon->salon_location }} @endif

	@if($salon->description) Salon Description: {{ $salon->description }} @endif

@component('mail::button', ['url' => route('salons.show',[$type,$salon->id]) ])
View Salon
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
