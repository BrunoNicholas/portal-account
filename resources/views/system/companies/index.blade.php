@extends('layouts.site')
@section('title', $type . ' Multi Accounts')
@section('styles')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection
@section('navigator')
<div class="ms-hero-page ms-hero-img-city2 ms-hero-bg-info mb-0" style="padding: 0px;">
    <div class="text-center color-white mt-0 mb-0 index-1" style="padding-top: 5px;">
        <h2>Multi Accounts</h2>
      	<p class="lead lead-lg" style="text-transform: capitalize;"> {{ $type }} Registered Multi Accounts
            <ol class="breadcrumb d-flex justify-content-center" style="height: 40px;">
            	<li class="breadcrumb-item"><a href="{{ route('userhome') }}" class="text-white"><i class="fa fa-home text-white"></i> Home</a></li>
				<li class="breadcrumb-item active text-white"><i class="fa fa-address-book-o text-white"></i> Multi Accounts</li>
            </ol>
        </p>
      	<a href="{{ route('salons.index','all') }}" class="btn btn-raised btn-white color-primary"><i class="zmdi zmdi-male-female"></i> Salons </a>
      	<a href="{{ route('shops.index','all') }}" class="btn btn-raised btn-white color-primary"><i class="zmdi zmdi-male-female"></i> Shops </a>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid mt-1">
    <div class="row justify-content-md-center">
        <div class="col-lg-8">
            <div class="card card-primary">
              	<div class="card-header text-center"> <h3 class="card-title">Accounts Categories</h3> </div>
              	<div class="card-body">
                	<div class="row">
                  		<div class="col-lg-8">
		                    <form class="form-horizontal" id="Filters">
			                    <div class="row">
			                        <div class="col-sm-6">
				                        <fieldset>
	            							<!-- {{ $acomps = App\Models\Categories::where('type','company')->get() }} -->
				                            <h4 class="mb-1 no-mt"> By Region </h4>
				                            <div class="form-group no-mt">
					                            @foreach($acomps as $sal)
								                    <div class="radio" onclick="window.location='{{ route('companies.index',$sal->name) }}'">
								                        <label><input type="radio" @if($stype == $sal->name) checked @endif><i class="zmdi zmdi zmdi zmdi-male-female"></i> <span style="visibility: hidden;">p</span> {{ $sal->display_name }} </label>
								                    </div>
								                @endforeach
				                            </div>
				                        </fieldset>
			                        </div>
			                        <div class="col-sm-6">
				                        <fieldset>
				                        	<!-- {{ $bcomps = App\Models\Categories::where('type','more-company')->get() }} -->
				                            <h4 class="mb-1 no-mt">Other Categories</h4>
				                            <div class="form-group no-mt">
				                              	@foreach($bcomps as $sal)
								                    <div class="radio" onclick="window.location='{{ route('companies.index',$sal->name) }}'">
								                        <label><input type="radio" @if($stype == $sal->name) checked @endif><i class="zmdi zmdi zmdi zmdi-male-female"></i> <span style="visibility: hidden;">p</span> {{ $sal->display_name }} </label>
								                    </div>
								                @endforeach
				                            </div>
				                        </fieldset>
			                        </div>
			                    </div>
		                    </form>
                  		</div>
                  		<div class="col-lg-4">
		                    <form class="form-horizontal">
		                      	<h4 class="mb-1 no-mt">Sort by</h4>
			                    <select id="SortSelect" class="form-control selectpicker" data-dropup-auto="false">
			                        <option value="">Date Registered</option>
			                        <option value="">Name</option>
			                        <option value="">Ratings</option>
			                        <option value="">Status</option>
			                        <option value="">Only Products</option>
			                        <option value="">Only Services</option>
			                        <option value="">Only products &amp; Services</option>
			                    </select>
		                    </form>
                    		<button class="btn btn-primary btn-block no-mb mt-1" onclick="window.location='{{ route('companies.index','all') }}'" id="Reset"><i class="zmdi zmdi-accounts"></i> All Companies </button>
                  		</div>
                	</div>
              	</div>
			</div>
        </div>
    </div>
	<div class="row">
		<div class="col-lg-10 offset-lg-1">
			<div class="row" id="container"><?php $i=0  ?>
            	@if(sizeof($companies) < 1)
            		<div class="col-xl-12 col-md-6 mix laptop apple" data-price="1999.99" data-date="20160901">
            			<div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
			                <div class="card-body overflow-hidden text-center">
			                	<span class="text-danger">No company found under that major category.</span> <br>
			                	<button class="btn btn-primary no-mb mt-0" onclick="window.location='{{ route('companies.index','all') }}'"><i class="fa fa-tree"></i> View All <i class="fa fa-tree"></i> </button> 
			                	@permission('can_add_company') Or <a href="{{ route('companies.create','all') }}" class="btn btn-warning no-mb mt-0"> Create One </a>  @endpermission
			                </div>
			            </div>
            		</div>
            	@endif
            	@foreach($companies as $company)
            		<?php
		        		$ratings_num  = $company->ratings->count();
				        $tot_sum      = 0;

				        if ($ratings_num > 0) {
				            foreach ($company->ratings as $rat) {
				                $tot_sum += $rat->rate_number;
				            }
				            $avgs_ratings    = $tot_sum/$ratings_num;
				        } else {
				            $avgs_ratings    = $tot_sum;
				        }
		        	?>
            		<div class="col-xl-4 col-md-6 mix laptop apple" data-price="1999.99" data-date="20160901" onclick="window.location='{{ route('companies.show',['all',$company->id]) }}'">
		                <div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
			                <div class="card-body overflow-hidden text-center">
			                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 400px;" class="img-fluid center-block">
			                    <h4 class="text-normal text-center">{{ $company->company_name }}</h4>
			                    <p>{{ strlen($company->description) > 20 ? substr($company->description, 0, 20) . '... ' : $company->description }}</p>
			                    <div class="mt-1">
				                    <input class="input-3-xs" name="input-3-xs" value="{{ $avgs_ratings }}" class="rating-loading" data-size="xs">
				                    @auth <span class="ms-tag ms-tag-success" style="text-transform: capitalize;"> {{ $company->status }} </span> @endauth
			                    </div>
		                    	<div class="row">
		                    		<div class="col-md-6">
		                    			<button type="button" class="btn btn-primary btn-sm btn-block mt-0 no-mb">
					                    	{{ $company->salons->count() }} Salons
					                    </button>
		                    		</div>
		                    		<div class="col-md-6">
		                    			<button type="button" class="btn btn-primary btn-sm btn-block mt-0 no-mb">
					                    	{{ $company->shops->count() }} Shops
					                    </button>
		                    		</div>
		                    	</div>
			                </div>
		                </div>
		            </div>
              	@endforeach
            </div>
        </div>
		<div class="col-lg-10 offset-lg-1 d-flex justify-content-center">
			{{ $companies->links() }}
		</div>
    </div>
</div>
@include('layouts.includes.footer')
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script>
		$(document).ready(function(){
		    $('.input-3-xs').rating({displayOnly: true, step: 0.5});
		});
	</script>
@endsection