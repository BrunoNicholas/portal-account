@extends('layouts.site')
@section('title', 'Restricted Access')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card animated fadeInUp animation-delay-7 color-primary withripple">
	            <div class="card-body-big color-dark">
	                <div class="text-center">
	                  	<h1 class="color-primary">403</h1>
	                  	<h2>Restricted Resource</h2>
	                  	<p class="lead lead-sm">You do not have sufficient rights to access this resource<br>For assistance, please contact the Administrators.</p>
	                  	@if(URL::previous() != Request::fullUrl())
				            <a href="{{ URL::previous() }}" class="btn btn-info btn-raised"><i class="fa-angle-double-left fa text-white" style="font-size: 15px;"></i> Go Back </a>
				        @endif
	                  <a href="{{ route('home') }}" class="btn btn-primary btn-raised"><i class="zmdi zmdi-home" style="padding: 0px;"></i> Go Home</a>
	                </div>
	            </div>
            </div>
            <div class="card animated fadeInUp animation-delay-9 color-primary withripple">
              <div class="card-body-big color-dark">
                <h2 class="color-primary">Search</h2>
                <p class="lead">Search for different salons, shops, styles and more to find what you want.</p>
                <div class="form-group label-floating">
                  <label class="control-label" for="addon2">Search in {{ config('app.name') }}...</label>
                  <input type="text" id="addon2" class="form-control">
                </div>
                <a href="" class="btn btn-primary btn-raised btn-block"><i class="zmdi zmdi-search"></i> Search</a>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- container -->
@endsection