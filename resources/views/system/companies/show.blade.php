@extends('layouts.site')
@section('title') {{ $company->company_name }} | Account Details @endsection
@section('styles')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
	            <div class="col-lg-12 col-md-6 order-md-1">
	                <div class="card animated fadeInUp animation-delay-7">
		                <div class="ms-hero-bg-primary ms-hero-img-coffee">
		                    <h3 class="color-white index-1 text-center no-m pt-4">{{ $company->company_name }}</h3>
		                    <div class="color-medium index-1 text-center np-m">{{ $company->company_email }}</div>
		                    <img src="{{ $company->company_logo ? asset('files/companies/images/' . $company->company_logo) : asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." class="img-avatar-circle">
		                </div>
		                <div class="card-body pt-4 text-center">
		                    <h3 class="color-primary">Account Bio</h3>
		                    <div>
		                    	<input class="input-3-xs" name="input-3-xs" value="{{ $avg }}" class="rating-loading" data-size="xs">
		                    </div>
		                    <p>{{ $company->company_bio }}</p>
		                    <hr>
		                    <b>Date Created: </b> {{ explode(' ', trim($company->created_at))[0] }}, <b> Time: </b> {{ explode(' ', trim($company->created_at))[1] }}
		                    {{-- <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
		                    <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
		                    <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a> --}}
		                </div>
	                </div>
	            </div>
	            @auth
		            @if($company->user_id == Auth::user()->id)
		            <div class="col-lg-12 col-md-12 order-md-3 order-lg-2">
		            	<div class="row">
		            		<div class="col-lg-6">
		                		<a href="javascript:void(0)" title="Edit my accout profile" class="btn btn-warning btn-raised btn-block animated fadeInUp animation-delay-12"><i class="zmdi zmdi-edit" style="margin: 0px;"></i> Edit</a>
		                	</div>
		                	<div class="col-lg-6">
		                		<form method="POST" action="{{ route('companies.destroy', ['all',$company->id]) }}">
	                                {{ csrf_field() }}
	                                {{ method_field('DELETE') }}
		                			<button type="submit" title="Delete this account profile" class="btn btn-danger btn-raised btn-block animated fadeInUp animation-delay-12" onclick="return confirm('You are about to delete this .\nThis is riskky and not reversible.')">
		                				<i class="zmdi zmdi-delete" style="margin: 0px;"></i> 
		                				Delete 
		                			</button>
		                		</form>
		                	</div>
		                </div>
	              	</div>
	              	@endif
              	@endauth
	            <div class="col-lg-12 col-md-6 order-md-2 order-lg-3">
	                <div class="card animated fadeInUp animation-delay-12">
		                <div class="ms-hero-bg-royal ms-hero-img-mountain">
		                    <h3 class="color-white index-1 text-center pb-1 pt-1"> Salons, Spa's & Shops </h3>
		                </div>
		                <div class="card-body">
		                	@if(sizeof($company->salons) > 0)
		                    <div class="panel">
		                    	<div class="panel-heading text-center"> {{ $company->salons->count() }}  | Salons &amp; Spa's </div>
		                    	<div class="panel-body">
		                    		@foreach($company->salons as $salon)
				                    	<div style="padding: 0px;" class="row p-1" onclick="window.location='{{ route('salons.show',['all',$salon->id]) }}'">
					                        <div class="col-3">
					                          	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." style="max-height: 50px; border-radius: 10%;" >
					                        </div>
					                        <div class="col-8 ml-2" style="padding-right: 0px;">
					                          	<h4 class="mt-0 mb-0 color-info"> {{ $salon->salon_name }} </h4>
					                          	<a href="mailto:{{ $salon->salon_email }}?subject=feedback" class="pull-left">{{ $salon->salon_email }}</a>
						                        <?php
									        		$ratings_num  = $salon->ratings->count();
											        $tot_sum      = 0;

											        if ($ratings_num > 0) {
											            foreach ($salon->ratings as $rat) {
											                $tot_sum += $rat->rate_number;
											            }
											            $avgs_ratings    = $tot_sum/$ratings_num;
											        } else {
											            $avgs_ratings    = $tot_sum;
											        }
									        	?>
						                        <span class="pull-right"> <i class="zmdi zmdi-star color-warning"></i> {{ number_format((float)$avgs_ratings, 1, '.', '') }} </span>
					                        </div>
					                    </div>
					                @endforeach
		                    	</div>
		                    </div>
		                    @endif
		                    @if(sizeof($company->shops) > 0)
                    		<div class="panel">
		                    	<div class="panel-heading text-center"> {{ $company->shops->count() }} | Shops </div>
			                    <div class="panel-body">
			                    	@foreach($company->shops as $shop)
				                    	<div style="padding: 0px;" class="row p-1" onclick="window.location='{{ route('shops.show',['all',$shop->id]) }}'">
					                        <div class="col-3">
					                          	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." style="max-height: 50px; border-radius: 10%;" >
					                        </div>
					                        <div class="col-8 ml-2" style="padding-right: 0px;">
					                          	<h4 class="mt-0 mb-0 color-info"> {{ $shop->shop_name }} </h4>
					                          	<a href="mailto:{{ $shop->shop_email }}?subject=feedback" class="pull-left">{{ $shop->shop_email }}</a>
						                        <?php
									        		$ratings_num  = $shop->ratings->count();
											        $tot_sum      = 0;

											        if ($ratings_num > 0) {
											            foreach ($shop->ratings as $rat) {
											                $tot_sum += $rat->rate_number;
											            }
											            $avgs_ratings    = $tot_sum/$ratings_num;
											        } else {
											            $avgs_ratings    = $tot_sum;
											        }
									        	?>
						                        <span class="pull-right"> <i class="zmdi zmdi-star color-warning"></i> {{ number_format((float)$avgs_ratings, 1, '.', '') }} </span>
					                        </div>
					                    </div>
					                @endforeach
			                    </div>
			                </div>
			                @endif
			                @if(sizeof($company->salons) < 1 && sizeof($company->shops) < 1)
			                	<span class="color-danger"> No salons or shops created yet under this account. </span>
			                @endif
		                </div>
	                </div>
	            </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
	            <div class="col-sm-4">
	                <div class="card card-info card-body overflow-hidden text-center wow zoomInUp animation-delay-2">
	                  	<h2 class="counter color-info">{{ $company->shops->count() }}</h2>
	                  	<i class="zmdi zmdi-male-female color-info"></i>
	                  	<p class="mt-2 no-mb lead small-caps color-info">account shops</p>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="card card-success card-body overflow-hidden text-center wow zoomInUp animation-delay-5">
	                  	<h2 class="counter color-success">{{ $company->salons->count() }}</h2>
	                  	<i class="zmdi zmdi-male-female color-success"></i>
	                  	<p class="mt-2 no-mb lead small-caps color-success">account salons</p>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="card card-royal card-body overflow-hidden text-center wow zoomInUp animation-delay-4">
	                  	<h2 class="counter color-royal">{{ $company->reviews->count() }}</h2>
	                  	<i class="fa fa-1x fa-comments-o color-royal"></i>
	                  	<p class="mt-2 no-mb lead small-caps color-royal">reviews</p>
	                </div>
	            </div>
            </div>
            {{-- information table --}}
            <div class="card card-primary animated fadeInUp animation-delay-12">
	            <div class="card-header">
	                <h3 class="card-title text-center"><i class="zmdi zmdi-accounts"></i> Account Information </h3>
	            </div>
	            <div class="table-responsive">
		            <table class="table table-no-border table-striped">
		            	@if($company->company_name)
		                <tr>
		                  	<th><i class="zmdi zmdi-account mr-1 color-success"></i> Account Name</th>
		                  	<td>{{ $company->company_name }}</td>
		                </tr>
		                @endif
		                @if($company->company_email)
		                <tr>
		                  	<th><i class="fa fa-envelope mr-1 color-warning"></i> Contact Email </th>
		                  	<td>{{ $company->company_email }}</td>
		                </tr>
		                @endif
		                @if($company->user_id)
		                <tr>
		                  	<th><i class="zmdi zmdi-face mr-1 color-danger"></i> Administrator </th>
		                  	<td>
		                  		<a href="{{ route('users.show',$company->user_id) }}" target="_blank">
		                  			<img src="{{ App\User::where('id',$company->user_id)->first()->profile_image ? asset('files/profile/images/' . App\User::where('id',$company->user_id)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;">
		                  			{{ App\User::where('id',$company->user_id)->first()->name }}
		                  		</a>
		                  	</td>
		                </tr>
		                @endif
		                @if($company->company_ID)
		                <tr>
		                  	<th><i class="zmdi zmdi-link mr-1 color-info"></i> Registered Company ID</th>
		                  	<td>{{ $company->company_ID }}</td>
		                </tr>
		                @endif
		                @if($company->company_telephone)
		                <tr>
		                  	<th><i class="zmdi zmdi-phone-in-talk mr-1 color-royal"></i> Telephone</th>
		                  	<td>{{ $company->company_telephone }}</td>
		                </tr>
		                @endif
		                @if($company->products_services)
		                <tr>
		                  	<th><i class="zmdi zmdi-spinner mr-1 color-primary"></i> Specialism </th>
		                  	<td style="text-transform: capitalize;">
		                  		{{ count(explode('_', trim($company->products_services))) > 1 ? explode('_', trim($company->products_services))[0] . ' ' . explode('_', trim($company->products_services))[1] . ' ' . explode('_', trim($company->products_services))[2]  : explode('_', trim($company->products_services))[0] }}</td>
		                </tr>
		                @endif
		                @if($company->company_website)
		                <tr>
		                  	<th><i class="zmdi zmdi-spinner mr-1 color-primary"></i> Website</th>
		                  	<td>{{ $company->company_website }}</td>
		                </tr>
		                @endif
		                @if($company->company_location)
		                <tr>
		                  	<th><i class="zmdi zmdi-spinner mr-1 color-primary"></i> Location</th>
		                  	<td>{{ $company->company_location }}</td>
		                </tr>
		                @endif
		                @if($company->description)
		                <tr>
		                  	<th style="min-width: 200px;"><i class="zmdi zmdi-spinner mr-1 color-primary"></i> Description</th>
		                  	<td>{{ $company->description }}</td>
		                </tr>
		                @endif
		            </table>
		        </div>
            </div>
            <div class="card card-primary animated fadeInUp animation-delay-10">
            	<div class="card-header overflow-hidden text-center">Reviews | &amp; | Ratings <button class="btn btn-xs btn-info pull-right text-white" style="margin: 0px;" data-toggle="modal" data-target="#myRatingModal" @guest disabled title="You must be logged in to make a rating and review!" @else title="Hello {{ explode(' ', trim(Auth::user()->name))[0] }}, please do not leave minus reviewing this company" @endguest><i class="zmdi zmdi-plus"></i>Add New</button></div>
	            <div class="card-body overflow-hidden">
	            	@if(sizeof($revs) < 1)
	            		<div class="col-md-12 text-center text-danger">
	            			<span>No reviews made for this company yet</span>
	            		</div>
	            	@endif
	                <div class="row" style="max-height: 425px; overflow-y: auto;"><?php $i=0; ?>
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
	            <form action="{{ route('reviews.store',['company',$company->id]) }}" class="form-horizontal form-bordered" method="post">
	            	@csrf
	            	<div class="modal-body">
			            <input type="hidden" name="company_id" value="{{ $company->id }}">
			            @auth<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">@endauth

			            @foreach ($errors->all() as $error)
			            	<p class="alert alert-danger">{{ $error }}</p>
			            @endforeach

			            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                <div class="form-group row mt-0">
		                    <label class="col-md-4 col-form-label text-right" for="input-5-sm"> Rating this salon</label>
		                    <div class="col-md-8">
    							<input id="input-5-sm" name="rate_number" class="rating rating-loading" data-size="sm" data-max="5" data-step="0.1" data-show-clear="false" data-show-caption="true">
		                    </div>
		                </div>
		                <div class="form-group row mt-0">
		                    <label class="col-md-4 col-form-label text-right"> Your Review </label>
		                    <div class="col-md-8">
		                        <textarea class="form-control" name="review_message" placeholder="Describe your feeling towards this salon" required></textarea>
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
</div> <!-- container -->

@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script>
		$(document).ready(function(){
		    $('.input-3-xs').rating({displayOnly: true, step: 0.5});
		});
	</script>
@endsection