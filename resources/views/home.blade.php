@extends('layouts.site')
@section('title', 'Home')
@section('styles') @endsection
@section('navigator')
    <div class="ms-hero-page ms-hero-img-city2 ms-hero-bg-info mb-2" style="padding: 0px;">
        <div class="text-center color-white mt-0 mb-1 index-1" style="padding-top: 5px;">
            <h2><i class="fa fa-home text-white"></i> Home <small> - My Control Panel</small></h2>
            <p class="lead lead-lg" style="text-transform: capitalize;">
                <ol class="breadcrumb d-flex justify-content-center" style="height: 40px;">
                    <li class="breadcrumb-item active text-white">
                        <img src="{{ Auth::user()->profile_image ? asset('files/profile/images/' . Auth::user()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 35px; border-radius: 50%;">
                        {{ Auth::user()->name }} - {{ Auth::user()->role }}
                    </li>
                </ol>
            </p>
            <br>
        </div>
    </div>
@endsection
@section('content')
    <div class="row mt-0 pl-2 pr-2">
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header text-center"> My Account </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header text-center"> My Stats </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts') @endsection


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}