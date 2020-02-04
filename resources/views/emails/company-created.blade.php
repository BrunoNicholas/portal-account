@component('mail::message')
# New Multi Account: {{ $company->company_name }}

Hello {{ explode(' ', trim(Auth::user()->name))[0] }}, your new account has successfully been created and is ready to have shops and salons.

With this account, you can be able to create your salons or spa accounts along with shops based on their lcation.

## Account Summary
	  <?php $i=0; ?>	
  	@if($company->company_name)	{{ ++$i }}. Account Name: - {{ $company->company_name }} @endif

  	@if($company->company_email)	{{ ++$i }}. Account Email: - {{ $company->company_email }} @endif 

  	@if($company->company_telephone)	{{ ++$i }}. Telephone No: - {{ $company->company_telephone }} @endif

  	@if($company->company_bio)	{{ ++$i }}. Bio (Business Slogan): - {{ $company->company_bio }} @endif 

    @if($company->description) {{ ++$i }}. {{ $company->description }} @endif 

  	{{ ++$i }}. Account status: - {{ $company->status }}

  	@if($company->user_id){{ ++$i }}. Account Admin: - {{ App\User::where('id',$company->user_id)->first()->name }} @endif

  	{{ ++$i }}. Date Created: - {{ explode(' ', trim($company->created_at))[0] }}

  	{{ ++$i }}. Time Created: - {{ explode(' ', trim($company->created_at))[1] }}

@component('mail::button', ['url' => route('companies.show',[$type,$company->id])])
View Account
@endcomponent

Thanks for partnering with us,<br>
Regards, {{ config('app.name') }}
@endcomponent
