@extends('layouts.site')
@section('title', 'Add Salon')
@section('styles') @endsection
@section('content')
<div class="ms-hero-page-override ms-hero-img-team ms-hero-bg-primary">
    <div class="container">
        <div class="text-center">
            <div class="row">
            	<div class="d-flex no-block align-items-center col-md-4">
					<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;"><b class="text-white">Add Salon / Spa</b></span>
				</div>
		        <div class="d-flex no-block justify-content-end col-md-8">
		            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
		                <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home text-white"></i> <span class="text-white"> Home </span></a></li>
        					<li class="breadcrumb-item"><a href="{{ route('salons.index','all') }}"> <i class="fa fa-address-book-o text-white"></i> <span class="text-white"> Salons &amp; Spa's </span></a></li>
        					<li class="breadcrumb-item active"> <i class="fa fa-plus text-white"></i> <span class="text-white"> New </span></li>
		                </ol>
		            </nav>
		        </div>
		        <p class="lead lead-lg color-light text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">Create your salon or spa account today!</p>
	        </div>
	    </div>
	</div>
</div>
<div class="container">
    <div class="card card-hero animated fadeInUp animation-delay-7">
        <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('salons.store','all') }}" name="cal">

            	@csrf
              	@foreach ($errors->all() as $error)
  	            	<p class="alert alert-danger">{{ $error }}</p>
  	            @endforeach

  	            @if (session('success'))
  	            	<div class="alert alert-success">
  	            		{{ session('success') }}
  	            	</div>
  	            @endif
	                    
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	            <fieldset class="container">
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label">Salon Name</label>
				                <div class="col-lg-8">
				                    <input type="text" name="salon_name" class="form-control" id="inputName" placeholder="Valid Name">
				                </div>
	                		</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label">Major Category</label>
				                <div class="col-lg-8">
				                    <select class="form-control" id="inputName" name="categories_id" required>
				                    	@foreach($cats as $category)
				                    		<option value="{{ $category->id }}" title="{{ $category->description }}">{{ $category->display_name }}</option>
				                    	@endforeach
				                    </select>
				                </div>
	                		</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label">Email</label>
				                <div class="col-lg-8">
				                    <input type="email" class="form-control" name="salon_email" value="{{ Auth::user()->email }}" id="inputEmail" placeholder="Email">
				                </div>
				            </div>
				        </div>
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
	                			<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label">Owner Account</label>
				                <div class="col-lg-8">
				                    @if(Auth::user()->hasRole('company-admin'))
					                	<input type="hidden" name="company_id" value="{{ App\Models\Company::where('user_id',Auth::user()->id)->first()->id }}">
					                	<input type="text" class="form-control" value="{{ App\Models\Company::where('user_id',Auth::user()->id)->first()->company_name }} ({{ App\Models\Company::where('user_id',Auth::user()->id)->first()->company_email }})" disabled>
					               	@else
					                    <select class="form-control" id="inputName" name="company_id">
					                    	<option value="">(Leave empty if independent)</option>
					                    	@foreach($companies as $company)
					                    		<option value="{{ $company->id }}" title="{{ $company->description }}">{{ $company->company_name }}</option>
					                    	@endforeach
					                    </select>
					                @endif
				                </div>
	                		</div>
	                	</div>

	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label"> Telephone </label>
				                <div class="col-lg-8">
				                    <input type="text" class="form-control" id="inputSubject" placeholder="Active Telephone Number" name="salon_telephone">
				                </div>
				            </div>
				        </div>
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label"> Website </label>
				                <div class="col-lg-8">
				                    <input type="url" class="form-control" id="inputSubject" name="salon_website" placeholder="The website link">
				                </div>
				            </div>
				        </div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label">Accept Bookings</label>
				                <div class="col-lg-8">
				                	<div class="form-check checkbox">
                                        <label class="form-checkbox-label">
				                    		<input type="checkbox" id="inputSubject" value="1" name="accept_bookings"> Check for Yes
				                    	</label>
				                    </div>
				                </div>
				            </div>
				        </div>
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label">Accept Orders</label>
				                <div class="col-lg-8">
				                    <div class="form-check checkbox">
                                        <label class="form-checkbox-label">
				                    		<input type="checkbox" value="1" id="inputSubject" name="accept_orders"> Check for Yes
				                    	</label>
				                    </div>
				                </div>
				            </div>
				        </div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputLoca" autocomplete="false" class="col-lg-4 control-label"> Location</label>
				                <div class="col-lg-8">
				                    <input type="text" class="form-control" id="inputLoca" placeholder="City, Street, P.O.Box" name="salon_location">
				                </div>
				            </div>
				        </div>
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="gpsAddr" autocomplete="false" id="demo" class="col-lg-3 control-label">GPS Cordinates</label>
			                  	<div class="col-lg-2 mt-1"><button type="button" class="btn btn-raised btn-xs btn-primary" onclick="getLocation()">Get GPS</button></div>
				                <div class="col-lg-5">
				                    <input type="text" class="form-control" id="gpsAddr" name="salon_gps" placeholder="1.024 32.554">
				                </div>
				                <div class="col-lg-2 mt-1">
				                	<button type="button" class="btn btn-raised btn-xs btn-success" onclick="cal.salon_gps.value=document.getElementById('demo').innerHTML">Use GPS</button>
				                </div>
				            </div>
				        </div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
				                <label for="textBio" class="col-lg-4 control-label">More Categories (Seperate with commas)</label>
				                <div class="col-lg-8">
				                    <input type="text" class="form-control" id="inputSubject" placeholder="Hair,Nails & Polish,Face,.." name="salon_category">
				                </div>
				            </div>
		                </div>
		                <div class="col-md-6">
		                	<div class="form-group row mt-0">
				                <label for="descde" class="col-lg-4 control-label">Description</label>
				                <div class="col-lg-8">
				                    <textarea class="form-control" rows="3" name="description" id="descde" placeholder="Salon description details ..."></textarea>
				                </div>
				            </div>
			            </div>
			        </div>
	                <div class="form-group row justify-content-end mt-0">
		                <div class="col-lg-10 offset-lg-2">
		                    <button type="submit" class="btn btn-raised btn-primary">Create Salon</button>
		                    <a href="{{ route('home') }}" class="btn btn-danger">Cancel To Home</a>
		                </div>
	                </div>
	            </fieldset>
	        </form>
	    </div>
	</div>
</div>
@endsection
@section('scripts')
<script>
        var x = document.getElementById("demo");

        function getLocation() {
          if (navigator.geolocation) { navigator.geolocation.getCurrentPosition(showPosition); } 
          else { x.innerHTML = "Geolocation is not supported by this browser."; }
        }

        function showPosition(position) {
          x.innerHTML = position.coords.latitude + ' ' + position.coords.longitude;
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDm092t3Kz-SgMCDPib5_cD2GNBnHYnnus"></script>
@endsection