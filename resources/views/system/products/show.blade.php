@extends('layouts.site')
@section('title', 'Product Details')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Product Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
                    <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('userhome') }}"><i class="fa fa-home"></i> Home</a></li>
                    	<li class="breadcrumb-item"><a href="{{ route('companies.index','all') }}"><i class="fa fa-address-book"></i> Companies</a></li>
                    	<li class="breadcrumb-item"><a href="{{ route('shops.index','all') }}"><i class="fa fa-address-book-o"></i> Shops</a></li>
                    	<li class="breadcrumb-item"><a href="{{ route('shops.show',['all',$shop->id]) }}"><i class="fa fa-address-book-o"></i> {{ $shop->shop_name }}</a></li>
                    	<li class="breadcrumb-item"><a href="{{ route('products.index',['all',$shop->id]) }}"><i class="fa fa-list"></i> Products</a></li>
						<li class="breadcrumb-item active"><i class=""></i> {{ $product->product_name }}</li>
			        </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-6">
            <div id="carousel-product" class="ms-carousel ms-carousel-thumb carousel slide animated zoomInUp animation-delay-5" data-ride="carousel" data-interval="0">
	            <div class="card card-body text-center">
	                <!-- Wrapper for slides -->
	                <span class="col-12 badge badge-info mb-1" style="font-size: 20px; text-transform: capitalize; padding: 5px 10px; border-radius: 5px; overflow-x: auto;">
	                	{{ $product->product_name }} | 
	                	<small>
	                		{{ $shop->shop_name }} ({{ $shop->categories_id ? App\Models\Categories::where('id',$shop->categories_id)->first()->display_name : 'No category selected' }})
	                	</small>
	                </span>
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
        </div>
        <div class="col-md-6">
        	<div class="row">
        		<div class="col-12">
        			<div class="card animated zoomInDown animation-delay-5">
			            <div class="card-body">
		        			<div class="table-responsive">
		              			<table class="table">
		              				<tbody>
					                	@if($product->company_id)
					                		<tr>
					                			<td><strong>Company: </strong> </td>
					                			<td><a href="{{ route('companies.show',['all',$product->company_id]) }}" target="_blank">
					                				{{ App\Models\Company::where('id',$product->company_id)->first()->company_name }}
					                			</a></td>
					                		</tr>
					                	@endif
					                	@if($product->product_name)
					                  		<tr>
					                  			<td><strong>Product Name: </strong></td><td> {{ $product->product_name }}</td>
					                  		</tr>
					                  	@endif
					                  	@if($product->description)
					                  		<tr>
					                  			<td><strong>Description: </strong></td><td> {{ $product->description }}</td>
					                  		</tr>
					                  	@endif
					                  	@if($product->previous_price)
					                  		<tr>
					                  			<td><strong>Previous Price: </strong></td><td> <strike>UGX. {{ $product->previous_price }}</strike></td>
					                  		</tr>
					                  	@endif
					                  	@if($product->current_price)
					                  		<tr> 
					                  			<td><strong>Current Price: </strong></td><td class="text-info">UGX. {{ $product->current_price }}</td>
					                  		</tr>
					                  	@endif
					                  	@if($product->categories_id)
					                  		<tr>
					                  			<td><strong>Product Category:</strong></td><td> {{ App\Models\Categories::where('id',$product->categories_id)->first()->display_name }}</td>
					                  		</tr>
					                  	@endif
					                  	<tr>
					                  		<td><strong>Availability: </strong></td>
					                  		<td><span class="ms-tag ms-tag-success" style="text-transform: capitalize;"> {{ $product->status }} </span></td>
					                  	</tr>
					                	@if($product->user_id)
						                  	<tr>
						                  		<td><strong>Contact Person: </strong></td>
						                  		<td><a href="{{ route('users.show',$product->user_id) }}" target="_blank">
							                  		<img src="{{ App\User::where('id',$product->user_id)->first()->profile_image ? asset('files/profile/images/' . App\User::where('id',$product->user_id)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;">
							                  		{{ App\User::where('id',$product->user_id)->first()->name }}
							                  	</a></td>
							                </tr>
					                  	@endif
					                </tbody>
				                </table>
		              		</div>
		        		</div>
		        		<div class="card-body">
		        			<div class="row">
		        				<div class="col-md-4 text-center" style="padding: 5px;">
		        					<a href="#" class="btn btn-primary btn-raised"><span class="glyphicon glyphicon-book"></span> Book Now!</a>
		        				</div>
		        				<div class="col-md-4 text-center" style="padding: 5px;">
		        					<a href="#" class="btn btn-info btn-raised"><span class="glyphicon glyphicon-book"></span> Order Now!</a>
		        				</div>
		        				<div class="col-md-4 text-center" style="padding: 5px;">
		        					<a href="#" class="btn btn-primary btn-raised"><span class="glyphicon glyphicon-envelope"></span> Clarify!</a>
		        				</div>
		        			</div>
		        		</div>
		        	</div>
		        </div>
        	</div>
        </div>
    </div>
</div>
@endsection
@section('scripts') @endsection