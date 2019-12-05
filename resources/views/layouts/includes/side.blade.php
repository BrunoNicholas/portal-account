<div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
    <div class="sb-slidebar-container">
        <header class="ms-slidebar-header">
	        <div class="ms-slidebar-login">
	        	@guest
	            <a href="javascript:void(0)" class="withripple" data-toggle="modal" data-target="#ms-account-modal"><i class="zmdi zmdi-account"></i> Login</a>
	            <a href="javascript:void(0)" class="withripple" data-toggle="modal" data-target="#ms-account-modal"> Or Register <i class="zmdi zmdi-account-add"></i></a>
	            @else
	            <a href="javascript:void(0)" class="withripple" title="{{ App\Models\Role::where('name',Auth::user()->role)->first()->description }}"> {{ Auth::user()->name }} <small> - {{ App\Models\Role::where('name',Auth::user()->role)->first()->display_name }}</small> </a>
	            @endguest
	        </div>
	        <div class="ms-slidebar-title">
	            <form class="search-form">
	              <input id="search-box-slidebar" type="text" class="search-input" placeholder="Search..." name="q" />
	              <label for="search-box-slidebar"><i class="zmdi zmdi-search"></i></label>
	            </form>
	            <div class="ms-slidebar-t">
	              <span class="ms-logo ms-logo-sm">SP</span>
	              <h3>Salon<span>Portal</span></h3>
	            </div>
	        </div>
        </header>
        <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
	        <li class="card" role="tab" id="sch1">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc1" aria-expanded="false" aria-controls="sc1">
	            <i class="zmdi zmdi-home"></i> Home Sections </a>
	            <ul id="sc1" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch1" data-parent="#slidebar-menu">
	              	<li><a href="{{ url('/') }}"><i class="fa-angle-double-right fa"></i> {{ config('app.name') }}</a></li>
	              	@auth
	              	@role(['client']) @else
	              	<li><a href="{{ route('home') }}"><i class="fa-angle-double-right fa"></i> Home Dashboard</a></li>
	              	@endrole
	              	@role(['super-admin','admin'])
	              	<li><a href="{{ route('userhome') }}"><i class="fa-angle-double-right fa"></i> User Dasboard</a></li>
	              	<li><a href="{{ route('feedback.index') }}" class="text-warning"><i class="fa-angle-double-right fa text-warning"></i> User Feedback</a></li>
	              	@endrole
	              	@endauth
	              	<li class="dropdown-divider"></li>
	              	<li class="text-success"><a href="https://salonportal.000webhostapp.com" target="_blank" class="text-success"><i class="fa-link fa text-primary"></i>{{ config('app.name') }} Info Site </a></li>
	            </ul>
	        </li>
	        @auth
	        <li class="card" role="tab" id="sch2">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc2" aria-expanded="false" aria-controls="sc2">
	              	<i class="zmdi zmdi-account"></i> My Sections 
	            </a>
	            <ul id="sc2" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch2" data-parent="#slidebar-menu">
	              	<li><a href="{{ route('profile') }}"><i class="fa-angle-double-right fa"></i> My Profile</a></li>
	              	<li><a href="{{ route('messages.index', 'inbox') }}"><i class="fa-angle-double-right fa"></i>  Inbox </a></li>
	              	<li><a href="{{ route('settings') }}"><i class="fa-angle-double-right fa"></i> Timeline</a></li>
	              	<li class="dropdown-divider"></li>
	              	<li><a href="{{ route('galleries.index') }}"><i class="fa-angle-double-right fa"></i> Galleries</a></li>
	              	<li><a href="{{ route('images.index') }}"><i class="fa-angle-double-right fa"></i> Images </a></li>
	            </ul>
	        </li>@endauth
	        <li class="card" role="tab" id="sch4">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc4" aria-expanded="false" aria-controls="sc4">
	              	<i class="zmdi zmdi-ungroup"></i> Companies
	            </a>
	            <ul id="sc4" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch4" data-parent="#slidebar-menu">
	              	<li><a href="{{ route('companies.index') }}"><i class="fa-angle-double-right fa"></i> Portal Companies </a></li>
	              	@permission('can_add_company')
	              	<li><a href="{{ route('companies.create') }}"><i class="fa-angle-double-right fa"></i> Add Company </a>
	              	@endpermission
	            </ul>
	        </li>
	        <li class="card" role="tab" id="sch5">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc5" aria-expanded="false" aria-controls="sc5">
	              	<i class="zmdi zmdi-male-female"></i> Salons &amp; Spa's
	            </a>
	            <ul id="sc5" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch5" data-parent="#slidebar-menu">
		            <li><a href="{{ route('salons.index','all') }}"><i class="fa-angle-double-right fa"></i> Portal Salons</a></li>
		            @permission('can_add_salon')
		            <li><a href="{{ route('salons.create','all') }}"><i class="fa-angle-double-right fa"></i> Register Salon </a></li>
		            @endpermission
	            </ul>
	        </li>
	        <li class="card" role="tab" id="sch6">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc6" aria-expanded="false" aria-controls="sc6">
	              	<i class="zmdi zmdi-male-female"></i> Shops 
	            </a>
	            <ul id="sc6" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch6" data-parent="#slidebar-menu">
	              	<li><a href="{{ route('shops.index','all') }}"><i class="fa-angle-double-right fa"></i> Product Shop </a></li>
	              	@permission('can_add_salon')
	              	<li><a href="{{ route('shops.create','all') }}"><i class="fa-angle-double-right fa"></i> Register Shop </a></li>
	              	@endpermission
	            </ul>
	        </li>
	        @auth
	        <li class="card" role="tab" id="sch6">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc7" aria-expanded="false" aria-controls="sc7">
	              	<i class="zmdi zmdi-plus-square"></i> Bookings 
	            </a>
	            <ul id="sc7" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch6" data-parent="#slidebar-menu">
	              	<li><a href="{{ route('bookings.index', ['all',0]) }}"><i class="fa-angle-double-right fa"></i> Bookings </a></li>
	              	<li><a href="{{ route('bookings.create', ['all',0]) }}"><i class="fa-angle-double-right fa"></i> Book Now </a></li>
	            </ul>
	        </li>
	        <li class="card" role="tab" id="sch6">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc8" aria-expanded="false" aria-controls="sc8">
	              	<i class="zmdi zmdi-star-circle"></i> Orders 
	            </a>
	            <ul id="sc8" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch6" data-parent="#slidebar-menu">
	              	<li><a href="{{ route('orders.index', ['all',0]) }}"><i class="fa-angle-double-right fa"></i> View Orders </a></li>
	              	<li><a href="{{ route('orders.create', ['all',0]) }}"><i class="fa-angle-double-right fa"></i> Order Now </a></li>
	            </ul>
	        </li>
	        @endauth
	        <li>
	            <a class="link" href="{{ route('questions.index') }}"><i class="fa-question-circle fa"></i> Questions</a>
	        </li>
	        <li>
	            <a class="link" href="{{ route('posts.index') }}"><i class="zmdi zmdi-view-compact"></i> Posts</a>
	        </li>
	        @permission('can_view_jobs')
	        <li>
	            <a class="link" href="{{ route('jobs.index') }}"><i class="zmdi zmdi-link"></i> Job Applications </a>
	        </li>
	        @endpermission
	        <li>
	        	@guest
		        	<a href="{{ route('login') }}" class="btn btn-raised btn-primary btn-xs">
		        		<i class="fa fa-power-off text-white" style="font-size: 23px;"></i> Login
		        	</a>
	        	@else
	        		<a class="btn btn-raised btn-danger" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		            <i class="fa fa-power-off text-white" style="font-size: 23px;"></i> Logout </a>
		            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
	        	@endif
	        </li>
        </ul>
        <div class="ms-slidebar-social ms-slidebar-block">
            <h4 class="ms-slidebar-block-title text-center">Social Links</h4>
            <div class="ms-slidebar-social">
	            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-facebook"><i class="zmdi zmdi-facebook"></i> {{-- <span class="badge-pill badge-pill-pink">12</span> --}}
	                <div class="ripple-container"></div>
	            </a>
	            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-twitter"><i class="zmdi zmdi-twitter"></i> {{-- <span class="badge-pill badge-pill-pink">4</span> --}}
	                <div class="ripple-container"></div>
	            </a>
	            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-google"><i class="zmdi zmdi-google"></i>
	                <div class="ripple-container"></div>
	            </a>
	            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-instagram"><i class="zmdi zmdi-instagram"></i>
	                <div class="ripple-container"></div>
	            </a>
            </div>
        </div>
    </div>
</div>