@extends('layouts.site')
@section('title', 'Shop Details')
@section('styles')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-6">
            <div id="carousel-product" class="ms-carousel ms-carousel-thumb carousel slide animated zoomInUp animation-delay-5" data-ride="carousel" data-interval="0">
	            <div class="card card-body text-center">
	                <!-- Wrapper for slides -->
	                <span style="font-size: 20px; text-transform: capitalize;">{{ $shop->shop_name }} <small> - {{ $shop->categories_id ? App\Models\Categories::where('id',$shop->categories_id)->first()->display_name : 'No category selected' }}</small></span>
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
            <div class="card card-info animated fadeInUp animation-delay-10">
            	<div class="card-header overflow-hidden text-center">
            		Shop Products 
            		@auth @if($shop->user_id == Auth::user()->id)
        				<a class="btn btn-sm btn-raised btn-primary" href="{{ route('products.create',['all',$shop->id]) }}" style="padding: 5px 10px;"><i class="fa-plus fa" style="margin: 0px; padding: 0px;"></i> New product </a>
        			@endif @endauth
            	</div>
	            <div class="card-body overflow-hidden">
	            	@if(sizeof($shop->products) < 1)
            			<div class="col-md-12 text-center text-danger"> No products found in this shop.
	            			@auth @if($shop->user_id == Auth::user()->id)
	            				<a class="btn btn-sm btn-info btn-raised" href="{{ route('products.create',['all',$shop->id]) }}"><i class="fa-plus fa" style="margin: 0px;"></i> Add new product </a>
	            			@endif @endauth
            			</div>
            		@endif
	                <div class="row" style="height: 495px; text-align: center; overflow-y: auto;"><?php $i=0; ?>
                		@foreach($shop->products as $product)
                			<div class="col-md-12" style="border-bottom: thin solid #e8e8e8;margin-bottom: 5px; padding-bottom: 5px;">
	                			<div class="row" onclick="window.location='{{ route('products.show',[($product->categories_id ? App\Models\Categories::where('id',$product->categories_id)->first()->name : 'all'),$shop->id,$product->id]) }}'">
			                        <div class="col-md-6 text-center">
			                        	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="width: 100%; border-radius: 5px;">
			                        </div>
			                        <div class="col-md-6">
			                        	<div class="row">
				                          	<div class="col-12">
				                          		<div class="table-responsive">
				                          			<table style="width: 100%;">
				                          				<tbody>
				                          					@if($product->product_name)
				                          						<tr>
				                          							<th colspan="2">{{ $product->product_name }}</th>
				                          						</tr>
				                          					@endif
			                          						<tr>
			                          							@if($product->previous_price)<td class="text-left"><strike>UGX {{ $product->previous_price }}</strike></td>@endif
			                          							@if($product->current_price)<td class="text-right text-info">UGX {{ $product->current_price }}</td>@endif
			                          						</tr>
			                          						<tr>
			                          							@if($product->categories_id)<td class="text-left">{{ App\Models\Categories::where('id',$product->categories_id )->first()->display_name }}</td>@endif
			                          							@if($product->status)
			                          							<td class="text-right">
			                          								<span class="badge badge-xs badge-success">{{ $product->status }}</span>
			                          							</td>
			                          							@endif
			                          						</tr>
				                          					@if($product->description)
				                          						<tr>
				                          							<td colspan="2" class="text-left"><i>{{ strlen($product->description) > 60 ? substr($product->description, 0, 60) . '... ' : $product->description }}</i></td>
				                          						</tr>
				                          					@endif
				                          				</tbody>
				                          			</table>
				                          		</div>
				                          	</div>
				                        </div>
				                    </div>
				                </div>
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
		                <div class="col-md-6"><h2>{{ $shop->shop_name }} <br><small>{{ number_format((float)$avg_ratings, 1, '.', '') }} Stars</small></h2></div>
		                <div class="col-md-6 mt-3 text-right">
		                    <div>
		                    	<input class="input-3-xs" name="input-3-xs" value="{{ $avg_ratings }}" class="rating-loading" data-size="xs">
		                    </div>
		                </div>
			        </div>
	                <p class="lead"> {{ $shop->description }} </p>
	                <div class="table-responsive">
		                <table class="table">
		                	@if($shop->user_id)
			                  	<tr>
			                  		<td><strong>Administrator: </strong></td>
			                  		<td><a href="{{ route('users.show',$shop->user_id) }}" target="_blank">
				                  		<img src="{{ App\User::where('id',$shop->user_id)->first()->profile_image ? asset('files/profile/images/' . App\User::where('id',$shop->user_id)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;">
				                  		{{ App\User::where('id',$shop->user_id)->first()->name }}
				                  	</a></td>
				                </tr>
		                  	@endif
		                	@if($shop->company_id)
		                		<tr>
		                			<td><strong>Company: </strong> </td>
		                			<td><a href="{{ route('companies.show',['all',$shop->company_id]) }}" target="_blank">
		                				{{ App\Models\Company::where('id',$shop->company_id)->first()->company_name }}
		                			</a></td>
		                		</tr>
		                	@endif
		                	@if($shop->shop_email)
		                  		<tr>
		                  			<td><strong>Shop Email: </strong></td><td> {{ $shop->shop_email }}</td>
		                  		</tr>
		                  	@endif
		                  	@if($shop->shop_website)
		                  		<tr>
		                  			<td><strong>Telephone: </strong></td><td> {{ $shop->shop_website }}</td>
		                  		</tr>
		                  	@endif
		                  	@if($shop->shop_category)
		                  		<tr>
		                  			<td><strong>Other Services: </strong></td><td> {{ $shop->shop_category }}</td>
		                  		</tr>
		                  	@endif
		                  	@if($shop->shop_location)
		                  		<tr> 
		                  			<td><strong>Shop Location: </strong></td><td> {{ $shop->shop_location }}</td>
		                  		</tr>
		                  	@endif
		                  	@if($shop->accept_cash)
		                  		<tr>
		                  			<td><strong>Can accept cash:</strong></td><td> Yes</td>
		                  		</tr>
		                  	@endif
		                  	@if($shop->accept_bookings)
		                  		<tr>
		                  			<td><strong>Can accept bookings: </strong> </td><td> Yes</td>
		                  		</tr>
		                  	@endif
		                  	@if($shop->accept_orders)
		                  		<tr>
		                  			<td><strong>Can accept orders: </strong></td><td> Yes</td>
		                  		</tr>
		                  	@endif
		                  	@if($shop->accept_job_applicants)
		                  		<tr>
		                  			<td><strong>Accepts Job Applications: </strong></td><td> Yes</td>
		                  		</tr>
		                  	@endif
		                  	<tr>
		                  		<td><strong>Availability: </strong></td>
		                  		<td><span class="ms-tag ms-tag-success" style="text-transform: capitalize;"> {{ $shop->status }} </span></td>
		                  	</tr>
		                  	{{-- <tr>
		                  		<td><strong>Shipping costs: </strong></td>
		                  		<td><span class="color-warning">$5.25</span></li></td>
		                  		</td>
		                  	</tr> --}}
		                </table>
		            </div>
	                <button type="button" class="btn btn-info btn-block btn-raised mt-2 no-mb" data-toggle="modal" data-target="#myRatingModal" @guest disabled title="You must be logged in to make a rating and review!" @else title="Hello {{ explode(' ', trim(Auth::user()->name))[0] }}, please do not leave minus reviewing this shop" @endguest><i class="zmdi zmdi-plus"></i> Add Review</button>
	            </div>
            </div>
            <div class="card card-info animated fadeInUp animation-delay-10">
            	<div class="card-header overflow-hidden text-center"> Reviews | &amp; | Ratings </div>
	            <div class="card-body overflow-hidden">
	            	@if(sizeof($revs) < 1)
	            		<div class="col-md-12 text-center text-danger">
	            			<span>No reviews made for this shop yet</span>
	            		</div>
	            	@endif
	                <div class="row" style="max-height: 373px; overflow-y: auto;"><?php $i=0; ?>
                		@foreach($revs as $review) 
                			<span style="display: none;">{{ $user[$i] = App\User::where('id',$review->user_id)->first() }}</span>
	                		<div class="col-md-12">
	                			<div class="row" style="border-bottom: thin solid #e7e7e7; border-radius: 5px; margin-bottom: 10px;">
			                        <div class="col-3 mr-1 text-center" onclick="window.location='{{ route('users.show',$user[$i]->id) }}'">
			                          	<img src="{{ $user[$i]->profile_image ? asset('files/profile/images/'.$user[$i]->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="..." style="max-height: 50px; border-radius: 10%;" >
			                          	<h5 class="mt-0 color-info">{{ $user[$i]->name }}</h5>
			                        </div>
			                        <div class="col-8">
			                        	<div class="row">
				                          	<div class="col-12">
				                          		<span class="pull-right" style="font-size: 8px;">
				                          			@if(App\Models\Rating::where('created_at',$review->created_at)->first())
				                          			<input class="input-3-xs" name="input-3-xs" value="{{  App\Models\Rating::where('created_at',$review->created_at)->first()->rate_number }}" class="rating-loading" data-size="xs">
				                          			@endif
				                          		</span>
				                          		<span class="pull-left" style="color: #c3c3c3;">{{ explode(' ', trim($review->created_at))[1] . ', ' . explode(' ', trim($review->created_at))[0] }}</span>
				                          	</div>
					                        <div class="col-12">
					                            {{ $review->review_message }}
					                        </div>
					                    </div>
			                        </div>
			                    </div>
		                    </div><!-- {{ ++$i }} -->
		                    <hr>
	                    @endforeach
	                </div>
	            </div>
            </div>
        </div>
    </div>
    {{-- the rating box --}}
    <div class="modal" id="myRatingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog animated zoomIn animated-3x" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h3 class="modal-title color-primary" id="myModalLabel"> Review &amp; Rate </h3>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
	            </div>
	            <form action="{{ route('reviews.store',['shop',$shop->id]) }}" class="form-horizontal form-bordered" method="post">
	            	@csrf
	            	<div class="modal-body">
			            @if($shop->company_id) <input type="hidden" name="company_id" value="{{ $shop->company_id }}"> @endif
			            {{-- @if($shop->company_id) <input type="hidden" name="salon_id" value="{{ $shop->salon_id }}"> @endif --}}
			            @if($shop->id) <input type="hidden" name="shop_id" value="{{ $shop->id }}"> @endif
			            @auth<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">@endauth

			            @foreach ($errors->all() as $error)
			            	<p class="alert alert-danger">{{ $error }}</p>
			            @endforeach

			            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                <div class="form-group row mt-0">
		                    <label class="col-md-4 col-form-label text-right" for="input-5-sm"> Rating this shop</label>
		                    <div class="col-md-8">
    							<input id="input-5-sm" name="rate_number" class="rating rating-loading" data-size="sm" data-max="5" data-step="0.1" data-show-clear="false" data-show-caption="true">
		                    </div>
		                </div>
		                <div class="form-group row mt-0">
		                    <label class="col-md-4 col-form-label text-right"> Your Review </label>
		                    <div class="col-md-8">
		                        <textarea class="form-control" name="review_message" placeholder="Describe your feeling towards this shop" required></textarea>
		                    </div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="reset" class="btn btn-danger" data-dismiss="modal">Clear & Close</button>
		                <button type="submit" class="btn  btn-primary"> SUBMIT </button>
		            </div>
	            </form>
	        </div>
	    </div>
	</div>
	{{-- /end of rating box --}}
    <h2 class="mt-4 mb-4 right-line"> Other Shops | <a href="{{ route('shops.index','all') }}">View All</a> </h2>
    <div class="row"><?php $i=3; ?>
        @foreach($shops as $sal)
        	<?php
        		$ratings_num  = $sal->ratings->count();
		        $tot_sum      = 0;

		        if ($ratings_num > 0) {
		            foreach ($sal->ratings as $rat) {
		                $tot_sum += $rat->rate_number;
		            }
		            $avgs_ratings    = $tot_sum/$ratings_num;
		        } else {
		            $avgs_ratings    = $tot_sum;
		        }
        	?>
        	@if($sal->id != $shop->id)
	            <div class="col-md-4" onclick="window.location='{{ route('shops.show',['all',$sal->id]) }}'">
	                <div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
		                <div class="card-body overflow-hidden text-center">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" class="img-fluid center-block" style="max-height: 250px;">
		                    <h4 class="text-normal text-center">{{ $sal->shop_name }}</h4>
		                    <p>{{ strlen($sal->description) > 20 ? substr($sal->description, 0, 20) . '... ' : $sal->description }}</p>
		                    <div class="mt-1" style="font-size: 8px;">
			                	<input class="input-3-xs" name="input-3-xs" value="{{ $avgs_ratings }}" class="rating-loading" data-size="xs">
		                      	<span class="ms-tag ms-tag-success" style="text-transform: capitalize;">{{ $sal->status }}</span>
		                    </div>
		                    <button type="button" class="btn btn-primary btn-sm btn-block mt-0 no-mb">
		                    	{{ $sal->products->count() }} Registered Products
		                    </button>
		                </div>
	                </div>
	            </div>
	        @endif
        @endforeach
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script>
		$(document).ready(function(){
		    $('.input-3-xs').rating({displayOnly: true, step: 0.5});
		});
	</script>
@endsection