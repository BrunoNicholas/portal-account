@extends('layouts.site')
@section('title', 'Compose Message')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Compase Message</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
				            <li class="breadcrumb-item"><a href="{{ route('profile') }}"> <i class="fa fa-user"></i> Profile </a></li>
				            <li class="breadcrumb-item"><a href="{{ route('messages.index','inbox') }}">  <i class="fa fa-envelope"></i> Messages </a></li>
				            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Create Message </li>
				        </ol>
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
@section('scripts') @endsection