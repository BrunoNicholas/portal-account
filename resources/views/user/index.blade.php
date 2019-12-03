@extends('layouts.site')
@section('title') {{ Auth::user()->name }} | Settings @endsection
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;"> My Settings</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="@role(['super-admin','admin']) {{ route('userhome') }} @else {{ route('home') }} @endrole"> <i class="fa fa-home"></i> Home</a></li>
			            <li class="breadcrumb-item"><a href="{{ route('profile') }}"> <i class="fa fa-user-plus"></i> My Profile </a></li>
			            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-gear"></i> My Timeline </li>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container mt-6" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-12 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">


	            </section>
	        </div>
	    </div>
	</div>
</div>
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