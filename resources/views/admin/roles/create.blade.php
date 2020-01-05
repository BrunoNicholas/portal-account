@extends('layouts.site')
@section('title', 'Create Role')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Add Role</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('userhome') }}"> <i class="fa fa-home"></i> Home</a></li>
			                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
			                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> <i class="fa fa-user-plus"></i> User Roles </a></li>
			                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Add Role </li>
				        </ol>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="card card-body container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-8 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<h4 class="section-title no-margin-top"><a href="{{ route('roles.index') }}" title="Back to users"><i class="fa-angle-double-left fa"></i></a> | New Role </h4>
	            	<div class="card">
						<div class="card-body">
							<form action="{{ route('roles.store') }}" class="form-horizontal form-bordered" method="post">
					            @csrf

					            @foreach ($errors->all() as $error)
					            <p class="alert alert-danger">{{ $error }}</p>
					            @endforeach

					            @if (session('success'))
						            <div class="alert alert-success">
						            	{{ session('success') }}
						            </div>
					            @endif
					                    
					            <input type="hidden" name="_token" value="{{ csrf_token() }}">

					            <div class="form-body">
					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Name <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="name" autofocus required>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Display Name </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="display_name">
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Description </label>
					                    <div class="col-md-9">
					                    	<textarea class="form-control" name="description"></textarea>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Permissions <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-9" style="max-height: 200px; overflow-y: auto;">
					                    	@foreach($permissions as $perm)
					                    		<div class="form-check checkbox">
			                                        <label class="form-check-label">
					                    				<input type="checkbox" name="permission[]" value="{{ $perm->id }}"> {{ $perm->display_name }} <br>
					                    			</label>
					                    		</div>
					                    	@endforeach
					                    </div>
					                </div>
					            </div>    
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route ('roles.index') }}" class="btn btn-info btn-sm pull-left" style="min-width: 150px;"> <i class="fa-angle-left fa"></i> Back</a>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <button type="submit" class="btn btn-danger btn-sm pull-right" style="min-width: 150px;"> <i class="fa fa-check"></i>Save Role</button>
                                        </div>
                                    </div>
                                </div>
					        </form>
						</div>
					</div>
	            </section>
	        </div>
	    </div>
	    <div class="col-lg-4 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<h4 class="section-title no-margin-top text-center"> Information </h4>
	            	<div class="card">
						<div class="card-body">
							<span>Please select roles carefully to avoid messing the system up</span>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts') @endsection