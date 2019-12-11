@component('mail::message')
# New Job: 

You have created a new job application.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
