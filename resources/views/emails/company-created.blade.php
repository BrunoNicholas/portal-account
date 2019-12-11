@component('mail::message')
# New Company: {{ $company->company_name }}

Hello {{ explode(' ', trim(Auth::user()->name))[0] }}, your new company has successfully been created and is ready to have shops and salons.

## Company Summary
	  <?php $i=0; ?>	
  	@if($company->company_name)	{{ ++$i }}. Company Name: - {{ $company->company_name }} @endif

  	@if($company->company_email)	{{ ++$i }}. Company Email: - {{ $company->company_email }} @endif 

  	@if($company->company_telephone)	{{ ++$i }}. Telephone No: - {{ $company->company_telephone }} @endif 

  	@if($company->company_location)	{{ ++$i }}. Company Location: - {{ $company->company_location }} @endif 
    
  	@if($company->products_services)	{{ ++$i }}. Specialisation: - {{ $company->products_services }} @endif 

 	  @if($company->company_ID)	{{ ++$i }}. Company ID: - {{ $company->company_ID }} @endif 

  	@if($company->company_website)	{{ ++$i }}. Company Website: - {{ $company->company_website }} @endif 

  	@if($company->company_bio)	{{ ++$i }}. Company Bio: - {{ $company->company_bio }} @endif 

  	{{ ++$i }}. Company status: - Active 

  	{{ ++$i }}. Company Salons - 0

  	{{ ++$i }}. Company Shops: - 0

  	@if($company->user_id){{ ++$i }}. Company Admin: - {{ App\User::where('id',$company->user_id)->first()->name }} @endif

  	{{ ++$i }}. Date Created: - {{ explode(' ', trim($company->created_at))[0] }}

  	{{ ++$i }}. Time Created: - {{ explode(' ', trim($company->created_at))[1] }}


    @if($company->description) {{ ++$i }}. {{ $company->description }} @endif

@component('mail::button', ['url' => route('companies.show',$company->id)])
View Company
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
