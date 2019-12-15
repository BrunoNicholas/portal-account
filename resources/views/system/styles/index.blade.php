@extends('layouts.site')
@section('title', $type . ' Styles')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('navigator')
	<div class="ms-hero-page ms-hero-img-city2 ms-hero-bg-info mb-6" style="padding: 0px;">
	    <div class="text-center color-white mt-0 mb-0 index-1" style="padding-top: 5px;">
	        <h2>Styles &amp; Designs</h2>
	      	<p class="lead lead-lg" style="text-transform: capitalize;"> {{ $type }} - Fashion Styles &amp; Designs
	            <ol class="breadcrumb d-flex justify-content-center" style="height: 40px;">
	            	<li class="breadcrumb-item"><a href="{{ route('userhome') }}" class="text-white"><i class="fa fa-home text-white"></i> Home</a></li>
	            	<li class="breadcrumb-item"><a href="{{ route('salons.index','all') }}" class="text-white"><i class="fa fa-address-book-o text-white"></i> User Salons </a></li>
					<li class="breadcrumb-item active text-white"><i class="zmdi zmdi-male-female text-white"></i> Fashion Styles</li>
	            </ol>
	        </p>
	      	<a href="{{ route('salons.index','all') }}" class="btn btn-raised btn-white color-info"><i class="zmdi zmdi-male-female"></i> All Salons </a>
	    </div>
	</div>
@endsection
@section('content')
<div class="container mt-6">
    <div class="text-center">
    <h2 class="color-primary">Salon fashion styles and designs by categories</h2>
      	<p class="lead"> Limited Category View  </p>
    </div>
    <div class="mw-800 center-block">
      	<ul class="nav nav-tabs nav-tabs-transparent nav-tabs-full nav-tabs-4" role="tablist">
            <li class="nav-item wow fadeInDown animation-delay-6 col-3" role="presentation">
            	<a href="#windows" aria-controls="windows" role="tab" data-toggle="tab" class="nav-link withoutripple">
            		<i class="fa-child fa"></i> 
            		<span class="d-none d-sm-inline">Children</span>
            	</a>
            </li>
            <li class="nav-item wow fadeInDown animation-delay-4 col-3" role="presentation">
            	<a href="#macos" aria-controls="macos" role="tab" data-toggle="tab" class="nav-link withoutripple active">
            		<i class="zmdi zmdi-male"></i> 
            		<span class="d-none d-sm-inline">Male</span>
            	</a>
            </li>
            <li class="nav-item wow fadeInDown animation-delay-2 col-3" role="presentation">
            	<a href="#linux" aria-controls="linux" role="tab" data-toggle="tab" class="nav-link withoutripple">
            		<i class="zmdi zmdi-female"></i> 
            		<span class="d-none d-sm-inline">Female</span>
            	</a>
            </li>
            <li class="nav-item wow fadeInDown animation-delay-0 col-3" role="presentation">
            	<a href="#othercats" aria-controls="othercats" role="tab" data-toggle="tab" class="nav-link withoutripple">
            		<i class="zmdi zmdi-male-female"></i> 
            		<span class="d-none d-sm-inline">Others</span>
            	</a>
            </li>
        </ul>
    </div>
    <div class="panel-body">
      	<!-- Tab panes -->
      	<div class="tab-content mt-4">
            <div role="tabpanel" class="tab-pane fade" id="windows">
	            <div class="row">
                    


	            </div>
            </div>
            <div role="tabpanel" class="tab-pane active show fade" id="macos">
	            <div class="row">
                    @foreach($styles as $style)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card wow zoomIn">
                                <div class="ms-thumbnail card-body p-05">
                                    <div class="withripple zoom-img">
                                        <a href="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" data-lightbox="gallery" data-title="{{ $style->style_name }}"><img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" class="img-fluid" style="height: 200px;"></a>
                                        <div class="col-md-12" style="padding: 0px;">
                                            <a href="{{ route('styles.show',[($style->categories_id ? App\Models\Categories::where('id',$style->categories_id)->first()->name : 'all'),$style->salon_id,$style->id]) }}" class="btn btn-info btn-xs pull-left" title="View style details" style="padding-top: 5px;">{{ $style->style_name }}</a>
                                            <a title="Salon: {{ App\Models\Salon::where('id',$style->salon_id)->first()->salon_name }}" href="{{ route('salons.show',['all',$style->salon_id]) }}" class="btn btn-xs btn-info btn-raised pull-right">View Salon</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach	                
	            </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="linux">
	            <div class="row">
	                


	            </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="othercats">
	            <div class="row">
	                <div class="col-lg-6 col-xl-5 order-lg-2">
	                  	


		            </div>
		        </div>
		    </div>
        </div>
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