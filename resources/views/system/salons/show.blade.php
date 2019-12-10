@extends('layouts.site')
@section('title') {{ $salon->salon_name }} - Salon Details @endsection
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
{{-- @section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Salon Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home "></i> <span class=""> Home </span></a></li>
    					<li class="breadcrumb-item"><a href="{{ route('salons.index','all') }}"> <i class="fa fa-address-book-o "></i> <span class=""> Salons &amp; Spa's </span></a></li>
    					<li class="breadcrumb-item active"> <i class="fa fa-plus "></i> <span class=""> Salon/Spa Details </span></li>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="carousel-product" class="ms-carousel ms-carousel-thumb carousel slide animated zoomInUp animation-delay-5" data-ride="carousel" data-interval="0">
	            <div class="card card-body text-center">
	                <!-- Wrapper for slides -->
	                <span style="font-size: 20px; text-transform: capitalize;">{{ $salon->salon_name }} <small> - {{ App\Models\Categories::where('id',$salon->categories_id)->first()->display_name }}</small></span>
	                <div class="carousel-inner" role="listbox">
		                <div class="carousel-item active">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." style="max-height: 350px;">
		                </div>
		                <div class="carousel-item">
		                    <img src="{{ asset('files/defaults/images/blank_light.jpg') }}" alt="..." style="max-height: 350px;">
		                </div>
		                <div class="carousel-item">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" style="max-height: 350px;" alt="...">
		                </div>
		                <div class="carousel-item">
		                    <img src="{{ asset('files/defaults/images/blank_light.jpg') }}" alt="..." style="max-height: 350px;">
		                </div>
		                <div class="carousel-item">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." style="max-height: 350px;">
		                </div>
	                </div>
	            </div>
              	<!-- Indicators -->
	            <ol class="carousel-indicators carousel-indicators-tumbs carousel-indicators-tumbs-outside">
	                <li data-target="#carousel-product" data-slide-to="0" class="active">
	                  	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                <li data-target="#carousel-product" data-slide-to="1">
	                  	<img src="{{ asset('files/defaults/images/blank_light.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                <li data-target="#carousel-product" data-slide-to="2">
	                  	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                <li data-target="#carousel-product" data-slide-to="3">
	                  	<img src="{{ asset('files/defaults/images/blank_light.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                <li data-target="#carousel-product" data-slide-to="4">
	                  	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	            </ol>
            </div>
            <div class="card card-primary animated fadeInUp animation-delay-10">
            	<div class="card-header overflow-hidden text-center"> Salon Styles </div>
	            <div class="card-body overflow-hidden">
	                <div class="row" style="height: 410px; text-align: center;">
	                	@if(sizeof($salon->styles) < 1)
                			<span class="text-danger"> No fashion style saved for this salon/spa.
                			@if($salon->user_id == Auth::user()->id)
                				<a class="btn btn-sm btn-primary btn-raised" href="{{ route('styles.create',['all',$salon->id]) }}"><i class="fa-plus fa"></i> Add new style </a>
                			@endif
                			</span>
                		@endif
                		@foreach($salon->styles as $style)
                			<div class="panel panel-body">

		                	</div>
                		@endforeach
	                </div>
	            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card animated zoomInDown animation-delay-5">
	            <div class="card-body">
	            	<div class="row">
		                <div class="col-md-6"><h2>{{ $salon->salon_name }} <small>- Details</small></h2></div>
		                <div class="col-md-6 mt-3 text-right">
		                    <div>
		                      <span class="mr-2">
		                        <i class="zmdi zmdi-hc-lg zmdi-star color-warning"></i>
		                        <i class="zmdi zmdi-hc-lg zmdi-star color-warning"></i>
		                        <i class="zmdi zmdi-hc-lg zmdi-star color-warning"></i>
		                        <i class="zmdi zmdi-hc-lg zmdi-star"></i>
		                        <i class="zmdi zmdi-hc-lg zmdi-star"></i>
		                      </span>
		                    </div>
		                </div>
			        </div>
	                <p class="lead"> {{ $salon->description }} </p>
	                <div class="table-responsive">
		                <table class="table">
		                	@if($salon->user_id)
			                  	<tr>
			                  		<td><strong>Administrator: </strong></td>
			                  		<td><a href="{{ route('users.show',$salon->user_id) }}" target="_blank">
				                  		<img src="{{ App\User::where('id',$salon->user_id)->first()->profile_image ? asset('files/profile/images/' . App\User::where('id',$salon->user_id)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;">
				                  		{{ App\User::where('id',$salon->user_id)->first()->name }}
				                  	</a></td>
				                </tr>
		                  	@endif
		                	@if($salon->company_id)
		                		<tr>
		                			<td><strong>Company: </strong> </td>
		                			<td><a href="{{ route('companies.show',$salon->company_id) }}" target="_blank">
		                				{{ App\Models\Company::where('id',$salon->company_id)->first()->company_name }}
		                			</a></td>
		                		</tr>
		                	@endif
		                	@if($salon->salon_email)
		                  		<tr>
		                  			<td><strong>Salon Email: </strong></td><td> {{ $salon->salon_email }}</td>
		                  		</tr>
		                  	@endif
		                  	@if($salon->salon_website)
		                  		<tr>
		                  			<td><strong>Telephone: </strong></td><td> {{ $salon->salon_website }}</td>
		                  		</tr>
		                  	@endif
		                  	@if($salon->salon_category)
		                  		<tr>
		                  			<td><strong>Other Services: </strong></td><td> {{ $salon->salon_category }}</td>
		                  		</tr>
		                  	@endif
		                  	@if($salon->salon_location)
		                  		<tr> 
		                  			<td><strong>Salon Location: </strong></td><td> {{ $salon->salon_location }}</td>
		                  		</tr>
		                  	@endif
		                  	@if($salon->accept_cash)
		                  		<tr>
		                  			<td><strong>Can accept cash:</strong></td><td> Yes</td>
		                  		</tr>
		                  	@endif
		                  	@if($salon->accept_bookings)
		                  		<tr>
		                  			<td><strong>Can accept bookings: </strong> </td><td> Yes</td>
		                  		</tr>
		                  	@endif
		                  	@if($salon->accept_orders)
		                  		<tr>
		                  			<td><strong>Can accept orders: </strong></td><td> Yes</td>
		                  		</tr>
		                  	@endif
		                  	@if($salon->accept_job_applicants)
		                  		<tr>
		                  			<td><strong>Accepts Job Applications: </strong></td><td> Yes</td>
		                  		</tr>
		                  	@endif
		                  	<tr>
		                  		<td><strong>Availability: </strong></td>
		                  		<td><span class="ms-tag ms-tag-success" style="text-transform: capitalize;"> {{ $salon->status }} </span></td>
		                  	</tr>
		                  	{{-- <tr>
		                  		<td><strong>Shipping costs: </strong></td>
		                  		<td><span class="color-warning">$5.25</span></li></td>
		                  		</td>
		                  	</tr> --}}
		                </table>
		            </div>
	                <button type="button" class="btn btn-primary btn-block btn-raised mt-2 no-mb"><i class="zmdi zmdi-plus"></i> Add Review</button>
	            </div>
            </div>
            <div class="card card-success animated fadeInUp animation-delay-10">
            	<div class="card-header overflow-hidden text-center">User Reviews &amp; Ratings</div>
	            <div class="card-body overflow-hidden">
	                <div class="row" style="height: 300px;">
	                	<div class="panel panel-body">
	                		
	                	</div>
	                </div>
	            </div>
            </div>
        </div>
    </div>
    <h2 class="mt-4 mb-4 right-line"> Other Salons | <a href="{{ route('salons.index','all') }}">View All</a> </h2>
    <div class="row"><?php $i=3; ?>
        @foreach($salons as $sal)
        	@if($sal->id != $salon->id)
	            <div class="col-md-4" onclick="window.location='{{ route('salons.show',['all',$sal->id]) }}'">
	                <div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
		                <div class="card-body overflow-hidden text-center">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" class="img-fluid center-block" style="max-height: 250px;">
		                    <h4 class="text-normal text-center">{{ $sal->salon_name }}</h4>
		                    <p>{{ strlen($sal->description) > 20 ? substr($sal->description, 0, 20) . '... ' : $sal->description }}</p>
		                    <div class="mt-2">
		                      <span class="mr-2">
		                        <i class="zmdi zmdi-star color-warning"></i>
		                        <i class="zmdi zmdi-star color-warning"></i>
		                        <i class="zmdi zmdi-star color-warning"></i>
		                        <i class="zmdi zmdi-star color-warning"></i>
		                        <i class="zmdi zmdi-star"></i>
		                      </span>
		                      <span class="ms-tag ms-tag-success" style="text-transform: capitalize;">{{ $sal->status }}</span>
		                    </div>
		                    <button type="button" class="btn btn-primary btn-sm btn-block mt-0 no-mb">
		                    	{{ $sal->styles->count() }} Registered Styles
		                    </button>
		                </div>
	                </div>
	            </div>
	        @endif
        @endforeach
    </div>
</div> <!-- container -->
@endsection
@section('scripts') @endsection