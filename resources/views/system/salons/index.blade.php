@extends('layouts.site')
@section('title', $type . ' Salons')
@section('styles')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection
@section('navigator')
<div class="ms-hero-page ms-hero-img-city2 ms-hero-bg-info mb-6" style="padding: 0px;">
    <div class="text-center color-white mt-0 mb-0 index-1" style="padding-top: 5px;">
        <h2>Salons &amp; Spas</h2>
      	<p class="lead lead-lg" style="text-transform: capitalize;"> {{ $type }} Salons &amp; Spa's
            <ol class="breadcrumb d-flex justify-content-center" style="height: 40px;">
            	<li class="breadcrumb-item"><a href="{{ route('userhome') }}" class="text-white"><i class="fa fa-home text-white"></i> Home</a></li>
				<li class="breadcrumb-item active text-white"><i class="zmdi zmdi-male-female text-white"></i> Salons</li>
            </ol>
        </p>
      	<a href="{{ route('shops.index','all') }}" class="btn btn-raised btn-white color-primary"><i class="zmdi zmdi-male-female"></i> View Shops </a>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-primary">
	            <div class="card-header">
	                <h3 class="card-title text-center">Salon Categories</h3>
	            </div>
              	<div class="card-body">
              		<!-- {{ $asalons = App\Models\Categories::where('type','salon-gender')->get() }} -->
            		<!-- {{ $bsalons = App\Models\Categories::where('type','salon-style')->get() }} -->
	                <form class="form-horizontal" id="Filters">
	                  	<h4 class="mb-1 no-mt">Gender Category</h4>
		                <fieldset>
		                    <div class="form-group no-mt">
		                    	@foreach($asalons as $sal)
			                    <div class="radio" onclick="window.location='{{ route('salons.index',$sal->name) }}'">
			                        <label><input type="radio" @if($stype == $sal->name) checked @endif><i class="zmdi zmdi zmdi zmdi-male-female"></i> <span style="visibility: hidden;">p</span> {{ $sal->display_name }} </label>
			                    </div>
			                    @endforeach			                  	
		                    </div>
		                </fieldset>
		                <fieldset>
		                    <h4 class="mb-0">Style Category</h4>
		                    <div class="form-group no-mt">
			                    @foreach($bsalons as $sal)
			                    <div class="radio" onclick="window.location='{{ route('salons.index',$sal->name) }}'">
			                        <label><input type="radio" @if($stype == $sal->name) checked @endif><i class="zmdi zmdi zmdi zmdi-male-female"></i> <span style="visibility: hidden;">p</span> {{ $sal->display_name }} </label>
			                    </div>
			                    @endforeach	
		                    </div>
		                </fieldset>
	                </form>
	                <form class="form">
	                	<div class="row">
		                  	<label class="col-4" style="padding:0px; margin: 0px; vertical-align: middle;">Sort by</label>
			                <div class="form-group col-8" style="padding:0px; margin: 0px; vertical-align: middle;">
			                    <select id="SortSelect" class="form-control selectpicker" data-dropup-auto="false">
			                      	<option value="random">Popular</option>
			                      	<option value="price:asc">Price ASC</option>
			                      	<option value="price:desc">Price DESC</option>
			                      	<option value="date:asc">Release ASC</option>
			                      	<option value="date:desc">Release DESC</option>
			                    </select>
			                </div>
			            </div>
		            </form>
	                <button class="btn btn-primary btn-raised btn-block no-mb mt-0" onclick="window.location='{{ route('salons.index','all') }}'"><i class="fa fa-tree"></i> View All <i class="fa fa-tree"></i></button>
              	</div>
        	</div>
  		</div>
        <div class="col-lg-9">
            <div class="row" id="container"><?php $i=0  ?>
            	@if(sizeof($salons) < 1)
            		<div class="col-xl-12 col-md-6 mix laptop apple" data-price="1999.99" data-date="20160901">
            			<div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
			                <div class="card-body overflow-hidden text-center">
			                	<span class="text-danger">No Salon found with that major category.</span> <br>
			                	<button class="btn btn-primary no-mb mt-0" onclick="window.location='{{ route('salons.index','all') }}'"><i class="fa fa-tree"></i> View All <i class="fa fa-tree"></i> </button> 
			                	@permission('can_add_salon') Or <a href="{{ route('salons.create','all') }}" class="btn btn-warning no-mb mt-0"> Create One </a>  @endpermission
			                </div>
			            </div>
            		</div>
            	@endif
            	@foreach($salons as $salon)
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
		            <div class="col-xl-4 col-md-6 mix laptop apple" data-price="1999.99" data-date="20160901" onclick="window.location='{{ route('salons.show',['all',$salon->id]) }}'">
		                <div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
			                <div class="card-body overflow-hidden text-center">
			                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 400px;" class="img-fluid center-block">
			                    <h4 class="text-normal text-center">{{ $salon->salon_name }}</h4>
			                    <p>{{ strlen($salon->description) > 20 ? substr($salon->description, 0, 20) . '... ' : $salon->description }}</p>
			                    <div class="mt-1" style="font-size: 8px;">
			                      	<input class="input-3-xs" name="input-3-xs" value="{{ $avgs_ratings }}" class="rating-loading" data-size="xs">
			                      	<span class="ms-tag ms-tag-success"> {{ $salon->status }} </span>
			                    </div>
			                    <button type="button" class="btn btn-primary btn-sm btn-block mt-0 no-mb">
			                    	{{ $salon->styles->count() }} Registered Styles
			                    </button>
			                </div>
		                </div>
		            </div>
		        @endforeach
		        <div class="col-lg-10 offset-lg-1 d-flex justify-content-center">
					{{ $salons->links() }}
				</div>
            </div>
        </div>
    </div>
</div> <!-- container -->
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