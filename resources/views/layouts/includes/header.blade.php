<header class="ms-header ms-header-primary">
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
            <a class="navbar-brand" href="index.html">
	            <!-- <img src="assets/img/demo/logo-navbar.png" alt=""> -->
	            <span class="ms-logo ms-logo-sm">SP</span>
	            <span class="ms-title">Salon <strong> Portal </strong></span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="ms-navbar">
	      	<ul class="navbar-nav">
              	<li class="nav-item dropdown active">
                	<a href="#" class="nav-link animated fadeIn animation-delay-7" role="button" aria-haspopup="true" aria-expanded="false" data-name="home">Home {{-- <i class="zmdi zmdi-chevron-down"></i> --}} </a>    
            	</li>
	            <li class="nav-item dropdown dropdown-megamenu-container">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="component">
	                	Styles <i class="zmdi zmdi-chevron-down"></i></a>
	                <ul class="dropdown-menu dropdown-megamenu animated fadeIn animated-2x">
	                  	<li class="container">
	                    	<div class="row">
			                    <div class="col-sm-3 megamenu-col">
			                        <div class="megamenu-block animated fadeInLeft animated-2x">
			                          <h3 class="megamenu-block-title"><i class="fa fa-bold"></i> Bootstrap CSS</h3>
			                          <ul class="megamenu-block-list">
			                            <li>
			                              <a class="withripple" href="component-typography.html"><i class="fa fa-font"></i> Typography</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-headers.html"><i class="fa fa-header"></i> Headers</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-dividers.html"><i class="fa fa-arrows-h"></i> Dividers</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-blockquotes.html"><i class="fa fa-quote-right"></i> Blockquotes</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-forms.html"><i class="fa fa-check-square-o"></i> Forms <span class="badge badge-info pull-right"><i class="zmdi zmdi-long-arrow-up no-mr"></i> 1.5</span></a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-slider.html">
			                                <i class="fa fa-sliders"></i> Sliders <span class="badge badge-success pull-right">2.3</span>
			                              </a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-tables.html"><i class="fa fa-table"></i> Tables</a>
			                            </li>
			                          </ul>
			                        </div>
			                        <div class="megamenu-block animated fadeInLeft animated-2x">
			                          <h3 class="megamenu-block-title"><i class="fa fa-hand-o-up"></i> Buttons</h3>
			                          <ul class="megamenu-block-list">
			                            <li>
			                              <a class="withripple" href="component-basic-buttons.html">
			                                <i class="fa fa-arrow-circle-right"></i> Basic Buttons</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-buttons-components.html">
			                                <i class="fa fa-arrow-circle-right"></i> Buttons Components</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-social-buttons.html">
			                                <i class="fa fa-arrow-circle-right"></i> Social Buttons <span class="badge badge-info pull-right"><i class="zmdi zmdi-long-arrow-up no-mr"></i> 1.3</span></a>
			                            </li>
			                          </ul>
			                        </div>
			                    </div>
			                    <div class="col-sm-3 megamenu-col">
			                        <div class="megamenu-block animated fadeInLeft animated-2x">
			                          <h3 class="megamenu-block-title"><i class="fa fa-list-alt"></i> Basic Components</h3>
			                          <ul class="megamenu-block-list">
			                            <li>
			                              <a class="withripple" href="component-panels.html">
			                                <i class="zmdi zmdi-view-agenda"></i> Panels</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-alerts.html">
			                                <i class="zmdi zmdi-info"></i> Alerts &amp; Wells</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-badges.html">
			                                <i class="zmdi zmdi-tag"></i> Badges &amp; Badges Pills</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-lists.html">
			                                <i class="zmdi zmdi-view-list"></i> Lists</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-thumbnails.html">
			                                <i class="zmdi zmdi-image-o"></i> Thumbnails</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-carousels.html">
			                                <i class="zmdi zmdi-view-carousel"></i> Carousels</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-modals.html">
			                                <i class="zmdi zmdi-window-maximize"></i> Modals</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-tooltip.html">
			                                <i class="zmdi zmdi-pin-help"></i> Tooltip &amp; Popover</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-progress-bars.html">
			                                <i class="zmdi zmdi-view-headline"></i> Progress Bars</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-pagination.html">
			                                <i class="zmdi zmdi-n-2-square"></i> Pagination</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-breadcrumb.html">
			                                <i class="zmdi zmdi-label-alt-outline"></i> Breadcrumb <span class="badge badge-success pull-right">2.2</span></a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-dropdowns.html">
			                                <i class="fa fa-info"></i> Dropdowns</a>
			                            </li>
			                          </ul>
			                        </div>
			                    </div>
			                    <div class="col-sm-3 megamenu-col">
			                        <div class="megamenu-block animated fadeInRight animated-2x">
			                          <h3 class="megamenu-block-title"><i class="zmdi zmdi-folder-star-alt"></i> Extra Components</h3>
			                          <ul class="megamenu-block-list">
			                            <li>
			                              <a class="withripple" href="component-cards.html">
			                                <i class="zmdi zmdi-card-membership"></i> Cards</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-composite-cards.html">
			                                <i class="zmdi zmdi-card-giftcard"></i> Composite Cards</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-counters.html">
			                                <i class="zmdi zmdi-n-6-square"></i> Counters</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-audio-video.html">
			                                <i class="zmdi zmdi-play-circle"></i> Audio &amp; Video <span class="badge badge-info pull-right"><i class="zmdi zmdi-long-arrow-up no-mr"></i> 2.3</span></a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-masonry.html">
			                                <i class="zmdi zmdi-view-dashboard"></i> Masonry Layer</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-snackbar.html">
			                                <i class="zmdi zmdi-notifications-active"></i> SnackBar <span class="badge badge-success pull-right">1.2</span></a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-lightbox.html">
			                                <i class="zmdi zmdi-collection-image-o"></i> Lightbox <span class="badge badge-success pull-right">1.5</span></a>
			                            </li>
			                          </ul>
			                        </div>
			                        <div class="megamenu-block animated fadeInRight animated-2x">
			                          <h3 class="megamenu-block-title"><i class="zmdi zmdi-tab"></i> Collapses &amp; Tabs</h3>
			                          <ul class="megamenu-block-list">
			                            <li>
			                              <a class="withripple" href="component-collapses.html">
			                                <i class="zmdi zmdi-view-day"></i> Collapses</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-horizontal-tabs.html">
			                                <i class="zmdi zmdi-tab"></i> Horitzontal Tabs</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-vertical-tabs.html">
			                                <i class="zmdi zmdi-menu"></i> Vertical Tabs</a>
			                            </li>
			                          </ul>
			                        </div>
			                    </div>
			                    <div class="col-sm-3 megamenu-col">
			                        <div class="megamenu-block animated fadeInRight animated-2x">
			                          <h3 class="megamenu-block-title"><i class="fa fa-briefcase"></i> Icons</h3>
			                          <ul class="megamenu-block-list">
			                            <li>
			                              <a class="withripple" href="component-icons-basic.html">
			                                <i class="fa fa-arrow-circle-right"></i> Basic Icons</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-icons-fontawesome.html">
			                                <i class="fa fa-arrow-circle-right"></i> Font Awesome</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-icons-iconic.html">
			                                <i class="fa fa-arrow-circle-right"></i> Material Design Iconic</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-icons-glyphicons.html">
			                                <i class="fa fa-arrow-circle-right"></i> Glyphicons</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-icons-ionicons.html">
			                                <i class="fa fa-arrow-circle-right"></i> Ionicons <span class="badge badge-info pull-right"><i class="zmdi zmdi-long-arrow-up no-mr"></i> 2.5</span></a>
			                            </li>
			                          </ul>
			                        </div>
			                        <div class="megamenu-block animated fadeInRight animated-2x">
			                          <h3 class="megamenu-block-title"><i class="fa fa-area-chart"></i> Charts</h3>
			                          <ul class="megamenu-block-list">
			                            <li>
			                              <a class="withripple" href="component-charts-circle.html">
			                                <i class="zmdi zmdi-chart-donut"></i> Circle Charts</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-charts-bar.html">
			                                <i class="fa fa-bar-chart"></i> Bars Charts</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-charts-line.html">
			                                <i class="fa fa-line-chart"></i> Line Charts</a>
			                            </li>
			                            <li>
			                              <a class="withripple" href="component-charts-more.html">
			                                <i class="fa fa-pie-chart"></i> More Charts</a>
			                            </li>
			                          </ul>
			                        </div>
			                    </div>
	                    	</div>
	                  	</li>
	                </ul>
	            </li>
	            <li class="nav-item dropdown">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="blog">
	                	Salons &amp; Spas <i class="zmdi zmdi-chevron-down"></i></a>
	                <ul class="dropdown-menu">
	                  <li><a class="dropdown-item" href="blog-sidebar.html"><i class="zmdi zmdi-view-compact"></i> Blog Sidebar 1</a></li>
	                  <li><a class="dropdown-item" href="blog-sidebar2.html"><i class="zmdi zmdi-view-compact"></i> Blog Sidebar 2</a></li>
	                  <li><a class="dropdown-item" href="blog-masonry.html"><i class="zmdi zmdi-view-dashboard"></i> Blog Masonry 1</a></li>
	                  <li><a class="dropdown-item" href="blog-masonry2.html"><i class="zmdi zmdi-view-dashboard"></i> Blog Masonry 2</a></li>
	                  <li><a class="dropdown-item" href="blog-full.html"><i class="zmdi zmdi zmdi-view-stream"></i> Blog Full Page 1</a></li>
	                  <li><a class="dropdown-item" href="blog-full2.html"><i class="zmdi zmdi zmdi-view-stream"></i> Blog Full Page 2</a></li>
	                  <li class="dropdown-divider"></li>
	                  <li><a class="dropdown-item" href="blog-post.html"><i class="zmdi zmdi-file-text"></i> Blog Post 1</a></li>
	                  <li><a class="dropdown-item" href="blog-post2.html"><i class="zmdi zmdi-file-text"></i> Blog Post 2</a></li>
	                </ul>
	            </li>
	            <li class="nav-item dropdown">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-8" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="portfolio">Shops &amp; Products <i class="zmdi zmdi-chevron-down"></i></a>
	                <ul class="dropdown-menu">
		                <li><a class="dropdown-item" href="portfolio-filters_sidebar.html"><i class="zmdi zmdi-view-compact"></i> Portfolio Sidebar Filters</a></li>
		                <li><a class="dropdown-item" href="portfolio-filters_topbar.html"><i class="zmdi zmdi-view-agenda"></i> Portfolio Topbar Filters</a></li>
		                <li><a class="dropdown-item" href="portfolio-filters_sidebar_fluid.html"><i class="zmdi zmdi-view-compact"></i> Portfolio Sidebar Fluid</a></li>
		                <li><a class="dropdown-item" href="portfolio-filters_topbar_fluid.html"><i class="zmdi zmdi-view-agenda"></i> Portfolio Topbar Fluid</a></li>
		                <li><a class="dropdown-item" href="portfolio-cards.html"><i class="zmdi zmdi-card-membership"></i> Porfolio Cards</a></li>
		                <li><a class="dropdown-item" href="portfolio-masonry.html"><i class="zmdi zmdi-view-dashboard"></i> Porfolio Masonry</a></li>
		                <li><a class="dropdown-item with-badge" href="portfolio-gallery.html"><i class="zmdi zmdi-apps"></i> Picture Gallery <span class="badge badge-success text-right">1.5</span></a></li>
		                <li class="dropdown-divider"></li>
		                <li><a class="dropdown-item" href="portfolio-item.html"><i class="zmdi zmdi-collection-item-1"></i> Portfolio Item 1</a></li>
		                <li><a class="dropdown-item" href="portfolio-item2.html"><i class="zmdi zmdi-collection-item-2"></i> Portfolio Item 2</a></li>
	                </ul>
	            </li>
	            <li class="nav-item dropdown">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="page">Sections <i class="zmdi zmdi-chevron-down"></i></a>
	                <ul class="dropdown-menu">
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="dropdown-item has_children">Posts</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      <li><a class="dropdown-item" href="page-about.html">About us Option 1</a></li>
		                      <li><a class="dropdown-item" href="page-about2.html">About us Option 2</a></li>
		                      <li><a class="dropdown-item" href="page-about3.html">About us Option 3</a></li>
		                      <li><a class="dropdown-item" href="page-about4.html">About us Option 4</a></li>
		                      <li class="dropdown-divider"></li>
		                      <li><a class="dropdown-item" href="page-team.html">Our Team Option 1</a></li>
		                      <li><a class="dropdown-item" href="page-team2.html">Our Team Option 2</a></li>
		                    </ul>
		                </li>
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">Questions</a>
		                    <ul class="dropdown-menu">
		                      <li><a class="dropdown-item" href="page-contact.html">Contact Option 1</a></li>
		                      <li><a class="dropdown-item" href="page-contact2.html">Contact Option 2</a></li>
		                      <li class="dropdown-divider"></li>
		                      <li><a class="dropdown-item" href="page-login_register.html">Login &amp; Register</a></li>
		                      <li><a class="dropdown-item" href="page-login.html">Login Full</a></li>
		                      <li><a class="dropdown-item" href="page-login2.html">Login Integrated</a></li>
		                      <li class="dropdown-divider"></li>
		                      <li><a class="dropdown-item" href="page-login_register2.html">Register Option 1</a></li>
		                      <li><a class="dropdown-item" href="page-register2.html">Register Option 2</a></li>
		                    </ul>
		                </li>
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">About Us</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      <li><a class="dropdown-item" href="page-profile.html">User Profile Option 1</a></li>
		                      <li><a class="dropdown-item" href="page-profile2.html">User Profile Option 2</a></li>
		                    </ul>
		                </li>
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">Error</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      <li><a class="dropdown-item" href="page-404.html">Error 404 Full Page</a></li>
		                      <li><a class="dropdown-item" href="page-404_2.html">Error 404 Integrated</a></li>
		                      <li><a class="dropdown-item" href="page-500.html">Error 500 Full Page</a></li>
		                      <li><a class="dropdown-item" href="page-500_2.html">Error 500 Integrated</a></li>
		                    </ul>
		                </li>
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">Bussiness &amp; Products</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      <li><a class="dropdown-item" href="page-testimonial.html">Testimonials</a></li>
		                      <li><a class="dropdown-item" href="page-clients.html">Our Clients</a></li>
		                      <li><a class="dropdown-item" href="page-product.html">Products</a></li>
		                      <li><a class="dropdown-item" href="page-services.html">Services</a></li>
		                    </ul>
		                </li>
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">Pricing</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      <li><a class="dropdown-item" href="page-pricing.html">Pricing Box</a></li>
		                      <li><a class="dropdown-item" href="page-pricing2.html">Pricing Box 2</a></li>
		                      <li><a class="dropdown-item" href="page-princing_table.html">Pricing Mega Table</a></li>
		                    </ul>
		                </li>
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">FAQ &amp; Support</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      <li><a class="dropdown-item" href="page-support.html">Support Center</a></li>
		                      <li><a class="dropdown-item" href="page-faq.html">FAQ Option 1</a></li>
		                      <li><a class="dropdown-item" href="page-faq2.html">FAQ Option 2</a></li>
		                    </ul>
		                </li>
		                <li class="dropdown-submenu">
		                    <a href="javascript:void(0)" class="has_children dropdown-item">Email Templates</a>
		                    <ul class="dropdown-menu dropdown-menu-left">
		                      	<li>
		                      		<a class="dropdown-item with-badge" href="">Email Template 1 
		                      			<span class="badge badge-success text-right">1.2</span>
		                      		</a>
		                      	</li>
		                      	<li>
		                      		<a class="dropdown-item with-badge" href="page-email2.html">Email Template 2 
		                      			<span class="badge badge-success text-right">1.2</span>
		                      		</a>
		                      	</li>
		                    </ul>
		                </li>
                  		<li><a class="dropdown-item" href="page-all.html" class="dropdown-link">All Pages</a></li>
                	</ul>
	            </li>
	            @guest @else
	            <li class="nav-item dropdown">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-9" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="ecommerce"> User <i class="zmdi zmdi-chevron-down"></i></a>
	                <ul class="dropdown-menu">
		                <li><a class="dropdown-item" href="ecommerce-filters.html">E-Commerce Sidebar</a></li>
		                <li><a class="dropdown-item" href="ecommerce-filters-full.html">E-Commerce Sidebar Full</a></li>
		                <li><a class="dropdown-item" href="ecommerce-filters-full2.html">E-Commerce Topbar Full</a></li>
		                <li class="dropdown-divider"></li>
		                <li><a class="dropdown-item" href="ecommerce-item.html">E-Commerce Item</a></li>
		                <li><a class="dropdown-item" href="ecommerce-cart.html">E-Commerce Cart</a></li>
	                </ul>
	            </li>
	            @endguest
	      	</ul>
        </div>
      	<a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu"><i class="zmdi zmdi-menu"></i></a>
    </div> <!-- container -->
</nav>