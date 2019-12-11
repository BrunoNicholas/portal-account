@component('mail::message')
# Order created successfully!

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
