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

    <meta name="description" content="{{ config('app.description') }}">
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
                                    <label><input type="radio" name="customWidth" id="fullWidth" value="full" checked=""> Full Width </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label><input type="radio" name="customWidth" id="boxedWidth" value="boxed"> Boxed Mode </label>
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
  		                  <span class="ms-logo ms-logo-white ms-logo-sm mr-1">SP</span>
  		                  <h3 class="no-m ms-site-title"> Salon <span> Portal </span></h3>
  		              </div>
  		              <div class="modal-header-tabs">
    		                <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
    		                    <li class="nav-item" role="presentation"><a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab" class="nav-link active withoutripple"><i class="zmdi zmdi-account"></i> Login </a></li>
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
    {{-- header and navigation --}}
    @include('layouts.includes.header')
    {{-- /end of header and navigation --}}
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
                    <h3 class="color-warning no-mt">Get your hair style.</h3>
                    <p>The 256-Salon Portal enables you to find your best trending hair style and the best rated salon or spa.</p>
                  </div>
                </div>
              </div>
              <div class="card card-body card-success card-dark-inverse animated fadeInLeft animation-delay-7">
                <div class="media">
                  <div class="media-left d-none d-sm-block media-middle pr-4">
                    <i class="zmdi zmdi-desktop-mac zmdi-hc-5x color-success"></i>
                  </div>
                  <div class="media-body no-mt">
                    <h3 class="color-success no-mt">Your office gone public.</h3>
                    <p>Open up your salon, spa or shop and have clents locate you from different areas with instant bookings and notifications.</p>
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
    {{-- <div class="container mt-6">
        <div class="text-center mb-4">
          	<h2>Knows the <span class="text-normal">Salon Portal </span> and knock yourself out.</h2>
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
    </div> <!-- container --> --}}
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
		                  	<img src="{{ asset('assets/img/demo/port21.jpg') }}" alt="" class="img-fluid">
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
			                <img src="{{ asset('assets/img/demo/port10.jpg') }}" alt="" class="img-fluid">
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
	                  <img src="{{ asset('assets/img/demo/portG1.jpg') }}" alt="" class="img-fluid">
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
	                  <img src="{{ asset('assets/img/demo/port20.jpg') }}" alt="" class="img-fluid">
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
			              	<img src="{{ asset('assets/img/demo/port18.jpg') }}" alt="" class="img-fluid">
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
	                  <img src="{{ asset('assets/img/demo/port2.jpg') }}" alt="" class="img-fluid">
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
    	                <img src="{{ asset('assets/img/demo/avatar4.jpg') }}" alt="..." class="img-avatar-circle">
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
    {{-- footer --}}
    @include('layouts.includes.footer')
    {{-- /end footer --}}
    <div class="btn-back-top">
        <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
        	<i class="zmdi zmdi-long-arrow-up"></i>
        </a>
    </div>
    {{-- the side bar --}}
    @include('layouts.includes.side')
    {{-- /end side bar --}}
    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/configurator.min.js') }}"></script>
    @yield('scripts')
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