@component('mail::message')
# Success

Hello {{ explode(' ', trim(Auth::user()->name))[0] }}.

Your booking for    scheduled for    has been made successfully. You can update the booking within the allocated time in case of changes

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
