@extends('layouts.site')
@section('title', 'My Bookings')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px; text-transform: capitalize;">{{ $type }} Bookings</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li></li>
		                <li class="breadcrumb-item"><a href="{{ route('profile') }}"> <i class="fa fa-user"></i> Profile </a></li>
		                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-list"></i> Bookings </li>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-12 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section"><!-- {{ $i=8 }} -->
	            	<div class="col-lg-12 ms-paper-content-container" style="padding: 0px;">
						<ul class="nav nav-tabs  shadow-2dp" role="tablist">
							@for($a=1; $a <= $i; $a++)
							<li class="nav-item">
								<a class="nav-link withoutripple {{ $a == 1 ? 'active' : '' }}" href="{{ '#home' . $a . 'a' }}"  aria-controls="{{ '#home' . $a . 'a' }}" role="tab" data-toggle="tab"><i class="zmdi zmdi-male-female"></i> <span class="d-none d-sm-inline"> Shop {{ $a }} </span></a>
							</li>
							@endfor
						</ul>
						<div class="tab-content" for='tab-primary-example'>
							@for($b=1; $b<=$i; $b++)
							<div role="tabpanel" class="tab-pane fade {{ $b == 1 ? 'active show' : '' }}" id="{{ 'home' . $b . 'a' }}">
								<div class="card" style="min-height: 520px;">
									<div class="card-body">
										This is shop {{ $b }}



									</div>
								</div>
							</div>
							@endfor
						</div>
					</div>
	            </section>
	        </div>
	    </div>
	</div>
</div>
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