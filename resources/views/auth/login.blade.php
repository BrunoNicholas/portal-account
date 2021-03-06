@extends('layouts.site')
@section('title') Login @endsection
@section('styles')  @endsection
@section('content')
<header class="wrap wrap-mountain mt--40" style="min-height: 470px;">
    <div class="container text-primary">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <img src="{{ asset('assets/img/favicon.png') }}" style="max-width: 20px; border-radius: 50%;">
                        {{ __('Welcome Back - Login To ') . config('app.name') }} <br>

                        <a href="javascript:void(0)" class="btn btn-xs btn-circle btn-raised btn-facebook">
                            <i class="zmdi zmdi-facebook" style="font-size: 25px;"></i> {{-- <span class="badge-pill badge-pill-pink">12</span> --}}
                            {{-- <div class="ripple-container"></div> --}}
                        </a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-circle btn-raised btn-twitter">
                            <i class="zmdi zmdi-twitter" style="font-size: 25px;"></i> {{-- <span class="badge-pill badge-pill-pink">4</span> --}}
                            {{-- <div class="ripple-container"></div> --}}
                        </a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-circle btn-raised btn-google">
                            <i class="zmdi zmdi-google" style="font-size: 25px;"></i>
                            {{-- <div class="ripple-container"></div> --}}
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row mt-0">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-0">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check checkbox">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span style="visibility: hidden;">i</span>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row text-center mb-0">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-raised text-left">
                                        <i class="fa-check fa"></i> {{ __('Login To Proceed') }}
                                    </button>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-secondary text-right" href="{{ route('password.request') }}">
                                                    <i class="fa-warning fa"></i> {{ __('Forgot Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-info text-right" href="{{ route('register') }}">
                                                <i class="fa-user-plus fa"></i> {{ __('Register') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
