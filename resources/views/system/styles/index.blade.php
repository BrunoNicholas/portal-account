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
          <h2 class="color-primary">Knows the <span class="text-normal">Material Style</span> and surprise yourself</h2>
          <p class="lead">Put here a short description or brief highlights in your app.</p>
        </div>
        <div class="mw-800 center-block">
          <ul class="nav nav-tabs nav-tabs-transparent indicator-primary nav-tabs-full nav-tabs-3" role="tablist">
            <li class="nav-item wow fadeInDown animation-delay-6" role="presentation"><a href="#windows" aria-controls="windows" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-windows"></i> <span class="d-none d-sm-inline">Windows</span></a></li>
            <li class="nav-item wow fadeInDown animation-delay-4" role="presentation"><a href="#macos" aria-controls="macos" role="tab" data-toggle="tab" class="nav-link withoutripple active"><i class="zmdi zmdi-apple"></i> <span class="d-none d-sm-inline">MacOS</span></a></li>
            <li class="nav-item wow fadeInDown animation-delay-2" role="presentation"><a href="#linux" aria-controls="linux" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="fa fa-linux"></i> <span class="d-none d-sm-inline">Linux</span></a></li>
          </ul>
        </div>
        <div class="panel-body">
          <!-- Tab panes -->
          <div class="tab-content mt-4">
            <div role="tabpanel" class="tab-pane fade" id="windows">
              <div class="row">
                <div class="col-lg-6 col-xl-5 order-lg-2">
                  <ul class="list-unstyled hand-list">
                    <li class="animated fadeInLeft animation-delay-2">
                      <h2 class="handwriting no-mt color-primary no-mb">Ideas for your product</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum sapiente.</p>
                    </li>
                    <li class="animated fadeInLeft animation-delay-4">
                      <h2 class="handwriting no-mt color-primary no-mb">Type here annotations</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum sapiente.</p>
                    </li>
                    <li class="animated fadeInLeft animation-delay-6">
                      <h2 class="handwriting no-mt color-primary no-mb">An informal approach to design</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum.</p>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6 col-xl-7 order-lg-1">
                  <img class="img-fluid animated zoomInDown animation-delay-3" src="{{ asset('assets/img/demo/surface.png') }}">
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane active show fade" id="macos">
              <div class="row">
                <div class="col-lg-6 col-xl-5">
                  <ul class="list-unstyled hand-list">
                    <li class="wow fadeInLeft animation-delay-2">
                      <h2 class="handwriting no-mt color-primary no-mb">Ideas for your product</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum sapiente.</p>
                    </li>
                    <li class="wow fadeInLeft animation-delay-4">
                      <h2 class="handwriting no-mt color-primary no-mb">Type here annotations</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum sapiente.</p>
                    </li>
                    <li class="wow fadeInLeft animation-delay-6">
                      <h2 class="handwriting no-mt color-primary no-mb">An informal approach to design</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum.</p>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6 col-xl-7">
                  <img class="img-fluid animated zoomInDown animation-delay-3" src="{{ asset('assets/img/demo/new_mac.png') }}">
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="linux">
              <div class="row">
                <div class="col-lg-6 col-xl-5 order-lg-2">
                  <ul class="list-unstyled hand-list">
                    <li class="animated fadeInLeft animation-delay-2">
                      <h2 class="handwriting no-mt color-primary no-mb">Ideas for your product</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum sapiente.</p>
                    </li>
                    <li class="animated fadeInLeft animation-delay-4">
                      <h2 class="handwriting no-mt color-primary no-mb">Type here annotations</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum sapiente.</p>
                    </li>
                    <li class="animated fadeInLeft animation-delay-6">
                      <h2 class="handwriting no-mt color-primary no-mb">An informal approach to design</h2>
                      <p class="lead handwriting">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident tempore porro deserunt nostrum.</p>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6 col-xl-7 order-lg-1">
                  <img class="img-fluid animated zoomInDown animation-delay-3" src="{{ asset('assets/img/demo/ubuntu_tablet.png') }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- container -->
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