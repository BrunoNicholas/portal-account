<div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
    <div class="sb-slidebar-container">
        <header class="ms-slidebar-header">
	        <div class="ms-slidebar-login">
	        	@guest
	            <a href="javascript:void(0)" class="withripple" data-toggle="modal" data-target="#ms-account-modal"><i class="zmdi zmdi-account"></i> Login</a>
	            <a href="javascript:void(0)" class="withripple" data-toggle="modal" data-target="#ms-account-modal"> Or Register <i class="zmdi zmdi-account-add"></i></a>
	            @else
	            <a href="javascript:void(0)" class="withripple"> {{ Auth::user()->name }} <small> - {{ App\Models\Role::where('name',Auth::user()->role)->first()->display_name }}</small> </a>
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
	              	@guest   @else
	              	@role(['client']) @else
	              	<li><a href="{{ route('home') }}"><i class="fa-angle-double-right fa"></i> Home Dashboard</a></li>
	              	@endrole
	              	@role(['super-admin','admin'])
	              	<li><a href="{{ route('userhome') }}"><i class="fa-angle-double-right fa"></i> User Dasboard</a></li>
	              	@endrole
	              	@endguest
	              	<li class="dropdown-divider"></li>
	              	<li class="text-success"><a href="https://salonportal.000webhostapp.com" target="_blank" class="text-success"><i class="fa-link fa text-primary"></i>{{ config('app.name') }} Info Site </a></li>
	            </ul>
	        </li>
	        <li class="card" role="tab" id="sch2">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc2" aria-expanded="false" aria-controls="sc2">
	              	<i class="zmdi zmdi-account"></i> My Sections 
	            </a>
	            <ul id="sc2" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch2" data-parent="#slidebar-menu">
	              	<li><a href="{{ route('profile') }}"><i class="fa-angle-double-right fa"></i> My Profile</a></li>
	              	<li><a href="{{ route('messages.index', 'inbox') }}"><i class="fa-angle-double-right fa"></i>  Inbox </a></li>
	              	<li><a href="{{ route('settings') }}"><i class="fa-angle-double-right fa"></i> Timeline</a></li>
	            </ul>
	        </li>
	        <li class="card" role="tab" id="sch4">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc4" aria-expanded="false" aria-controls="sc4">
	              	<i class="zmdi zmdi-edit"></i> Companies
	            </a>
	            <ul id="sc4" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch4" data-parent="#slidebar-menu">
	              	<li><a href="{{ route('companies.index') }}"><i class="fa-angle-double-right fa"></i> Portal Companies </a></li>
	              	<li><a href="{{ route('companies.create') }}"><i class="fa-angle-double-right fa"></i> Add Company </a>
	            </ul>
	        </li>
	        <li class="card" role="tab" id="sch5">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc5" aria-expanded="false" aria-controls="sc5">
	              	<i class="zmdi zmdi-shopping-basket"></i> E-Commerce 
	            </a>
	            <ul id="sc5" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch5" data-parent="#slidebar-menu">
		            <li><a href="ecommerce-filters.html">E-Commerce Sidebar</a></li>
		            <li><a href="ecommerce-filters-full.html">E-Commerce Sidebar Full</a></li>
		            <li><a href="ecommerce-filters-full2.html">E-Commerce Topbar Full</a></li>
		            <li><a href="ecommerce-item.html">E-Commerce Item</a></li>
		            <li><a href="ecommerce-cart.html">E-Commerce Cart</a></li>
	            </ul>
	        </li>
	        <li class="card" role="tab" id="sch6">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc6" aria-expanded="false" aria-controls="sc6">
	              <i class="zmdi zmdi-collection-image-o"></i> Portfolio </a>
	            <ul id="sc6" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch6" data-parent="#slidebar-menu">
	              <li><a href="portfolio-filters_sidebar.html">Portfolio Sidebar Filters</a></li>
	              <li><a href="portfolio-filters_topbar.html">Portfolio Topbar Filters</a></li>
	              <li><a href="portfolio-filters_sidebar_fluid.html">Portfolio Sidebar Fluid</a></li>
	              <li><a href="portfolio-filters_topbar_fluid.html">Portfolio Topbar Fluid</a></li>
	              <li><a href="portfolio-cards.html">Porfolio Cards</a></li>
	              <li><a href="portfolio-masonry.html">Porfolio Masonry</a></li>
	              <li><a href="portfolio-item.html">Portfolio Item 1</a></li>
	              <li><a href="portfolio-item2.html">Portfolio Item 2</a></li>
	            </ul>
	        </li>
	        <li>
	            <a class="link" href="component-typography.html"><i class="zmdi zmdi-view-compact"></i> UI Elements</a>
	        </li>
	        <li>
	            <a class="link" href="page-all.html"><i class="zmdi zmdi-link"></i> All Pages</a>
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