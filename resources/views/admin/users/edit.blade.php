@extends('layouts.site')
@section('title', 'Edit User')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Edit User Profile</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
			            <li class="breadcrumb-item"><a href="{{ route('userhome') }}"> <i class="fa fa-home"></i> Home</a></li>
			            <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
			            <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> <i class="fa fa-users"></i> System Users </a></li>
			            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-user"></i> Edit User Profile </li>
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
	            	<h4 class="section-title no-margin-top"><a href="{{ route('users.index') }}" title="Back to users"><i class="fa-angle-double-left fa"></i></a> | Edit {{ $user->name }} Details </h4>
	            	<div class="card">
						<div class="card-heading text-center">
							<h4>Edit User Profile </h4>
						</div>
						<div class="card-body">
							<form action="{{ route('users.update', $user->id) }}" class="form-horizontal form-bordered" method="post">

					            @csrf
					            {{ method_field('PATCH') }}

					            @foreach ($errors->all() as $error)
					            	<p class="alert alert-danger">{{ $error }}</p>
					            @endforeach
					                    
					            <input type="hidden" name="_token" value="{{ csrf_token() }}">

					            <div class="form-body">
					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Full Names <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Email <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-9">
					                        <input type="email" class="form-control" value="{{ $user->email }}" name="email" required>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Gender </label>
					                    <div class="col-md-9">
					                        <input type="radio" value="Male" name="gender" id="gMale" @if ($user->gender == 'Male')
					                        	checked 
					                        @endif> <label for="gMale">Male </label>
					                        <input type="radio" value="Female" name="gender" id="gFemale" @if ($user->gender == 'Female')
					                        	checked 
					                        @endif> <label for="gFemale">Female </label>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Date Of Birth </label>
					                    <div class="col-md-9">
					                        <input type="date" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}">
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Telephone Number </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="telephone" value="{{ $user->telephone }}">
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Nationality </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="nationality" value="{{ $user->nationality }}">
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Occupation </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="occupation" value="{{ $user->occupation }}">
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Place of work </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="place_of_work" value="{{ $user->place_of_work }}">
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Previllage <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-9">
			                                <select class="form-control custom-select" name="role">
			                                    <option  value="{{ $user->role }}">Please select</option>
			                                    @foreach($roles as $role)
			                                        <option value="{{ $role->name }}"><b>{{  $role->display_name . ' - ' . $role->description }}</b></option>
			                                    @endforeach
			                                </select>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Work Address </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="work_address" value="{{ $user->work_address }}">
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Home Address </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="home_address" value="{{ $user->home_address }}">
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> User Bio </label>
					                    <div class="col-md-9">
					                        <textarea class="form-control" name="bio">{{ $user->name }}</textarea>
					                    </div>
					                </div>
					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Account Status </label>
					                    <div class="col-md-9">
					                        <input type="radio" name="status" id="stat1" value="active" @if ($user->status == 'active')
					                        	checked 
					                        @endif> <label for="stat1">Active </label>
					                        <input type="radio" name="status" id="stat2" value="not active" @if ($user->status == 'not active')
					                        	checked 
					                        @endif> <label for="stat2">Not Active </label>
					                        <input type="radio" name="status" id="stat3" value="available" @if ($user->status == 'available')
					                        	checked 
					                        @endif> <label for="stat3">Available </label>
					                        <input type="radio" name="status" id="stat4" value="pending" @if ($user->status == 'pending')
					                        	checked 
					                        @endif> <label for="stat4">Pending </label>
					                        <input type="radio" name="status" id="stat5" value="blocked" @if ($user->status == 'blocked')
					                        	checked 
					                        @endif> <label for="stat5">Blocked </label>
					                    </div>
					                </div>
					            </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route ('users.index') }}" class="btn btn-info btn-sm pull-left" style="min-width: 150px;"> <i class="fa-angle-left fa"></i> Back</a>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <button type="submit" class="btn btn-success btn-sm pull-right" style="min-width: 150px;"> <i class="fa fa-check"></i>Update User</button>
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
	            	<h4 class="section-title no-margin-top text-center"> Information To Note </h4>
	            	<div class="card">
						<div class="card-body">
							<p>It is recommended that you make the role of the new user as a client without many privileges</p>

						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts') @endsection