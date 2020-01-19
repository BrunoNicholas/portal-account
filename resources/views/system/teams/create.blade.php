@extends('layouts.site')
@section('title', 'Add Team')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Add Team</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('userhome') }}"><i class="fa fa-home"></i>Home</a></li>
				    	<li class="breadcrumb-item"><a href="{{ route('teams.index') }}"><i class="fa fa-users"></i>Teams</a></li>
				        <li class="breadcrumb-item active"><a href="javascript:void(0)"><i class="fa fa-plus"></i> New Team </a></li>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-7 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<div class="card">
						<div class="card-body">
							<form action="{{ route('teams.store') }}" class="form-horizontal form-bordered" method="post">

					            @csrf

					            @foreach ($errors->all() as $error)
					            	<p class="alert alert-danger">{{ $error }}</p>
					            @endforeach
					                    
					            <input type="hidden" name="_token" value="{{ csrf_token() }}">
					            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

					            <div class="form-body">
					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Team Name <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" name="team_name" autofocus required>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Major Team </label>
					                    <div class="col-md-9">
					                        <select class="form-control" name="team_id">
					                        	<option value="">Select major team</option>
					                        	@foreach($teams as $team)
					                        		<option value="{{ $team->id }}" title="{{ $team->description }}">{{ $team->team_name }}</option>
					                        	@endforeach
					                        </select>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Description </label>
					                    <div class="col-md-9">
					                        <textarea class="form-control" name="team_description"></textarea>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Account Status </label>
					                    <div class="col-md-9">
					                        <input type="radio" name="status" id="stat1" value="active"> <label for="stat1">Active </label>
					                        <input type="radio" name="status" id="stat2" value="not active"> <label for="stat2">Not Active </label>
					                        <input type="radio" name="status" id="stat3" value="busy"> <label for="stat3">Busy </label>
					                        <input type="radio" name="status" id="stat4" value="pending" checked> <label for="stat4">Pending </label>
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Team Members </label>
					                    <div class="col-md-9" style="max-height: 200px; overflow-y: auto;">
					                    	@foreach($users as $user)
					                    		<div class="form-check checkbox">
			                                        <label class="form-check-label">
					                    				<input type="checkbox" name="team_user[]" value="{{ $user->id }}"> {{ $user->name . ' | ' . $user->email }} <br>
					                    			</label>
					                    		</div>
					                    	@endforeach
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-2 col-form-label text-right"> Select Salon </label>
					                    <div class="col-md-10" style="max-height: 200px; overflow-y: auto;">
					                    	@foreach($salons as $salon)
					                    		<div class="form-check radio">
			                                        <label class="form-check-label">
					                    				<input type="radio" name="salon_id" value="{{ $salon->id }}" title="{{ $salon->salon_email }}"> {{ $salon->salon_name }}
					                    			</label>
					                    		</div>
					                    	@endforeach
					                    </div>
					                </div>

					                <div class="form-group row">
					                    <label class="col-md-3 col-form-label text-right"> Select Shop </label>
					                    <div class="col-md-9" style="max-height: 200px; overflow-y: auto;">
					                    	@foreach($shops as $shop)
					                    		<div class="form-check radio">
			                                        <label class="form-check-label">
					                    				<input type="radio" name="salon_id" value="{{ $shop->id }}"> {{ $shop->shop_name . ' | ' . $shop->shop_email }} <br>
					                    			</label>
					                    		</div>
					                    	@endforeach
					                    </div>
					                </div>
					            </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route ('home') }}" class="btn btn-info btn-sm pull-left" style="min-width: 150px;"> <i class="fa-angle-left fa"></i> Back</a>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <button type="submit" class="btn btn-primary btn-raised btn-sm pull-right" style="min-width: 150px;"> <i class="fa fa-check"></i>Create Team</button>
                                        </div>
                                    </div>
                                </div>
					        </form>
				        </div>
					</div>
	            </section>
	        </div>
	    </div>
	    <div class="col-lg-5 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<div class="card">
						<div class="card-body">


							<p>Please select only one of either the shop or salon. <br> If you select both, none will be taken for this selection.</p>

						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts') @endsection