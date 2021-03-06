@extends('layouts.site')
@section('title', 'Update Team')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Edit Team</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
				    	<li><a href="{{ route('users.index') }}"><i class="fa fa-users text-primary"></i>Users</a></li>
				    	<li><a href="{{ route('teams.index') }}"><i class="fa fa-users text-primary"></i>Teams</a></li>
				        <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus"></i> Add Team </a></li>
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