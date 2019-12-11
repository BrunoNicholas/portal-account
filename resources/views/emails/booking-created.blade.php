@component('mail::message')
# Success

Hello {{ explode(' ', trim(Auth::user()->name))[0] }}.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
