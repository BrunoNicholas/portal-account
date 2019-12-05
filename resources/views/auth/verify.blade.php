@extends('layouts.site')
@section('title') Verify Account @endsection

@section('content')
<header class="wrap wrap-mountain mt--40" style="min-height: 470px;">
    <div class="container text-primary">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <img src="{{ Auth::user()->profile_image ? asset('files/profile/images/' . Auth::user()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;">
                        <span style="visibility: hidden;">i</span>
                        {{ __('Verify Your Account First') }}
                    </div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        {{ __('Hey ') . Auth::user()->name . __(', ') . __(' (') . Auth::user()->email . __(')') }} <br>
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <br>
                        <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </div>
                    <div class="card-footer text-center">
                        <span class="txt1 p-b-9"> Not ready to proceed? </span>

                        <a href="javascrit:void(0)" class="txt3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout Now </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
