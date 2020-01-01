@extends('layouts.site')
@section('title', 'New Multi Account')
@section('styles') @endsection
@section('content')
<div class="ms-hero-page-override ms-hero-img-team ms-hero-bg-primary">
    <div class="container">
        <div class="text-center">
            <div class="row">
				<div class="d-flex no-block align-items-center col-md-4">
					<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;"><b class="text-white">Add Account</b></span>
				</div>
		        <div class="d-flex no-block justify-content-end col-md-8">
		            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
		                <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('userhome') }}"><i class="fa fa-home text-white"></i><span class="text-white">Home</span></a></li>
					    	<li class="breadcrumb-item"><a href="{{ route('companies.index','all') }}"><i class="fa fa-tree text-white"></i> <span class="text-white">Multi Accounts</span></a></li>
					        <li class="breadcrumb-item active"><a href="javascript:void(0)"><i class="fa fa-plus text-white"></i> <span class="text-white">Add Account</span></a></li>
		                </ol>
		            </nav>
		        </div>
	    	</div>
            <p class="lead lead-lg color-light text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">Create a multi account to manage more than one shop, salon or spa!</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="card card-hero animated fadeInUp animation-delay-7">
        <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('companies.store','all') }}" name="cal">
            	@csrf
              	@foreach ($errors->all() as $error)
  	            	<p class="alert alert-danger">{{ $error }}</p>
  	            @endforeach
	                    
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              	<fieldset class="container">
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label">Account Name</label>
				                <div class="col-lg-8">
				                    <input type="text" name="company_name" class="form-control" id="inputName" placeholder="Valid Name">
				                </div>
	                		</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label">Category</label>
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
			                  	<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label"> Email </label>
				                <div class="col-lg-8">
				                    <input type="email" class="form-control" name="company_email" value="{{ Auth::user()->email }}" id="inputEmail" placeholder="Email">
				                </div>
				            </div>
				        </div>
	                	<div class="col-md-6">
	                		<div class="row" style="padding: 10px;">
	                			<label for="file-item" autocomplete="false" class="col-lg-4 control-label"> Logo </label>
				                <div class="col-lg-8">
				                	<input type="file" class="" id="file-item" name="company_logo" accept=".jpg, .png, .jpeg">
				                </div>
	                		</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label"> Telephone </label>
				                <div class="col-lg-8">
				                    <input type="text" class="form-control" id="inputSubject" placeholder="Active Telephone Number" name="company_telephone">
				                </div>
				            </div>
				        </div>
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputEmail" autocomplete="false" class="col-lg-4 control-label"> Website (If Any!)</label>
				                <div class="col-lg-8">
				                    <input type="url" class="form-control" id="inputSubject" name="company_website" placeholder="Copy and paste the full website link here">
				                </div>
				            </div>
				        </div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="inputLoca" autocomplete="false" class="col-lg-4 control-label">Headquaters Location</label>
				                <div class="col-lg-8">
				                    <input type="text" class="form-control" id="inputLoca" placeholder="City, Street, P.O.Box" name="company_location">
				                </div>
				            </div>
				        </div>
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
			                  	<label for="gpsAddr" autocomplete="false" id="demo" class="col-lg-3 control-label">Headquaters Map Cordinates</label>
			                  	<div class="col-lg-2 mt-1"><button type="button" class="btn btn-raised btn-xs btn-primary" onclick="getLocation()">Get GPS</button></div>
				                <div class="col-lg-5">
				                    <input type="text" class="form-control" id="gpsAddr" name="company_gps" placeholder="1.024 32.554">
				                </div>
				                <div class="col-lg-2 mt-1">
				                	<button type="button" class="btn btn-raised btn-xs btn-success" onclick="cal.company_gps.value=document.getElementById('demo').innerHTML">Use GPS</button>
				                </div>
				            </div>
				        </div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
				                <label for="textArea" class="col-lg-4 control-label">Business Specialisation</label>
				                <div class="col-lg-8">
				                	<div class="form-check radio">
                                        <label class="form-radio-label">
				                    		<input type="radio" id="text22" value="products" name="products_services"> Products (Shops Only)
				                    	</label>
				                    </div>
				                    <div class="form-check radio">
                                        <label class="form-radio-label">
				                    		<input type="radio" id="text23" value="services" name="products_services"> Services (Salons &amp; Spa's Onlu)
				                    	</label>
				                    </div>
				                    <div class="form-check radio">
                                        <label class="form-radio-label">
				                    		<input type="radio" id="text24" value="products_and_services" name="products_services"> Products &amp; Services
				                    	</label>
				                    </div>
				                </div>
				            </div>
				        </div>
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="textTwos" class="col-lg-4 control-label">Company ID</label>
	                			<div class="col-lg-8">
	                				<input type="text" name="company_ID" placeholder="Company registered ID" class="form-control">
	                			</div>
	                		</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row mt-0">
				                <label for="textBio" class="col-lg-4 control-label">Company Bio</label>
				                <div class="col-lg-8">
				                    <textarea class="form-control" rows="3" name="company_bio" id="textBio" placeholder="Company bio status ..."></textarea>
				                </div>
				            </div>
		                </div>
		                <div class="col-md-6">
		                	<div class="form-group row mt-0">
				                <label for="descde" class="col-lg-4 control-label">Description</label>
				                <div class="col-lg-8">
				                    <textarea class="form-control" rows="3" name="description" id="descde" placeholder="Company description details ..."></textarea>
				                </div>
				            </div>
			            </div>
			        </div>
	                <div class="form-group row justify-content-end mt-0">
		                <div class="col-lg-10 offset-lg-2">
		                    <button type="submit" class="btn btn-raised btn-primary">Create Company</button>
		                    <a href="{{ route('home') }}" class="btn btn-danger">Cancel To Home</a>
		                </div>
	                </div>
              	</fieldset>
            </form>
        </div>
    </div>
    {{-- <div class="card card-primary">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="card-body wow fadeInUp">
                  <div class="mb-2">
                    <span class="ms-logo ms-logo-sm mr-1">M</span>
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
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <iframe width="100%" height="340" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48342.06480344582!2d-73.980069429762!3d40.775680208459505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2589a018531e3%3A0xb9df1f7387a94119!2sCentral+Park!5e0!3m2!1sen!2sus!4v1491233314840"></iframe>
            </div>
        </div>
    </div> --}}
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