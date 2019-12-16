@extends('layouts.site')
@section('title', 'Edit Image Details')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Edit Image Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
		                <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}"> <i class="fa fa-image"></i> Galleries </a></li>
		                <li class="breadcrumb-item"><a href="{{ route('images.index') }}"> <i class="fa fa-image"></i> Images </a></li>
		                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-edit"></i> Edit Image </li>
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


	            </section>
	        </div>
	    </div>
	</div>
</div>
@endsection
@section('scripts') @endsection