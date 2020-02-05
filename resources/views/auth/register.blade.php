@extends('layouts.site')
@section('title') Register @endsection

@section('content')
<header class="wrap wrap-mountain mt--40" style="min-height: 700px;">
    <div class="container text-primary">
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('assets/img/favicon.png') }}" style="max-width: 20px; border-radius: 50%;">
                        {{ __('Register') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row mt-0">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Names') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-0">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-0">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mt-0">
                                <div class="col-md-8 offset-md-2">
                                    <div class="form-check checkbox">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="" required>
                                            Agree with our <a href="javascript:void(0)">user policy</a> and <a href="javascript:void(0)">terms &amp; conditions</a>.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row text-center mt-0">
                                <div class="col-md-4 offset-md-2">
                                    <button type="submit" class="btn btn-primary btn-raised">
                                        <i class="fa-check fa"></i> {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-info text-right" href="{{ route('login') }}">
                                        <i class="fa-unlock fa"></i> {{ __('Login') }}
                                    </a>
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
