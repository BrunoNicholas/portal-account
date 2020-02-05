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
    <title>@yield('title') - {{ config('app.name', 'Salon Portal') }}</title>

    <meta name="description" content="{{ config('app.description') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png?v=3') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/css/preload.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    @guest
    <link rel="stylesheet" href="{{ asset('assets/css/style.teal-800.min.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/style.pink-800.min.css') }}">
    @endguest
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/width-boxed.min.css') }}" id="ms-boxed" disabled>
    <style type="text/css">
        #example23_paginate {
            text-align: right;
            padding: 3px;
        }

        #example23_paginate > .paginate_button {
            /* for previos and next */
            border: thin solid #00695c;
            border-radius: 3px;
            background-color:#00695c;
            color: #fff;
            padding: 5px 10px;
            margin-left: 1px;
            margin-right: 1px;
        }

        #example23_paginate > span > a {
            /* for previos and next */
            border: thin solid #00695c;
            border-radius: 3px;
            color: #00695c;
            padding: 5px 10px;
            margin-left: 1px;
            margin-right: 1px;
        }

        #example23_paginate > span > .current {
            /* for previos and next */
            border: thin solid #00695c;
            border-radius: 3px;
            background-color:#00695c;
            color: #fff;
            padding: 5px 10px;
            margin-left: 2px;
            margin-right: 2px;
        }

        @media only screen and (min-width: 900px) {
            .home-sections {
                margin-right: 10%;
                margin-left: 10%;
            }
        }

        @media only screen and (max-width: 900px) {
            .home-sections {
                margin-right: 0px;
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 600px) {
            .justify-content-end > nav { display: none; }
            .back-button { display: none; }
            .home-sections {
                margin-right: 1px;
                margin-left: 1px;
            }
        }

        @media only screen and (max-width: 900px) {
            .backmenu-button { display: none; }
        }
    </style>
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <span id="topmessage"></span>
    @permission('can_view_right_menu')
    <a href="javascript:void(0)" class="ms-conf-btn ms-configurator-btn btn-circle btn-circle-raised btn-circle-primary animated rubberBand" style=""><i class="fa fa-gears"></i></a>
    @include('layouts.includes.rightmessage')
    @endpermission
    @include('layouts.includes.notifications')
    {{-- right menu --}}
    @include('layouts.includes.right_menu')
    {{-- /end of right menu --}}
    <div id="ms-preload" class="ms-preload">
        <div id="status">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <div class="ms-site-container">
      	<!-- Auth Modal -->
      	<div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog animated zoomIn animated-3x" role="document">
                <div class="modal-content">
                    <div class="modal-header d-block shadow-2dp no-pb">
                        <button type="button" class="close d-inline pull-right mt-2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                        <div class="modal-title text-center">
                            <span class="ms-logo ms-logo-white ms-logo-sm mr-1">SP</span>
                            <h3 class="no-m ms-site-title"> {{ explode(' ', trim(config('app.name')))[0] }} <span> {{ explode(' ', trim(config('app.name')))[1] }} </span></h3>
                        </div>
                        <div class="modal-header-tabs">
                            <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
                                <li class="nav-item" role="presentation"><a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab" class="nav-link active withoutripple"><i class="zmdi zmdi-account"></i> Login </a></li>
                                <li class="nav-item" role="presentation"><a href="#ms-register-tab" aria-controls="ms-register-tab" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-account-add"></i> Register</a></li>
                                <li class="nav-item" role="presentation"><a href="#ms-recovery-tab" aria-controls="ms-recovery-tab" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-key"></i> Recovery </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="ms-login-tab">
                            {{-- auth: login form --}}
                                <form autocomplete="off" method="POST" action="{{ route('login') }}"> 
                                    @csrf
                                    <fieldset>
                                        <div class="form-group label-floating">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                                <label class="control-label" for="ms-form-user">{{ __('E-Mail Address') }}</label>
                                                <input type="email" id="ms-form-user" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="padding-left: 10px;">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group label-floating">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                                <label class="control-label" for="ms-form-pass">{{ __('Password') }}</label>
                                                <input type="password" id="ms-form-pass" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="padding-left: 10px;">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group no-mt">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }} </label>
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
                            {{-- /end of login --}}
                            {{-- auth: register form --}}
                            <div role="tabpanel" class="tab-pane fade" id="ms-register-tab">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group label-floating">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                                <label class="control-label" for="ms-form-user-r">{{ __('Full Name') }}</label>
                                                <input type="text" id="ms-form-user-r" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group label-floating">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                                <label class="control-label" for="ms-form-email-r">{{ __('E-Mail Address') }}</label>
                                                <input type="email" id="ms-form-email-r" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group label-floating">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                                <label class="control-label" for="ms-form-pass-r">{{ __('Password') }}</label>
                                                <input type="password" id="ms-form-pass-r" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group label-floating">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                                <label class="control-label" for="ms-form-pass-rn">{{ __('Confirm Password') }}</label>
                                                <input type="password" id="ms-form-pass-rn" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <button class="btn btn-raised btn-block btn-primary">Register &amp; Continue</button>
                                    </fieldset>
                                </form>
                            </div>
                            {{-- /end of registration --}}
                            {{-- auth: reset password form --}}
                            <div role="tabpanel" class="tab-pane fade" id="ms-recovery-tab">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group label-floating">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                                <label class="control-label" for="ms-form-email-re">{{ __('E-Mail Address') }}</label>
                                                <input type="email" id="ms-form-email-re" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-raised btn-block btn-primary">{{ __('Send Password Reset Link') }}</button>
                                    </fieldset>
                                </form>
                            </div>
                            {{-- /end of reset password --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
  	</div>
    {{-- header and navigation --}}
    @include('layouts.includes.header')
    {{-- /end of header and navigation --}}
    @yield('navigator')
    @yield('content')
    {{-- footer --}}
    @yield('footer')
    <footer class="ms-footer">
        <div class="container"><p>Copyright &copy; {{ date('Y') }} <b>{{ config('app.name') }}</b></p></div>
    </footer>
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