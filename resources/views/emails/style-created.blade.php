@component('mail::message')
# New fashion style added to your salon profile!

Hello {{ explode(' ', trim(Auth::user()->name))[0] }},
Your a new fashion style has been added to your salon profile successfully!

Name: {{ $style->style_name }}

Price: UGX. {{ $style->current_price }}

Category: {{ App\Models\Categories::where('id',$style->categories_id)->first()->name }}


Next, please attach a gallery with images to it so that your client can book for it

@component('mail::button', ['url' => route('styles.show',[($style->categories_id ? App\Models\Categories::where('id',$style->categories_id)->first()->name : 'all'),$salon->id,$style->id])])
Check It Out
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
