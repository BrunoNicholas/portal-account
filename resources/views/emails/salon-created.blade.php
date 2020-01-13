@component('mail::message')
# New salon created!

Hello {{ explode(' ', trim(Auth::user()->name))[0] }},
Your new salon has been created successfully!

## This is the Salon
	<?php $i=0; ?>
	
	@if($salon->salon_name) {{ ++$i }} Salon Name: {{ $salon->salon_name }} @endif

	@if($salon->user_id) {{ ++$i }} Salon Administrator: {{ App\User::where('id',$salon->user_id)->first()->name }} @endif

	@if($salon->company_id) {{ ++$i }} Main Company: {{ App\Models\Company::where('id',$salon->company_id)->first()->company_name }} @endif

	@if($salon->categories_id) {{ ++$i }}. Major Category: {{ App\Models\Categories::where('id',$salon->categories_id)->first()->display_name }} @endif

	@if($salon->salon_email) {{ ++$i }} : {{ $salon->salon_email }} @endif

	@if($salon->salon_telephone) {{ ++$i }} : {{ $salon->salon_telephone }} @endif

	@if($salon->salon_website) {{ ++$i }} : {{ $salon->salon_website }} @endif

	@if($salon->salon_category) {{ ++$i }} Other categories: {{ $salon->salon_category }} @endif

	@if($salon->salon_location) {{ ++$i }} : {{ $salon->salon_location }} @endif

	@if($salon->accept_cash) {{ ++$i }} Accept Cash: Yes @endif

	@if($salon->accept_bookings) {{ ++$i }} Accepts Bookings: Yes @endif

	@if($salon->accept_orders) {{ ++$i }} Accepts Orders: Yes @endif

	@if($salon->accept_job_applicants) {{ ++$i }} Accepts job applications: Yes @endif

	@if($salon->status) {{ ++$i }} : {{ $salon->status }} @endif

	@if($salon->description) {{ ++$i }} Salon Description: {{ $salon->description }} @endif

@component('mail::button', ['url' => route('salons.show',[$type,$salon->id]) ])
View Salon
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
