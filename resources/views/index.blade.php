<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#333">
    <title>{{ config('app.name', 'Salon Portal') }}</title>

    <meta name="description" content="Material Style Theme">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png?v=3') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/css/preload.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.light-blue-500.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/width-boxed.min.css') }}" id="ms-boxed" disabled="">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <a href="javascript:void(0)" class="ms-conf-btn ms-configurator-btn btn-circle btn-circle-raised btn-circle-primary animated rubberBand"><i class="fa fa-gears"></i></a>
    <div id="ms-configurator" class="ms-configurator">
      <div class="ms-configurator-title">
        <h3><i class="fa fa-gear"></i> Theme Configurator</h3>
        <a href="javascript:void(0);" class="ms-conf-btn withripple"><i class="zmdi zmdi-close"></i></a>
      </div>
      <div class="panel-group" id="accordion_conf" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="ms-conf-header-color">
            <h4 class="panel-title">
              <a role="button" class="withripple" data-toggle="collapse" href="#ms-collapse-conf-1" aria-expanded="true" aria-controls="ms-collapse-conf-1">
                <i class="zmdi zmdi-invert-colors"></i> Color Selector </a>
            </h4>
          </div>
          <div id="ms-collapse-conf-1" class="card-collapse collapse show" role="tabpanel" aria-labelledby="ms-conf-header-color" data-parent="#accordion_conf">
            <div class="panel-body">
              <div id="color-options" class="ms-colors-container">
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary red" data-color="red">red</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary pink" data-color="pink">pink</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary purple" data-color="purple">purple</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary deep-purple" data-color="deep-purple">deep-purple</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary indigo" data-color="indigo">indigo</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary blue" data-color="blue">blue</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary light-blue active" data-color="light-blue">light-blue</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary cyan" data-color="cyan">cyan</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary teal" data-color="teal">teal</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary green" data-color="green">green</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary light-green" data-color="light-green">light-green</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary lime" data-color="lime">lime</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary yellow" data-color="yellow">yellow</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary amber" data-color="amber">amber</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary orange" data-color="orange">orange</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary deep-orange" data-color="deep-orange">deep-orange</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary brown" data-color="brown">brown</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary grey" data-color="grey">grey</a>
                <a href="javascript:void(0);" class="ms-color-box ms-color-box-primary blue-grey" data-color="blue-grey">blue-grey</a>
              </div>
              <div id="grad-options" class="ms-color-shine">
                <h4 class="no-mb text-center">Color Brightness</h4>
                <span>300</span><span>400</span><span>500</span><span>600</span><span>700</span><span>800</span>
                <a href="javascript:void(0)" data-shine=300 class="ms-color-box grad c300 light-blue">300</a>
                <a href="javascript:void(0)" data-shine=400 class="ms-color-box grad c400 light-blue">400</a>
                <a href="javascript:void(0)" data-shine=500 class="ms-color-box grad c500 light-blue active">500</a>
                <a href="javascript:void(0)" data-shine=600 class="ms-color-box grad c600 light-blue">600</a>
                <a href="javascript:void(0)" data-shine=700 class="ms-color-box grad c700 light-blue">700</a>
                <a href="javascript:void(0)" data-shine=800 class="ms-color-box grad c800 light-blue">800</a>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="ms-conf-header-headers">
            <h4 class="panel-title">
              <a class="collapsed withripple" role="button" data-toggle="collapse" href="#ms-collapse-conf-2" aria-expanded="false" aria-controls="ms-collapse-conf-2">
                <i class="zmdi zmdi-view-compact"></i> Header Styles </a>
            </h4>
          </div>
          <div id="ms-collapse-conf-2" class="card-collapse collapse" role="tabpanel" aria-labelledby="ms-conf-header-headers" data-parent="#accordion_conf">
            <div class="panel-body">
              <!--<h5>Preset Options</h5>
                    <form class="form-inverse ms-conf-radio">
                        <div class="form-group">
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Default Style
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Pure Material
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Navbar Mode
                                </label>
                            </div>
                        </div>
                    </form>
                    <h5>Custom Header</h5>-->
              <h6>Header Options</h6>
              <form class="form-inverse ms-conf-radio" id="header-config">
                <div class="form-group">
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customHeader" id="whiteHeader" value="white" checked="cheked"> Light Color </label>
                  </div>
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customHeader" id="primaryHeader" value="primary"> Primary Color </label>
                  </div>
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customHeader" id="darkHeader" value="dark"> Dark Color </label>
                  </div>
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customHeader" id="noHeader" value="hidden"> No Header (Navbar Mode) </label>
                  </div>
                </div>
              </form>
              <h6>Navbar Options</h6>
              <form class="form-inverse ms-conf-radio" id="navbar-config">
                <div class="form-group">
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customNavbar" id="whiteNavbar" value="white" checked=""> Light Color </label>
                  </div>
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customNavbar" id="primaryNavbar" value="primary"> Primary Color </label>
                  </div>
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customNavbar" id="darkNavbar" value="dark"> Dark Color </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="ms-conf-header-container">
            <h4 class="panel-title">
              <a class="collapsed withripple" role="button" data-toggle="collapse" href="#ms-conf-collapse-3" aria-expanded="false" aria-controls="ms-conf-collapse-3">
                <i class="zmdi zmdi-grid"></i> Container Options </a>
            </h4>
          </div>
          <div id="ms-conf-collapse-3" class="card-collapse collapse" role="tabpanel" aria-labelledby="ms-conf-header-container" data-parent="#accordion_conf">
            <div class="panel-body">
              <form class="form-inverse ms-conf-radio" id="boxed-config">
                <div class="form-group">
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customWidth" id="fullWidth" value="full" checked=""> Full Width </label>
                  </div>
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="customWidth" id="boxedWidth" value="boxed"> Boxed Mode </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
	<div class="ms-site-container">
      	<!-- Modal -->
      	<div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        	<div class="modal-dialog animated zoomIn animated-3x" role="document">
	          	<div class="modal-content">
		            <div class="modal-header d-block shadow-2dp no-pb">
		              <button type="button" class="close d-inline pull-right mt-2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
		              <div class="modal-title text-center">
		                <span class="ms-logo ms-logo-white ms-logo-sm mr-1">M</span>
		                <h3 class="no-m ms-site-title">Material<span>Style</span></h3>
		              </div>
		              <div class="modal-header-tabs">
		                <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
		                  <li class="nav-item" role="presentation"><a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab" class="nav-link active withoutripple"><i class="zmdi zmdi-account"></i> Login</a></li>
		                  <li class="nav-item" role="presentation"><a href="#ms-register-tab" aria-controls="ms-register-tab" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-account-add"></i> Register</a></li>
		                  <li class="nav-item" role="presentation"><a href="#ms-recovery-tab" aria-controls="ms-recovery-tab" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-key"></i> Recovery Pass</a></li>
		                </ul>
		              </div>
		            </div>
		            <div class="modal-body">
		              	<div class="tab-content">
		                	<div role="tabpanel" class="tab-pane fade active show" id="ms-login-tab">
				                <form autocomplete="off">
				                    <fieldset>
				                      <div class="form-group label-floating">
				                        <div class="input-group">
				                          <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
				                          <label class="control-label" for="ms-form-user">Username</label>
				                          <input type="text" id="ms-form-user" class="form-control">
				                        </div>
				                      </div>
				                      <div class="form-group label-floating">
				                        <div class="input-group">
				                          <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
				                          <label class="control-label" for="ms-form-pass">Password</label>
				                          <input type="password" id="ms-form-pass" class="form-control">
				                        </div>
				                      </div>
				                      <div class="row mt-2">
				                        <div class="col-md-6">
				                          <div class="form-group no-mt">
				                            <div class="checkbox">
				                              <label>
				                                <input type="checkbox"> Remember Me </label>
				                            </div>
				                          </div>
				                        </div>
				                        <div class="col-md-6">
				                          <button class="btn btn-raised btn-primary pull-right">Login</button>
				                        </div>
				                      </div>
				                    </fieldset>
				                </form>
				                <div class="text-center">
				                    <h3>Login with</h3>
				                    <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-facebook"><i class="zmdi zmdi-facebook"></i> Facebook</a>
				                    <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-twitter"><i class="zmdi zmdi-twitter"></i> Twitter</a>
				                    <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-google"><i class="zmdi zmdi-google"></i> Google</a>
				                </div>
		                	</div>
			                <div role="tabpanel" class="tab-pane fade" id="ms-register-tab">
				                <form>
				                    <fieldset>
				                      <div class="form-group label-floating">
				                        <div class="input-group">
				                          <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
				                          <label class="control-label" for="ms-form-user-r">Username</label>
				                          <input type="text" id="ms-form-user-r" class="form-control">
				                        </div>
				                      </div>
				                      <div class="form-group label-floating">
				                        <div class="input-group">
				                          <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
				                          <label class="control-label" for="ms-form-email-r">Email</label>
				                          <input type="email" id="ms-form-email-r" class="form-control">
				                        </div>
				                      </div>
				                      <div class="form-group label-floating">
				                        <div class="input-group">
				                          <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
				                          <label class="control-label" for="ms-form-pass-r">Password</label>
				                          <input type="password" id="ms-form-pass-r" class="form-control">
				                        </div>
				                      </div>
				                      <div class="form-group label-floating">
				                        <div class="input-group">
				                          <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
				                          <label class="control-label" for="ms-form-pass-rn">Re-type Password</label>
				                          <input type="password" id="ms-form-pass-rn" class="form-control">
				                        </div>
				                      </div>
				                      <button class="btn btn-raised btn-block btn-primary">Register Now</button>
				                    </fieldset>
				                </form>
			                </div>
		                	<div role="tabpanel" class="tab-pane fade" id="ms-recovery-tab">
				                <fieldset>
				                    <div class="form-group label-floating">
					                    <div class="input-group">
					                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					                        <label class="control-label" for="ms-form-user-re">Username</label>
					                        <input type="text" id="ms-form-user-re" class="form-control">
					                    </div>
				                    </div>
				                    <div class="form-group label-floating">
					                    <div class="input-group">
					                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
					                        <label class="control-label" for="ms-form-email-re">Email</label>
					                        <input type="email" id="ms-form-email-re" class="form-control">
					                    </div>
				                    </div>
				                    <button class="btn btn-raised btn-block btn-primary">Send Password</button>
				                </fieldset>
				            </div>
		                </div>
		             </div>
	            </div>
          	</div>
        </div>
  	</div>
    <header class="ms-header ms-header-primary">
        <!--ms-header-primary-->
        <div class="container container-full">
          <div class="ms-title">
            <a href="index.html">
              <!-- <img src="assets/img/demo/logo-header.png" alt=""> -->
              <span class="ms-logo animated zoomInDown animation-delay-5">M</span>
              <h1 class="animated fadeInRight animation-delay-6">Material <span>Style</span></h1>
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
            <a href="javascript:void(0)" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" data-toggle="modal" data-target="#ms-account-modal"><i class="zmdi zmdi-account"></i></a>
            <form class="search-form animated zoomInDown animation-delay-9">
              <input id="search-box" type="text" class="search-input" placeholder="Search..." name="q" />
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
		            <span class="ms-logo ms-logo-sm">M</span>
		            <span class="ms-title">Material <strong>Style</strong></span>
	            </a>
	        </div>
	        <div class="collapse navbar-collapse" id="ms-navbar">
            	<ul class="navbar-nav">
	              	<li class="nav-item dropdown active">
	                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="home">Home <i class="zmdi zmdi-chevron-down"></i></a>
		                <ul class="dropdown-menu">
		                  <li class="ms-tab-menu">
		                    <!-- Nav tabs -->
		                    <ul class="nav nav-tabs ms-tab-menu-left" role="tablist">
		                      <li class="nav-item"><a class="nav-link active" href="#tab-general" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-home"></i> General Purpose</a></li>
		                      <li class="nav-item"><a class="nav-link" href="#tab-landing" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-desktop-windows"></i> Landing pages</a></li>
		                      <li class="nav-item"><a class="nav-link" href="#tab-revolution" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-panorama-horizontal"></i> Slider Revolution</a></li>
		                      <li class="nav-item"><a class="nav-link" href="#tab-shop" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-store"></i> Shop</a></li>
		                      <li class="nav-item"><a class="nav-link" href="#tab-profile" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-account"></i> Professional Profile</a></li>
		                      <li class="nav-item"><a class="nav-link" href="#tab-blog" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-edit"></i> Blog Template</a></li>
		                      <li class="nav-item"><a class="nav-link" href="#tab-magazine" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-flip"></i> Magazine Template</a></li>
		                      <li class="nav-item"><a class="nav-link" href="#tab-app" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-smartphone-iphone"></i> App Pages</a></li>
		                      <li class="nav-item"><a class="nav-link" href="#tab-ads" data-hover="tab" data-toggle="tab" role="tab"><i class="zmdi zmdi-search"></i> Classified Ads</a></li>
		                    </ul>
		                    <!-- Tab panes -->
		                    <div class="tab-content ms-tab-menu-right">
		                      <div class="tab-pane active" id="tab-general" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a href="index.html">Default Home</a></li>
		                          <li><a href="home-generic-2.html">Home Black Slider</a></li>
		                          <li><a href="home-generic-3.html">Home Browsers Intro</a></li>
		                          <li><a href="home-generic-4.html">Home Mobile Intro</a></li>
		                          <li><a href="home-generic-5.html">Home Material Icons</a></li>
		                          <li><a href="home-generic-6.html">Home Typed Hero</a></li>
		                          <li><a href="home-generic-7.html">Home Typed Hero 2</a></li>
		                        </ul>
		                      </div>
		                      <div class="tab-pane" id="tab-landing" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a href="home-landing.html">Home Landing Intro</a></li>
		                          <li><a href="home-landing2.html">Home Landing Intro 2</a></li>
		                          <li><a href="home-landing4.html">Home Landing Intro 3</a></li>
		                          <li><a href="home-landing3.html">Home Landing Video</a></li>
		                          <li><a href="home-cv3.html">Home Profile Landing 1</a></li>
		                          <li><a href="home-cv4.html">Home Profile Landing 2</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Landing Video 2 (Next Update)</a></li>
		                        </ul>
		                      </div>
		                      <div class="tab-pane" id="tab-revolution" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a class="with-badge" href="home-revolution.html">Home Revolution Devices <span class="badge badge-success pull-right">1.3</span></a></li>
		                          <li><a class="with-badge" href="home-revolution2.html">Home Revolution App <span class="badge badge-success pull-right">1.3</span></a></li>
		                          <li><a class="with-badge" href="home-revolution3.html">Home Revolution Video <span class="badge badge-success pull-right">1.3</span></a></li>
		                          <li><a class="with-badge" href="home-revolution4.html">Home Revolution Idea <span class="badge badge-success pull-right">1.3</span></a></li>
		                        </ul>
		                      </div>
		                      <div class="tab-pane" id="tab-shop" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a href="home-shop.html">Home Shop 1</a></li>
		                          <li><a href="home-shop2.html">Home Shop 2</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Home Shop 3 (Next Update)</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Home Shop 4 (Next Update)</a></li>
		                        </ul>
		                      </div>
		                      <div class="tab-pane" id="tab-profile" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a href="home-cv.html">Home Profile 1</a></li>
		                          <li><a href="home-cv2.html">Home Profile 2</a></li>
		                          <li><a href="home-cv3.html">Home Profile Landing 1</a></li>
		                          <li><a href="home-cv4.html">Home Profile Landing 2</a></li>
		                        </ul>
		                      </div>
		                      <div class="tab-pane" id="tab-blog" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a href="home-blog.html">Home Blog 1</a></li>
		                          <li><a href="home-blog2.html">Home Blog 2</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Home Blog 3 (Next Update)</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Home Blog 4 (Next Update)</a></li>
		                        </ul>
		                      </div>
		                      <div class="tab-pane" id="tab-magazine" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a href="home-magazine.html">Home Magazine 1</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Magazine 2 (Next Update)</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Magazine 3 (Next Update)</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Magazine 4 (Next Update)</a></li>
		                        </ul>
		                      </div>
		                      <div class="tab-pane" id="tab-app" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a href="home-app.html">Home App 1</a></li>
		                          <li><a href="home-app2.html">Home App 2</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Home App 3 (Next Update)</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Home App 4 (Next Update)</a></li>
		                        </ul>
		                      </div>
		                      <div class="tab-pane" id="tab-ads" role="tabpanel">
		                        <ul class="ms-tab-menu-right-container">
		                          <li><a href="home-class.html">Home Classifieds 1</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Classifieds 2 (Next Update)</a></li>
		                          <li class="disable"><a href="javascript:void(0)">Classifieds 3 (Next Update)</a></li>
		                        </ul>
		                      </div>
		                    </div>
		                  </li>
		                </ul>
	              	</li>
	              	<li class="nav-item dropdown">
	                	<a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="page">Pages <i class="zmdi zmdi-chevron-down"></i></a>
	                	<ul class="dropdown-menu">
			                <li class="dropdown-submenu">
			                    <a href="javascript:void(0)" class="dropdown-item has_children">About us &amp; Team</a>
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
			                    <a href="javascript:void(0)" class="has_children dropdown-item">Form</a>
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
			                    <a href="javascript:void(0)" class="has_children dropdown-item">Profiles</a>
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
			                    <a href="javascript:void(0)" class="has_children dropdown-item">Coming Soon</a>
			                    <ul class="dropdown-menu dropdown-menu-left">
			                      <li><a class="dropdown-item" href="page-coming.html">Coming Soon Option 1</a></li>
			                      <li><a class="dropdown-item" href="page-coming2.html">Coming Soon Option 2</a></li>
			                      <li><a class="dropdown-item" href="page-coming3.html">Coming Soon Option 3</a></li>
			                    </ul>
			                </li>
			                <li class="dropdown-submenu">
			                    <a href="javascript:void(0)" class="has_children dropdown-item">Timeline</a>
			                    <ul class="dropdown-menu dropdown-menu-left">
			                      <li><a class="dropdown-item" href="page-timeline_left.html">Timeline Left</a></li>
			                      <li><a class="dropdown-item" href="page-timeline_left2.html">Timeline Left 2</a></li>
			                      <li><a class="dropdown-item" href="page-timeline.html">Timeline Center</a></li>
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
		            <li class="nav-item dropdown dropdown-megamenu-container">
		                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="component">UI Elements <i class="zmdi zmdi-chevron-down"></i></a>
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
		                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="blog">Blog <i class="zmdi zmdi-chevron-down"></i></a>
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
		                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-8" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="portfolio">Portfolio <i class="zmdi zmdi-chevron-down"></i></a>
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
		                <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-9" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="ecommerce">E-Commerce <i class="zmdi zmdi-chevron-down"></i></a>
		                <ul class="dropdown-menu">
			                <li><a class="dropdown-item" href="ecommerce-filters.html">E-Commerce Sidebar</a></li>
			                <li><a class="dropdown-item" href="ecommerce-filters-full.html">E-Commerce Sidebar Full</a></li>
			                <li><a class="dropdown-item" href="ecommerce-filters-full2.html">E-Commerce Topbar Full</a></li>
			                <li class="dropdown-divider"></li>
			                <li><a class="dropdown-item" href="ecommerce-item.html">E-Commerce Item</a></li>
			                <li><a class="dropdown-item" href="ecommerce-cart.html">E-Commerce Cart</a></li>
		                </ul>
		            </li>
            	</ul>
	        </div>
          	<a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu"><i class="zmdi zmdi-menu"></i></a>
        </div> <!-- container -->
    </nav>
    <header class="wrap wrap-mountain mt--40">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 pr-6">
              <h1 class="animated fadeInDown animation-delay-5 color-white">A single template, infinite possibilities</h1>
              <p class="lead animated fadeInDown animation-delay-5 color-white mb-2">We give you everything done, except the coffee.</p>
              <div class="card card-body card-warning card-dark-inverse animated fadeInLeft animation-delay-5">
                <div class="media">
                  <div class="media-left d-none d-sm-block media-middle pr-4">
                    <i class="zmdi zmdi-account zmdi-hc-5x color-warning"></i>
                  </div>
                  <div class="media-body no-mt">
                    <h3 class="color-warning no-mt">Lorem ipsum dolor sit.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis voluptatibus atque minima provident obcaecati eaque.</p>
                  </div>
                </div>
              </div>
              <div class="card card-body card-success card-dark-inverse animated fadeInLeft animation-delay-7">
                <div class="media">
                  <div class="media-left d-none d-sm-block media-middle pr-4">
                    <i class="zmdi zmdi-desktop-mac zmdi-hc-5x color-success"></i>
                  </div>
                  <div class="media-body no-mt">
                    <h3 class="color-success no-mt">Lorem ipsum dolor sit.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis voluptatibus atque minima provident obcaecati eaque.</p>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                <a href="javascript:void(0);" class="btn btn-xlg btn-white color-warning btn-raised animated fadeInLeft animation-delay-14 mr-2"><i class="zmdi zmdi-settings"></i> Personalize</a>
                <a href="javascript:void(0);" class="btn btn-xlg btn-white color-success btn-raised animated fadeInRight animation-delay-14"><i class="zmdi zmdi-download"></i> Download</a>
              </div>
            </div>
            <div class="col-lg-5 text-center mt-6">
              <div class="img-phone-container">
                <img class="img-fluid animated zoomInDown animation-delay-3 index-1" src="{{ asset('assets/img/demo/pixel1.png') }}">
                <img class="img-fluid img-phone-left" src="{{ asset('assets/img/demo/pixel3.png') }}">
                <img class="img-fluid img-phone-right" src="{{ asset('assets/img/demo/pixel2.png') }}">
              </div>
            </div>
          </div>
        </div>
    </header>
    <div class="container mt-6">
        <h2 class="text-center color-primary mb-2 wow fadeInDown animation-delay-4">Know our amazing features</h2>
        <p class="lead text-center aco wow fadeInDown animation-delay-5 mw-800 center-block mb-4"> Lorem ipsum dolor sit amet, <span class="color-primary">consectetur adipisicing</span> elit. Dolor alias provident excepturi eligendi, nam numquam iusto eum illum, ea quisquam.</p>
        <div class="row">
	        <div class="col-xl-3 col-lg-6 col-md-6">
	            <div class="card card-warning-inverse wow fadeInLeft animation-delay-4">
	              <div class="text-center card-body">
	                <span class="ms-icon ms-icon-circle ms-icon-white ms-icon-inverse ms-icon-xxlg "><i class="zmdi zmdi-desktop-mac"></i></span>
	                <h4 class="">A feature title</h4>
	                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                <a href="javascript:void(0)" class="btn btn-white color-warning btn-raised">Action here</a>
	              </div>
	            </div>
	        </div>
	        <div class="col-xl-3 col-lg-6 col-md-6">
	            <div class="card card-royal-inverse wow fadeInLeft animation-delay-3">
		            <div class="text-center card-body">
		                <span class="ms-icon ms-icon-circle ms-icon-white ms-icon-inverse ms-icon-xxlg "><i class="zmdi zmdi-download"></i></span>
		                <h4 class="">A feature title</h4>
		                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		                <a href="javascript:void(0)" class="btn btn-white color-royal btn-raised">Action here</a>
		            </div>
	            </div>
	        </div>
	        <div class="col-xl-3 col-lg-6 col-md-6">
	            <div class="card card-success-inverse wow fadeInRight animation-delay-3">
		            <div class="text-center card-body">
		                <span class="ms-icon ms-icon-circle ms-icon-white ms-icon-inverse ms-icon-xxlg "><i class="zmdi zmdi-cloud-outline"></i></span>
		                <h4 class="">A feature title</h4>
		                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		                <a href="javascript:void(0)" class="btn btn-white color-success btn-raised">Action here</a>
		            </div>
	            </div>
	        </div>
	        <div class="col-xl-3 col-lg-6 col-md-6">
	            <div class="card card-danger-inverse wow fadeInRight animation-delay-4">
		            <div class="text-center card-body">
		                <span class="ms-icon ms-icon-circle ms-icon-white ms-icon-inverse ms-icon-xxlg "><i class="zmdi zmdi-flower"></i></span>
		                <h4 class="">A feature title</h4>
		                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		                <a href="javascript:void(0)" class="btn btn-white color-danger btn-raised">Action here</a>
		            </div>
	            </div>
	        </div>
        </div>
    </div> <!-- container -->
    <div class="container mt-6">
        <div class="text-center mb-4">
          	<h2>Knows the <span class="text-normal">Material Style</span> and surprise yourself</h2>
        </div>
        <div class="row">
	        <div class="col-lg-6">
	            <h3 class="color-primary wow fadeInUp animation-delay-2">Description</h3>
	            <p class="wow fadeInUp animation-delay-3">Lorem ipsum dolor sit amet, <strong>consectetur adipisicing elit</strong>. Repellat cum laudantium quos tempora magnam voluptas sint perspiciatis nulla ipsa itaque atque quod incidunt maiores iusto, laborum, magni aliquam. Aut eligendi nesciunt nobis eum dolorum maxime corporis dicta, repudiandae eveniet ab laboriosam minima voluptate quaerat sequi modi suscipit cumque unde rerum.</p>
	            <p class="wow fadeInUp animation-delay-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis porro, magni obcaecati cupiditate nulla rem quae, eveniet corrupti reprehenderit maiores nobis doloribus expedita non quasi itaque. Incidunt, delectus quidem vitae laudantium, natus <a href="#">quibusdam odio eius eligendi</a> tenetur! Ea, repudiandae eveniet ab minima laboriosam minima voluptate quaerat sequi harum.</p>
	        </div>
	        <div class="col-lg-6">
	            <div class="ms-collapse" id="accordion2" role="tablist" aria-multiselectable="true">
		            <div class="mb-0 card card-primary wow fadeInUp animation-delay-2">
		                <div class="card-header" role="tab" id="headingOne2">
			                <h4 class="card-title">
			                    <a class="withripple" role="button" data-toggle="collapse" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
			                      <i class="fa fa-lightbulb-o"></i> Talent and creativity </a>
			                </h4>
		                </div>
		                <div id="collapseOne2" class="card-collapse collapse show" role="tabpanel" aria-labelledby="headingOne2" data-parent="#accordion2">
			                <div class="card-body">
			                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati molestiae id ipsum ipsa repudiandae. Voluptatum quos facilis sequi. Ullam optio eius deleniti dolore quasi doloribus ipsam.</p>
			                    <p>Dolores, corrupti, aliquam doloremque accusantium nemo sunt veniam est incidunt perferendis minima obcaecati ex aperiam voluptatibus blanditiis eum suscipit magnam dolorum in adipisci nihil.</p>
			                </div>
		                </div>
		            </div>
		            <div class="mb-0 card card-primary wow fadeInUp animation-delay-5">
		                <div class="card-header" role="tab" id="headingTwo2">
		                  <h4 class="card-title">
		                    <a class="collapsed withripple" role="button" data-toggle="collapse" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
		                      <i class="fa fa-desktop"></i> Design and code </a>
		                  </h4>
		                </div>
		                <div id="collapseTwo2" class="card-collapse collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordion2">
		                  <div class="card-body">
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit dignissimos inventore cupiditate expedita saepe enim nobis nostrum? Laborum, laudantium, maiores, cupiditate, perspiciatis at ad accusamus.</p>
		                    <p>Incidunt, harum itaque voluptatum asperiores recusandae explicabo maiores. Alias, quos, ex impedit at error id laborum fugit architecto qui beatae molestiae dolorum rem veritatis quia aliquam totam.</p>
		                  </div>
		                </div>
		            </div>
		            <div class="mb-0 card card-primary wow fadeInUp animation-delay-7">
		                <div class="card-header" role="tab" id="headingThree3">
			                <h4 class="card-title">
			                    <a class="collapsed withripple" role="button" data-toggle="collapse" href="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
			                    <i class="fa fa-user"></i> Quality and Support </a>
			                </h4>
		                </div>
		                <div id="collapseThree2" class="card-collapse collapse" role="tabpanel" aria-labelledby="headingThree2" data-parent="#accordion2">
			                <div class="card-body">
			                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, rerum unde doloribus accusamus pariatur non expedita quibusdam velit totam obcaecati. Consequatur, deserunt, asperiores quam nisi earum voluptates.</p>
			                    <p>Dolorum, aliquam, totam labore saepe error a eum culpa assumenda sint laudantium ipsa iure ullam et dicta nesciunt repellendus optio voluptatibus reprehenderit odit officia fugiat necessitatibus recusandae architecto.</p>
			                </div>
		                </div>
		            </div>
	            </div>
	        </div>
        </div>
    </div> <!-- container -->
    <div class="wrap ms-hero-bg-dark ms-hero-img-keyboard ms-bg-fixed mt-6">
        <div class="container index-1">
	        <div class="text-center color-white mb-4 mw-800 center-block">
	            <h1>Latest Works</h1>
	            <p class="lead color-medium">Discover our projects and the rigorous process of creation. Our principles are creativity, design, experience and <span class="color-white">knowledge</span>. We are backed by 20 years of research.</p>
	        </div>
	        <div class="row">
	            <div class="col-lg-4 col-md-6 mb-4">
		            <div class="ms-thumbnail-container wow fadeInUp">
		                <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
		                  	<img src="{{ asset('assets/img/demo/port9.jpg') }}" alt="" class="img-fluid">
			                <figcaption class="ms-thumbnail-caption text-center">
			                    <div class="ms-thumbnail-caption-content">
			                      	<h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
			                      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			                      	<a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
			                    </div>
			                </figcaption>
		                </figure>
		            </div>
	            </div>
	            <div class="col-lg-4 col-md-6 mb-4">
			        <div class="ms-thumbnail-container wow fadeInUp">
			            <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
			                <img src="{{ asset('assets/img/demo/port11.jpg') }}" alt="" class="img-fluid">
			                <figcaption class="ms-thumbnail-caption text-center">
			                    <div class="ms-thumbnail-caption-content">
			                      	<h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
			                      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			                      	<a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
			                    </div>
			                </figcaption>
			            </figure>
			        </div>
	            </div>
	            <div class="col-lg-4 col-md-6 mb-4">
	              <div class="ms-thumbnail-container wow fadeInUp">
	                <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
	                  <img src="assets/img/demo/port23.jpg" alt="" class="img-fluid">
	                  <figcaption class="ms-thumbnail-caption text-center">
	                    <div class="ms-thumbnail-caption-content">
	                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
	                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                      <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
	                    </div>
	                  </figcaption>
	                </figure>
	              </div>
	            </div>
	            <div class="col-lg-4 col-md-6 mb-4">
	              <div class="ms-thumbnail-container wow fadeInUp">
	                <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
	                  <img src="assets/img/demo/port7.jpg" alt="" class="img-fluid">
	                  <figcaption class="ms-thumbnail-caption text-center">
	                    <div class="ms-thumbnail-caption-content">
	                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
	                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                      <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
	                    </div>
	                  </figcaption>
	                </figure>
	              </div>
	            </div>
	            <div class="col-lg-4 col-md-6 mb-4">
	              <div class="ms-thumbnail-container wow fadeInUp">
	                <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
	                  <img src="assets/img/demo/port4.jpg" alt="" class="img-fluid">
	                  <figcaption class="ms-thumbnail-caption text-center">
	                    <div class="ms-thumbnail-caption-content">
	                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
	                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                      <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
	                    </div>
	                  </figcaption>
	                </figure>
	              </div>
	            </div>
	            <div class="col-lg-4 col-md-6 mb-4">
	              <div class="ms-thumbnail-container wow fadeInUp">
	                <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
	                  <img src="assets/img/demo/port2.jpg" alt="" class="img-fluid">
	                  <figcaption class="ms-thumbnail-caption text-center">
	                    <div class="ms-thumbnail-caption-content">
	                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
	                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                      <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
	                    </div>
	                  </figcaption>
	                </figure>
	              </div>
	            </div>
	        </div>
        </div>
    </div>
    <div class="container mt-6">
        <div class="text-center color-white mb-4 text-center">
          	<h1 class="color-primary">Our Team</h1>
          	<p class="lead lead-lg color-danger text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">These are <span class="text-normal">the professionals</span> who, every day, make progress <span class="text-normal">the projects of our clients</span>.</p>
        </div>
        <div class="row d-flex justify-content-center">
	        <div class="col-lg-4 col-md-6">
	            <div class="card card-royal wow zoomInUp animation-delay-7">
	              <div class="ms-hero-bg-royal ms-hero-img-city">
	                <img src="assets/img/demo/avatar4.jpg" alt="..." class="img-avatar-circle">
	              </div>
	              <div class="card-body pt-6 text-center">
	                <h3 class="color-royal">Sophie Marks</h3>
	                <p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
	              </div>
	            </div>
	        </div>
	        <div class="col-lg-4 col-md-6">
	            <div class="card card-success wow zoomInUp animation-delay-7">
	              <div class="ms-hero-bg-success ms-hero-img-city">
	                <img src="assets/img/demo/avatar5.jpg" alt="..." class="img-avatar-circle">
	              </div>
	              <div class="card-body pt-6 text-center">
	                <h3 class="color-success">Cris Polner</h3>
	                <p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
	              </div>
	            </div>
	        </div>
	        <div class="col-lg-4 col-md-6">
	            <div class="card card-primary wow zoomInUp animation-delay-7">
	              <div class="ms-hero-bg-primary ms-hero-img-city">
	                <img src="assets/img/demo/avatar6.jpg" alt="..." class="img-avatar-circle">
	              </div>
	              <div class="card-body pt-6 text-center">
	                <h3 class="color-primary">Julia Robert</h3>
	                <p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
	                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
	              </div>
	            </div>
	        </div>
        </div>
    </div> <!-- container -->
    <aside class="ms-footbar">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 ms-footer-col">
              <div class="ms-footbar-block">
                <h3 class="ms-footbar-title">Sitemap</h3>
                <ul class="list-unstyled ms-icon-list three_cols">
                  <li><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                  <li><a href="page-blog.html"><i class="zmdi zmdi-edit"></i> Blog</a></li>
                  <li><a href="page-blog.html"><i class="zmdi zmdi-image-o"></i> Portafolio</a></li>
                  <li><a href="portfolio-filters_sidebar.html"><i class="zmdi zmdi-case"></i> Works</a></li>
                  <li><a href="page-timeline_left2.html"><i class="zmdi zmdi-time"></i> Timeline</a></li>
                  <li><a href="page-pricing.html"><i class="zmdi zmdi-money"></i> Pricing</a></li>
                  <li><a href="page-about.html"><i class="zmdi zmdi-favorite-outline"></i> About Us</a></li>
                  <li><a href="page-team2.html"><i class="zmdi zmdi-accounts"></i> Our Team</a></li>
                  <li><a href="page-services.html"><i class="zmdi zmdi-face"></i> Services</a></li>
                  <li><a href="page-faq2.html"><i class="zmdi zmdi-help"></i> FAQ</a></li>
                  <li><a href="page-login2.html"><i class="zmdi zmdi-lock"></i> Login</a></li>
                  <li><a href="page-contact.html"><i class="zmdi zmdi-email"></i> Contact</a></li>
                </ul>
              </div>
              <div class="ms-footbar-block">
                <h3 class="ms-footbar-title">Subscribe</h3>
                <p class="">Lorem ipsum Amet fugiat elit nisi anim mollit minim labore ut esse Duis ullamco ad dolor veniam velit.</p>
                <form>
                  <div class="form-group label-floating mt-2 mb-1">
                    <div class="input-group ms-input-subscribe">
                      <label class="control-label" for="ms-subscribe"><i class="zmdi zmdi-email"></i> Email Adress</label>
                      <input type="email" id="ms-subscribe" class="form-control">
                    </div>
                  </div>
                  <button class="ms-subscribre-btn" type="button">Subscribe</button>
                </form>
              </div>
            </div>
            <div class="col-lg-5 col-md-7 ms-footer-col ms-footer-alt-color">
              <div class="ms-footbar-block">
                <h3 class="ms-footbar-title text-center mb-2">Last Articles</h3>
                <div class="ms-footer-media">
                  <div class="media">
                    <div class="media-left media-middle">
                      <a href="javascript:void(0)">
                        <img class="media-object media-object-circle" src="assets/img/demo/p75.jpg" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="javascript:void(0)">Lorem ipsum dolor sit expedita cumque amet consectetur adipisicing repellat</a></h4>
                      <div class="media-footer">
                        <span><i class="zmdi zmdi-time color-info-light"></i> August 18, 2016</span>
                        <span><i class="zmdi zmdi-folder-outline color-warning-light"></i> <a href="javascript:void(0)">Design</a></span>
                      </div>
                    </div>
                  </div>
                  <div class="media">
                    <div class="media-left media-middle">
                      <a href="javascript:void(0)">
                        <img class="media-object media-object-circle" src="assets/img/demo/p75.jpg" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="javascript:void(0)">Labore ut esse Duis consectetur expedita cumque ullamco ad dolor veniam velit</a></h4>
                      <div class="media-footer">
                        <span><i class="zmdi zmdi-time color-info-light"></i> August 18, 2016</span>
                        <span><i class="zmdi zmdi-folder-outline color-warning-light"></i> <a href="javascript:void(0)">News</a></span>
                      </div>
                    </div>
                  </div>
                  <div class="media">
                    <div class="media-left media-middle">
                      <a href="javascript:void(0)">
                        <img class="media-object media-object-circle" src="assets/img/demo/p75.jpg" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="javascript:void(0)">voluptates deserunt ducimus expedita cumque quaerat molestiae labore</a></h4>
                      <div class="media-footer">
                        <span><i class="zmdi zmdi-time color-info-light"></i> August 18, 2016</span>
                        <span><i class="zmdi zmdi-folder-outline color-warning-light"></i> <a href="javascript:void(0)">Productivity</a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-5 ms-footer-col ms-footer-text-right">
              <div class="ms-footbar-block">
                <div class="ms-footbar-title">
                  <span class="ms-logo ms-logo-white ms-logo-sm mr-1">M</span>
                  <h3 class="no-m ms-site-title">Material<span>Style</span></h3>
                </div>
                <address class="no-mb">
                  <p><i class="color-danger-light zmdi zmdi-pin mr-1"></i> 795 Folsom Ave, Suite 600</p>
                  <p><i class="color-warning-light zmdi zmdi-map mr-1"></i> San Francisco, CA 94107</p>
                  <p><i class="color-info-light zmdi zmdi-email mr-1"></i> <a href="mailto:joe@example.com">example@domain.com</a></p>
                  <p><i class="color-royal-light zmdi zmdi-phone mr-1"></i>+34 123 456 7890 </p>
                  <p><i class="color-success-light fa fa-fax mr-1"></i>+34 123 456 7890 </p>
                </address>
              </div>
              <div class="ms-footbar-block">
                <h3 class="ms-footbar-title">Social Media</h3>
                <div class="ms-footbar-social">
                  <a href="javascript:void(0)" class="btn-circle btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
                  <a href="javascript:void(0)" class="btn-circle btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
                  <a href="javascript:void(0)" class="btn-circle btn-youtube"><i class="zmdi zmdi-youtube-play"></i></a><br>
                  <a href="javascript:void(0)" class="btn-circle btn-google"><i class="zmdi zmdi-google"></i></a>
                  <a href="javascript:void(0)" class="btn-circle btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
                  <a href="javascript:void(0)" class="btn-circle btn-github"><i class="zmdi zmdi-github"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </aside>
    <footer class="ms-footer">
    	<div class="container"> <p>Copyright &copy; Material Style 2017</p> </div>
    </footer>
    <div class="btn-back-top">
        <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised "><i class="zmdi zmdi-long-arrow-up"></i></a>
    </div>
    <!-- ms-site-container -->
    <div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
	    <div class="sb-slidebar-container">
	        <header class="ms-slidebar-header">
		        <div class="ms-slidebar-login">
		            <a href="javascript:void(0)" class="withripple"><i class="zmdi zmdi-account"></i> Login</a>
		            <a href="javascript:void(0)" class="withripple"><i class="zmdi zmdi-account-add"></i> Register</a>
		        </div>
		        <div class="ms-slidebar-title">
		            <form class="search-form">
		              <input id="search-box-slidebar" type="text" class="search-input" placeholder="Search..." name="q" />
		              <label for="search-box-slidebar"><i class="zmdi zmdi-search"></i></label>
		            </form>
		            <div class="ms-slidebar-t">
		              <span class="ms-logo ms-logo-sm">M</span>
		              <h3>Material<span>Style</span></h3>
		            </div>
		        </div>
	        </header>
	        <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
	          <li class="card" role="tab" id="sch1">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc1" aria-expanded="false" aria-controls="sc1">
	              <i class="zmdi zmdi-home"></i> Home </a>
	            <ul id="sc1" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch1" data-parent="#slidebar-menu">
	              <li><a href="index.html">Default Home</a></li>
	              <li><a href="home-generic-2.html">Home Black Slider</a></li>
	              <li><a href="home-landing.html">Home Landing Intro</a></li>
	              <li><a href="home-landing3.html">Home Landing Video</a></li>
	              <li><a href="home-shop.html">Home Shop 1</a></li>
	            </ul>
	          </li>
	          <li class="card" role="tab" id="sch2">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc2" aria-expanded="false" aria-controls="sc2">
	              <i class="zmdi zmdi-desktop-mac"></i> Pages </a>
	            <ul id="sc2" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch2" data-parent="#slidebar-menu">
	              <li><a href="page-about.html">About US</a></li>
	              <li><a href="page-team.html">Our Team</a></li>
	              <li><a href="page-product.html">Products</a></li>
	              <li><a href="page-services.html">Services</a></li>
	              <li><a href="page-faq.html">FAQ</a></li>
	              <li><a href="page-timeline_left.html">Timeline</a></li>
	              <li><a href="page-contact.html">Contact Option</a></li>
	              <li><a href="page-login.html">Login</a></li>
	              <li><a href="page-pricing.html">Pricing</a></li>
	              <li><a href="page-coming.html">Coming Soon</a></li>
	            </ul>
	          </li>
	          <li class="card" role="tab" id="sch4">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc4" aria-expanded="false" aria-controls="sc4">
	              <i class="zmdi zmdi-edit"></i> Blog </a>
	            <ul id="sc4" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch4" data-parent="#slidebar-menu">
	              <li><a href="blog-sidebar.html">Blog Sidebar 1</a></li>
	              <li><a href="blog-sidebar2.html">Blog Sidebar 2</a></li>
	              <li><a href="blog-masonry.html">Blog Masonry 1</a></li>
	              <li><a href="blog-masonry2.html">Blog Masonry 2</a></li>
	              <li><a href="blog-full.html">Blog Full Page 1</a></li>
	              <li><a href="blog-full2.html">Blog Full Page 2</a></li>
	              <li><a href="blog-post.html">Blog Post 1</a></li>
	              <li><a href="blog-post2.html">Blog Post 2</a></li>
	            </ul>
	          </li>
	          <li class="card" role="tab" id="sch5">
	            <a class="collapsed" role="button" data-toggle="collapse" href="#sc5" aria-expanded="false" aria-controls="sc5">
	              <i class="zmdi zmdi-shopping-basket"></i> E-Commerce </a>
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
	          <h4 class="ms-slidebar-block-title">Social Links</h4>
	          <div class="ms-slidebar-social">
	            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-facebook"><i class="zmdi zmdi-facebook"></i> <span class="badge-pill badge-pill-pink">12</span>
	              <div class="ripple-container"></div>
	            </a>
	            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-twitter"><i class="zmdi zmdi-twitter"></i> <span class="badge-pill badge-pill-pink">4</span>
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
    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/configurator.min.js') }}"></script>
    <script>
	    (function(i, s, o, g, r, a, m)
		    {
		        i['GoogleAnalyticsObject'] = r;
		        i[r] = i[r] || function()
		        {
		          (i[r].q = i[r].q || []).push(arguments)
		        }, i[r].l = 1 * new Date();
		        a = s.createElement(o),
		          m = s.getElementsByTagName(o)[0];
		        a.async = 1;
		        a.src = g;
		        m.parentNode.insertBefore(a, m)
		    }
	    )(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
	    ga('create', 'UA-90917746-2', 'auto');
	    ga('send', 'pageview');
    </script>
</body>
</html>