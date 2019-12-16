@extends('layouts.site')
@section('title', $type . ' Shops')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection
@section('navigator')
	<div class="ms-hero-page ms-hero-img-city2 ms-hero-bg-info mb-6" style="padding: 0px;">
	    <div class="text-center color-white mt-0 mb-0 index-1" style="padding-top: 5px;">
	        <h2>Items &amp; Products</h2>
	      	<p class="lead lead-lg" style="text-transform: capitalize;"> {{ $type }} - Items &amp; Products
	            <ol class="breadcrumb d-flex justify-content-center" style="height: 40px;">
	            	<li class="breadcrumb-item"><a href="{{ route('userhome') }}" class="text-white"><i class="fa fa-home text-white"></i> Home</a></li>
					<li class="breadcrumb-item active text-white"><i class="zmdi zmdi-male-female text-white"></i> Shops</li>
	            </ol>
	        </p>
	      	<a href="{{ route('products.index',['all',0]) }}" class="btn btn-raised btn-white color-info"><i class="zmdi zmdi-male-female"></i> All Products </a>
	    </div>
	</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="row" id="container"><?php $i=0  ?>
            	@if(sizeof($shops) < 1)
            		<div class="col-xl-12 col-md-6 mix laptop apple" data-price="1999.99" data-date="20160901">
            			<div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
			                <div class="card-body overflow-hidden text-center">
			                	<span class="text-danger">No Shops found with that major category.</span> <br>
			                	<button class="btn btn-info no-mb mt-0" onclick="window.location='{{ route('shops.index','all') }}'"><i class="fa fa-tree"></i> View All <i class="fa fa-tree"></i> </button> 
			                	@permission('can_add_salon') Or <a href="{{ route('shops.create','all') }}" class="btn btn-warning no-mb mt-0"> Create One </a>  @endpermission
			                </div>
			            </div>
            		</div>
            	@endif
            	@foreach($shops as $shop)
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
		            <div class="col-xl-4 col-md-6 mix laptop apple" data-price="1999.99" data-date="20160901" onclick="window.location='{{ route('shops.show',['all',$shop->id]) }}'">
		                <div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
			                <div class="card-body overflow-hidden text-center">
			                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 400px;" class="img-fluid center-block">
			                    <h4 class="text-normal text-center">{{ $shop->shop_name }}</h4>
			                    <p>{{ strlen($shop->description) > 20 ? substr($shop->description, 0, 20) . '... ' : $shop->description }}</p>
			                    <div class="mt-1" style="font-size: 8px;">
			                      	<input class="input-3-xs" name="input-3-xs" value="{{ $avgs_ratings }}" class="rating-loading" data-size="xs">
			                      	<span class="ms-tag ms-tag-success"> {{ $shop->status }} </span>
			                    </div>
			                    <button type="button" class="btn btn-info btn-sm btn-block mt-0 no-mb">
			                    	{{ $shop->products->count() }} Products
			                    </button>
			                </div>
		                </div>
		            </div>
		        @endforeach
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-info">
	            <div class="card-header">
	                <h3 class="card-title text-center"> Shops Categories</h3>
	            </div>
              	<div class="card-body">
            	<!-- {{ $aproducts = App\Models\Categories::where('type','products-gender')->get() }} -->
	                <form class="form-horizontal" id="Filters">
	                  	<h4 class="mb-1 no-mt">Gender Category</h4>
		                <fieldset>
		                    <div class="form-group no-mt">
		                    	@foreach($aproducts as $prod)
			                    <div class="radio" onclick="window.location='{{ route('shops.index',$prod->name) }}'">
			                        <label><input type="radio" name="productls" @if($stype == $prod->name) checked @endif><i class="zmdi zmdi zmdi zmdi-male-female"></i> <span style="visibility: hidden;">p</span> {{ $prod->display_name }} </label>
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
			                      	<option value="price:asc">Rating</option>
			                      	<option value="price:desc">Aministrators</option>
			                      	<option value="date:asc">Date Added</option>
			                      	<option value="date:desc">Company</option>
			                    </select>
			                </div>
			            </div>
		            </form>
	                <button class="btn btn-info btn-raised btn-block no-mb mt-0" onclick="window.location='{{ route('shops.index','all') }}'"><i class="fa fa-tree"></i> View All <i class="fa fa-tree"></i></button>
              	</div>
        	</div>
  		</div>
    </div>
</div> <!-- container -->
@include('layouts.includes.footer')
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script>
		$(document).ready(function(){
		    $('.input-3-xs').rating({displayOnly: true, step: 0.5});
		});
	</script>
	<script>
	    $('#example23').DataTable({
	        dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
	    });
	</script>
@endsection