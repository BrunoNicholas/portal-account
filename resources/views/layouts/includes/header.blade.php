<header class="ms-header ms-header-primary" @yield('top_menu')>
    <!--ms-header-primary-->
    <div class="container container-full">
	    <div class="ms-title">
	        <a href="{{ url('/') }}">
	          	<!-- <img src="assets/img/demo/logo-header.png" alt=""> -->
	          	<span class="ms-logo animated zoomInDown animation-delay-5">SP</span>
	          	<h1 class="animated fadeInRight animation-delay-6"> Salon <span> Portal </span></h1>
	        </a>
	    </div>
      	<div class="header-right">
	        <div class="share-menu">
		        <ul class="share-menu-list">
		            <li class="animated fadeInRight animation-delay-3"><a href="javascript:void(0)" class="btn-circle btn-google"><i class="zmdi zmdi-google"></i></a></li>
		            <li class="animated fadeInRight animation-delay-2"><a href="javascript:void(0)" class="btn-circle btn-facebook"><i class="zmdi zmdi-facebook"></i></a></li>
		            <li class="animated fadeInRight animation-delay-1"><a href="javascript:void(0)" class="btn-circle btn-twitter"><i class="zmdi zmdi-twitter"></i></a></li>
		        </ul>
	          	<a href="javascript:void(0)" class="btn-circle btn-circle-primary animated zoomInDown animation-delay-7"><i class="zmdi zmdi-share"></i></a>
	        </div>

	        @guest
        	<a href="javascript:void(0)" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" data-toggle="modal" data-target="#ms-account-modal">
        		<i class="zmdi zmdi-account"></i>
        	</a>
        	@else
        	{{-- have the user's profile image --}}
        	@endguest
	        <form class="search-form animated zoomInDown animation-delay-9">
	          	<input id="search-box" type="text" class="search-input" placeholder="Search..." name="search_all" />
	          	<label for="search-box"><i class="zmdi zmdi-search"></i></label>
	        </form>

        	<a href="javascript:void(0)" class="btn-ms-menu btn-circle btn-circle-primary ms-toggle-left animated zoomInDown animation-delay-10"><i class="zmdi zmdi-menu"></i></a>
      	</div>
    </div>
</header>
<nav class="navbar navbar-expand-md  navbar-static ms-navbar ms-navbar-primary">
    <div class="container container-full">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
	            <!-- <img src="assets/img/demo/logo-navbar.png" alt=""> -->
	            <span class="ms-logo ms-logo-sm">SP</span>
	            <span class="ms-title"> Salon <strong> Portal </strong></span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="ms-navbar">
	      	<ul class="navbar-nav">
	      		{{-- home --}}
              	<li class="nav-item dropdown active">
                	<a href="@guest {{ url('/') }} @else {{ route('home') }} @endguest" class="nav-link animated fadeIn animation-delay-7" role="button" aria-haspopup="true" aria-expanded="false" data-name="home">Home {{-- <i class="zmdi zmdi-chevron-down"></i> --}} </a>
            	</li>
            	{{-- salons and spas --}}
            	<!-- {{ $asalons = App\Models\Categories::where('type','salon-gender')->get() }} -->
            	<!-- {{ $bsalons = App\Models\Categories::where('type','salon-style')->get() }} -->
	            <li class="nav-item dropdown">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="blog">
	                	Salons &amp; Spas <i class="zmdi zmdi-chevron-down"></i></a>
                	<ul class="dropdown-menu">
	                	<li class="ms-tab-menu">
	                		<ul class="nav nav-tabs ms-tab-menu-left" role="tablist">
			                    <li class="nav-item"><a class="nav-link active" href="#tab-general" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-male-female"></i> By Gender</a></li>
			                    <li class="nav-item"><a class="nav-link" href="#tab-landing" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-account"></i> By Style </a></li>
			                    <li class="dropdown-divider"></li>
			                    <li class="nav-item">
			                    	<a class="nav-link color-primary" href="{{ route('salons.index','all') }}" role="tab"><i class="fa fa-list"></i> View All Salons &amp; Spa's </a>
			                    </li>
			                </ul>
			                    <!-- Tab panes -->
			                <div class="tab-content ms-tab-menu-right">
			                    <div class="tab-pane active" id="tab-general" role="tabpanel">
			                        <ul class="ms-tab-menu-right-container">
			                        	@foreach($asalons as $sal)
					                  	<li><a href="{{ route('salons.index',$sal->name) }}"><i class="zmdi zmdi zmdi zmdi-male-female"></i> <span style="visibility: hidden;">p</span> {{ $sal->display_name }} </a></li>
					                  	@endforeach
			                        </ul>
			                    </div>
			                    <div class="tab-pane" id="tab-landing" role="tabpanel">
			                        <ul class="ms-tab-menu-right-container">
			                          	@foreach($bsalons as $sal)
					                  	<li><a class="dropdown-item" href="{{ route('salons.index',$sal->name) }}"><i class="zmdi zmdi-view-stream"></i> {{ $sal->display_name }} </a></li>
					                  	@endforeach
			                        </ul>
			                    </div>
			                </div>
	            		</li>
	            	</ul>
	            </li>
	            {{-- fashion styles --}}
            	<!-- {{ $cstyle = App\Models\Categories::where('type','children-style')->get() }} -->
            	<!-- {{ $mstyle = App\Models\Categories::where('type','male-style')->get() }} -->
            	<!-- {{ $fstyle = App\Models\Categories::where('type','female-style')->get() }} -->
            	<!-- {{ $ustyle = App\Models\Categories::where('type','unisex-style')->get() }} -->
	            <li class="nav-item dropdown dropdown-megamenu-container">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="component">
	                	Fashion Styles <i class="zmdi zmdi-chevron-down"></i>
	                </a>
	                <ul class="dropdown-menu dropdown-megamenu animated fadeIn animated-2x">
	                  	<li class="container">
	                    	<div class="row">
			                    <div class="col-sm-3 megamenu-col">
			                        <div class="megamenu-block animated fadeInLeft animated-2x">
			                          	<h3 class="megamenu-block-title"><i class="fa fa-child"></i> Children Styles</h3>
				                        <ul class="megamenu-block-list">
				                        	@foreach($cstyle as $stycat)
						                  	<li><a class="withripple" href="{{ route('styles.index',[$stycat->name,0]) }}"><i class="fa fa-arrow-circle-right"></i> {{ $stycat->display_name }} </a></li>
						                  	@endforeach
				                            {{--
				                            	<li>
					                              	<a class="withripple" href=""><i class="fa fa-arrow-circle-right"></i> One
					                              		<span class="badge badge-info">1</span>
					                              	</a>
					                            </li>
					                            <li>
					                              	<a class="withripple" href=""><i class="fa fa-arrow-circle-right"></i> One
					                              		<span class="badge badge-success">1</span> 
					                              	</a>
					                            </li>
					                            <li>
					                              	<a class="withripple" href=""><i class="fa fa-arrow-circle-right"></i> One</a>
					                            </li> 
					                        --}}
				                        </ul>
			                        </div>
			                    </div>
			                    <div class="col-sm-3 megamenu-col">
			                        <div class="megamenu-block animated fadeInLeft animated-2x">
			                          	<h3 class="megamenu-block-title"><i class="fa fa-male"></i> Male Styles</h3>
				                        <ul class="megamenu-block-list">
				                        	@foreach($mstyle as $stycat)
						                  	<li><a class="withripple" href="{{ route('styles.index',[$stycat->name,0]) }}"><i class="fa fa-arrow-circle-right"></i> {{ $stycat->display_name }} </a></li>
						                  	@endforeach
				                        </ul>
			                        </div>
			                    </div>
			                    <div class="col-sm-3 megamenu-col">
			                        <div class="megamenu-block animated fadeInRight animated-2x">
				                        <h3 class="megamenu-block-title text-right"> Female Styles <b style="visibility: hidden;">w</b> <i class="fa fa-female"></i></h3>
				                        <ul class="megamenu-block-list">
				                        	@foreach($fstyle as $stylcat)
						                  	<li><a class="withripple" href="{{ route('styles.index',[$stylcat->name,0]) }}"><i class="fa fa-arrow-circle-right"></i> {{ $stylcat->display_name }} </a></li>
						                  	@endforeach
				                        </ul>
			                        </div>
			                    </div>
			                    <div class="col-sm-3 megamenu-col">
			                        <div class="megamenu-block animated fadeInRight animated-2x">
			                          	<h3 class="megamenu-block-title text-right"> Unisex <b style="visibility: hidden;">w</b> <i class="zmdi zmdi-male-female"></i></h3>
			                          	<ul class="megamenu-block-list">
			                          		@foreach($ustyle as $prod)
						                  	<li><a class="withripple" href="{{ route('styles.index',[$prod->name,0]) }}"><i class="fa fa-arrow-circle-right"></i> {{ $prod->display_name }} </a></li>
						                  	@endforeach
			                          	</ul>
			                        </div>
			                    </div>
			                    <hr>
			                    <div class="col-sm-6">
			                    	<a href="{{ route('styles.index',['all',0]) }}" class="btn btn-block btn-success"><i class="fa-list fa"></i> All Fashion Styles</a>
			                    </div>
			                    <div class="col-sm-6">
			                    	<a href="{{ route('products.index',['all',0]) }}" class="btn btn-block btn-info"><i class="fa-list fa"></i> All Products</a>
			                    </div>
	                    	</div>
	                  	</li>
	                </ul>
	            </li>
	            {{-- shops and products --}}
            	<!-- {{ $aproducts = App\Models\Categories::where('type','products-gender')->get() }} -->
	            <li class="nav-item dropdown">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-8" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="portfolio">Shops &amp; Products <i class="zmdi zmdi-chevron-down"></i></a>
	                <ul class="dropdown-menu">
	                	@foreach($aproducts as $prod)
	                  	<li><a class="dropdown-item" href="{{ route('products.index',[$prod->name,0]) }}"><i class="zmdi zmdi-view-compact"></i> {{ $prod->display_name }} </a></li>
	                  	@endforeach
		                <li class="dropdown-divider"></li>
		                <li><a class="dropdown-item" href="{{ route('products.index',['all','0']) }}"><i class="zmdi zmdi-card-membership"></i> View All Products</a></li>
		                <li><a class="dropdown-item color-primary" href="{{ route('shops.index','all') }}"><i class="zmdi zmdi-view-dashboard"></i> View All Shops</a></li>
		                {{-- <li class="dropdown-divider"></li>
		                <li><a class="dropdown-item" href="portfolio-item.html"><i class="zmdi zmdi-collection-item-1"></i> Portfolio Item 1</a></li>
		                <li><a class="dropdown-item" href="portfolio-item2.html"><i class="zmdi zmdi-collection-item-2"></i> Portfolio Item 2</a></li> --}}
	                </ul>
	            </li>
	            {{-- app sections --}}
	            <li class="nav-item dropdown">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="page">Sections <i class="zmdi zmdi-chevron-down"></i></a>
	                <ul class="dropdown-menu">
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="dropdown-item has_children">Posts</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      	<li><a class="dropdown-item" href="{{ route('posts.index') }}"> Users Posts </a></li>
		                      	@permission('can_add_post')
		                      	<li class="dropdown-divider"></li>
		                      	<li><a class="dropdown-item text-center" href="{{ route('posts.create') }}"> Add Post </a></li>
		                      	@endpermission
		                      	<li class="dropdown-divider"></li>
		                      	<li><a class="dropdown-item text-success" target="_blank" href="https://salonportal.000webhostapp.com/blog" ><i class="fa fa-link text-success" ></i> Portal Posts</a></li>
		                    </ul>
		                </li>
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">Questions</a>
		                    <ul class="dropdown-menu">
		                      	<li><a class="dropdown-item" href="{{ route('questions.index') }}">Asked Questions</a></li>
		                      	@permission('can_add_questions')
		                      	<li class="dropdown-divider"></li>
		                      	<li><a class="dropdown-item" href="{{ route('questions.create') }}">Ask A Question</a></li>
		                      	@endpermission
		                      	<li class="dropdown-divider"></li>
		                      	<li><a class="dropdown-item text-success" href="#" target="_blank"><i class="fa-link fa text-success"></i> Site FAQs</a></li>
		                    </ul>
		                </li>
		                @auth
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">My Wall</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      	<li><a class="dropdown-item" href="{{ route('messages.index', 'inbox') }}"> My Inbox</a></li>
		                      	<li><a class="dropdown-item" href="{{ route('profile') }}"> My Profile</a></li>
		                      	<li><a class="dropdown-item" href="{{ route('settings') }}">My Timeline</a></li>
		                    </ul>
		                </li>
		                @endauth
		                @role('super-admin')
                  			<li><a class="dropdown-item" href="{{ route('settings') }}" class="dropdown-link text-center"><i class="fa-gear fa" style="padding: 0px; margin: 0px;"></i> Timeline</a></li>
                  		@endrole
                	</ul>
	            </li>
	            @auth
	            {{-- user section --}}
	            <!-- {{ $mess = App\Models\Message::where([['receiver',Auth::user()->id],['status','inbox'],['priority','unseen']])->get() }} -->
	            <li class="nav-item dropdown">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-9" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="ecommerce">
	                	<img src="{{ Auth::user()->profile_image ? asset('files/profile/images/' . Auth::user()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;">
	                	<span style="visibility: hidden;">i</span>
	                	{{ explode(' ', trim(Auth::user()->name))[0] }} 
	                	@if (sizeof($mess) > 0)
	                	<sup>
	                		<sup>
	                			<span class="ml-auto badge-pill bg-success">
	                				{{ (App\Models\Message::where([['receiver',Auth::user()->id],['status','inbox'],['priority','unseen']])->get())->count() }}
	                			</span>
	                		</sup>
	                	</sup>
	                	@endif

	                	<i class="zmdi zmdi-chevron-down"></i>

	                </a>
	                <ul class="dropdown-menu">
		                <li>
		                	<a class="dropdown-item" href="{{ route('profile') }}">
		                		<img src="{{ Auth::user()->profile_image ? asset('files/profile/images/' . Auth::user()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;"> My Profile Settings
		                	</a>
		                </li>
		                @permission('can_message')
		                <li>
		                	<a class="dropdown-item" style="min-width: 250px;" href="{{ route('messages.index', 'inbox') }}">
		                		<b class="float-left"><i class="zmdi zmdi-email" style="font-size: 23px;"></i> Messages &amp; Info </b> 
		                		@if (sizeof($mess) > 0)
		                			<b class="ml-auto badge-pill bg-success float-right">
		                				{{ (App\Models\Message::where([['receiver',Auth::user()->id],['status','inbox'],['priority','unseen']])->get())->count() }}
		                			</b>
		                		@endif
		                	</a>
		                </li>
		                @endpermission
		                <li class="dropdown-divider"></li>
		                <li>
		                	<a class="dropdown-item" href="{{ route('questions.index') }}">
		                		<i class="fa fa-question-circle" style="font-size: 23px;"></i> My Questions </a>
		                </li>
		                <li class="dropdown-divider"></li>
		                <li class="text-center">
		                	<a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		                		<i class="fa fa-power-off text-danger" style="font-size: 23px;"></i> 
			                	Logout 
			                </a>
		                	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
		                </li>
	                </ul>
	            </li>
	            @endauth
	            <li class="nav-item dropdown">
		        	<a href="javascript:void(0)" class="btn-ms-menu btn-circle-primary ms-toggle-left animated zoomInDown animation-delay-10"><i class="zmdi zmdi-menu"></i></a>
	            </li>
	      	</ul>
        </div>
      	@if(URL::previous() != Request::fullUrl())
            <div class="mr-4">
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-info btn-rounded text-white"><i class="fa-angle-double-left fa text-white" style="font-size: 15px;"></i> Back </a>
            </div>
        @endif
        <a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu"><i class="zmdi zmdi-menu"></i></a>
    </div> <!-- container -->
</nav>