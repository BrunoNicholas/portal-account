@extends('layouts.site')
@section('title', 'Role Details')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Role Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('userhome') }}"> <i class="fa fa-home"></i> Home</a></li>
				            <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
				            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> <i class="fa fa-user-plus"></i> User Roles </a></li>
				            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Role Details </li>
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
	            	<h4 class="section-title no-margin-top"> Role Details</h4>
	            	<div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            	<table class="table m-b-0 text-left">
                            		<thead>
		                                <tr>
		                                    <th style="text-align: center;" scope="col">#</th>
		                                    <th style="text-align: center;" scope="col">Attribute</th>
		                                    <th style="text-align: center;" scope="col">Value</th>
		                                    <th style="text-align: center;" scope="col">Relevance</th>
		                                </tr>
		                            </thead>
		                            <?php $i=0; ?>
		                            <tbody>
		                                @if($role->name)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Database Names</td>
		                                        <td style="text-align: center;">{{ $role->name }}</td>
		                                        <td>Required</td>
		                                    </tr>
		                                @endif
		                                @if($role->display_name)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Display Name</td>
		                                        <td style="text-align: center;">{{ $role->display_name }}</td>
		                                        <td>Not Required</td>
		                                    </tr>
		                                @endif
		                                @if($role->description)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Description</td>
		                                        <td style="text-align: center;">{{ $role->description }}</td>
		                                        <td>Not Required</td>
		                                    </tr>
		                                @endif
		                            </tbody>

                            	</table>
                            </div>
                        </div>
                    </div>
	            </section>
	        </div>
	    </div>
		<div class="col-lg-4 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<h4 class="section-title no-margin-top"> Options | {{ config('app.name') }}</h4>
	            	<div class="card">
	            		<div class="card-body">
	            			<div class="row text-center">
		                        <div class="col-md-6">
		                            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
		                        </div>
		                        <div class="col-md-6">
		                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
		                                {{ csrf_field() }}
		                                {{ method_field('DELETE') }}
		                                <div class="tools">
		                                    <button type="submit" class="btn btn-danger btn-rounded btn-block"
		                                        @if(Auth::user()->role != 'super-admin') disabled @endif onclick="return confirm('You are about to delete!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
		                                </div>
		                            </form>
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