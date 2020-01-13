@extends('layouts.site')
@section('title', 'Add Booking')
@section('styles') @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Book for salon services</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
		            	<li class="breadcrumb-item"><a href="{{ route('userhome') }}" class=""><i class="fa fa-home "></i> Home</a></li>
						<li class="breadcrumb-item active "><i class="fa fa-address-book-o "></i> Search to book/reserve </li>
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
	            <section class="ms-component-section">
	            	<h4 class="section-title no-margin-top"> </h4>
	            	<div class="card">
	            		<div class="card-body">
	            			<h5 class="color-info">Feature still under developement</h5>
	            		</div>
	            	</div>
	            </section>
	        </div>
	    </div>
	</div>
</div>
@endsection
@section('scripts') @endsection