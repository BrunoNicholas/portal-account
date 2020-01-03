@extends('layouts.site')
@section('title', 'All Styles')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('navigator')
	<div class="ms-hero-page ms-hero-img-city2 ms-hero-bg-info mb-6" style="padding: 0px;">
	    <div class="text-center color-white mt-0 mb-0 index-1" style="padding-top: 5px;">
	        <h2>Fashion Shops &amp; Products</h2>
	      	<p class="lead lead-lg" style="text-transform: capitalize;"> {{ $type }} - Fashion Shops &amp; Products
	            <ol class="breadcrumb d-flex justify-content-center" style="height: 40px;">
	            	<li class="breadcrumb-item"><a href="{{ route('userhome') }}" class="text-white"><i class="fa fa-home text-white"></i> Home</a></li>
	            	<li class="breadcrumb-item"><a href="{{ route('shops.index','all') }}" class="text-white"><i class="fa fa-address-book-o text-white"></i> User Shops </a></li>
					<li class="breadcrumb-item active text-white"><i class="zmdi zmdi-male-female text-white"></i> Products &amp; Items</li>
	            </ol>
	        </p>
	      	<a href="{{ route('shops.index','all') }}" class="btn btn-raised btn-white color-info"><i class="zmdi zmdi-male-female"></i> All Shops </a>
	    </div>
	</div>
@endsection
@section('content')
<div class="container">
   	<div class="row">
   		@if(sizeof($products) < 1)
   			<div class="col-lg-12 col-md-12 col-sm-12">
	            <div class="card wow zoomIn">
		            <h3 class="ms-thumbnail card-body pb-5 text-center color-danger">
		            	Oups, No products recorded for this category yet! <br>
		            	<small>
		            		<a href="{{ route('products.index',['all',0]) }}" class="btn btn-sm btn-primary">All Products</a>
		            	</small>
		            </h3>
		        </div>
		    </div>
   		@endif
   		@foreach($products as $product)
	        <div class="col-lg-3 col-md-4 col-sm-6">
	            <div class="card wow zoomIn">
		            <div class="ms-thumbnail card-body p-05">
		                <div class="withripple zoom-img">
		                  	<a href="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" data-lightbox="gallery" data-title="{{ $product->product_name }}"><img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" class="img-fluid" style="height: 200px;"></a>
		                  	<div class="col-md-12" style="padding: 0px;">
		                  		<a href="{{ route('products.show',[($product->categories_id ? App\Models\Categories::where('id',$product->categories_id)->first()->name : 'all'),$product->shop_id,$product->id]) }}" class="btn btn-info btn-xs pull-left" title="View product details" style="padding-top: 5px;">{{ $product->product_name }}</a>
		                  		<a title="Shop: {{ App\Models\Shop::where('id',$product->shop_id)->first()->shop_name }}" href="{{ route('shops.show',['all',$product->shop_id]) }}" class="btn btn-xs btn-info btn-raised pull-right">View Shop</a>
		                  	</div>
		                </div>
		            </div>
	            </div>
	        </div>
        @endforeach
    </div>
</div> <!-- container -->
@include('layouts.includes.footer')
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script>
	    $('#example23').DataTable({
	        dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
	    });
	</script>
@endsection