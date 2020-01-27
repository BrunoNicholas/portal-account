@extends('layouts.site')
@section('title', 'Edit Role')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Edit Role</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
		                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
		                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> <i class="fa fa-user-plus"></i> User Roles </a></li>
		                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Edit Role </li>
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
	            	<h4 class="section-title no-margin-top">Edit {{ $role->name }} Details </h4> </h4>
	            	<div class="card">
						<div class="card-heading">
						</div>
						<div class="card-body" style="overflow-y: auto;">
							<form action="{{ route('roles.update', $role->id) }}" class="form-horizontal form-bordered" method="post">

					            {{ csrf_field() }}
					            {{ method_field('PATCH') }}

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
					                    <label class="col-lg-3 col-form-label text-right"> Name <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-lg-9">
					                        <input type="text" class="form-control" name="name" value="{{ $role->name }}" autofocus required>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-lg-3 col-form-label text-right"> Display Name </label>
					                    <div class="col-lg-9">
					                        <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}" required>
					                    </div>
					                </div>							                

					                <div class="form-group row">
					                    <label class="col-lg-3 col-form-label"> Description </label>
					                    <div class="col-lg-9">
					                    	<textarea class="form-control" rows="3" name="description">{{ $role->description }}</textarea>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-lg-3 col-form-label"> Permissions <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-lg-8" style="max-height: 200px; overflow-y: auto;">
					                    	@foreach($permissions as $perm)
					                    		<div class="form-check checkbox">
			                                        <label class="form-check-label">
								                    	<input type="checkbox" class="form-check-input" 
								                    		{{ in_array($perm->id, $permission_role)?"checked":"" }}
								                    		name="permission[]" value="{{ $perm->id }}"> {{ $perm->display_name }} <br>
								                    </label>
								                </div>
					                    	@endforeach
					                    </div>
					                </div>
					            </div>    
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;">
                                            <div class="row">
                                                <div class="offset-sm-3 col-md-9">
                                                    <button type="submit" class="btn btn-info" style="min-width: 150px;"> <i class="fa fa-pencil"></i>Update Role</button>
                                                    <a href="{{ route ('roles.index') }}" class="btn btn-success" style="min-width: 150px;">Back</a>
                                                </div>
                                            </div>
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
	            	<h4 class="section-title no-margin-top">Roles &amp; Options </h4>
	            	<div class="card">
			            <div class="card-body">
				            <div class="row text-center">
				                <div class="col-6">
				                    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-block"> Back </a>
				                </div>
				                <div class="col-6">
				                    <a href="{{ route('admin') }}" class="btn btn-primary btn-block"> Admin </a>
				                </div>
				            </div>
				        </div>
					</div>
	            </section>
	        </div>
	    </div>
	</div>
</div>
@endsection
@section('scripts') @endsection