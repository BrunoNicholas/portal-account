@extends('layouts.site')
@section('title') {{ Auth::user()->name }} | My Profile @endsection
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">My Profile</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="@role(['super-admin','admin']) {{ route('userhome') }} @else {{ route('home') }} @endrole"> <i class="fa fa-home"></i> Home</a></li>
			            @role(['super-admin','admin'])
			            <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
			            <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> <i class="fa fa-users"></i> System Users </a></li>
			            @endrole
			            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-user"></i> User Profile Details </li>
			        </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-4 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<div class="card d-flex flex-column">
			            <div class="col-md-12 flex-grow-1">
			            	<div class="row">	
				                <div class="col-md-10 offset-md-1 d-flex align-item-center flex-column text-center">
				                    <div class="w-100" style="padding-top: 20px;">
				                        <img src="{{ Auth::user()->profile_image ? asset('files/profile/images/'. Auth::user()->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="profile image" style="width: 200px; border-radius: 3px;">
				                    </div>
				                    <h2 class="mdc-card__title mdc-card__title--large text-center mt-2 mb-2" style="margin:10px;">
				                        {{ Auth::user()->name }} <br>
				                        <small>
					                        <small style="text-transform: capitalize;">
					                            {{ Auth::user()->role ? App\Models\Role::where('name',Auth::user()->role)->first()->display_name : 'No User Category' }} | {{ Auth::user()->status }}
					                        </small>
					                    </small>
				                    </h2>
				                    <div class="card-title text-center mt-2 mb-2">
				                    	<span>Update Profile Image</span>
				                    	<form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
			                                @csrf
			                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
			                                <div class="row">
			                                    <div class="row">
			                                        <div class="col-6">
			                                            <input type="file" class="btn btn-xs btn-raised btn-info" name="profile_image" accept=".jpg, .png, .jpeg">
			                                        </div>
			                                        <div class="col-6">
			                                            <button type="submit" class="btn btn-sm btn-raised btn-success" ><i class="fa-check fa"></i></button>
			                                        </div>
			                                    </div>
			                                </div>
			                            </form>
				                    </div>
				                </div>
				            </div>
			            </div>
		                <div class="card-footer stretch-card col-md-12">
		                    <section class="mdc-card__action-footer mt-4 bg-red w-100" style="margin: 0px;">
		                        <div class="col mdc-button" data-mdc-auto-init="MDCRipple" title="My Profile Settings" onclick="window.location='{{ route('profile') }}'">
		                            <i class="mdi mdi-account-convert icon-md"></i>
		                        </div>
		                        <div class="col mdc-button" data-mdc-auto-init="MDCRipple" title="My messages inbox" onclick="window.location='{{ route('messages.index','inbox') }}'">
		                            <i class="mdi mdi-comment-multiple-outline icon-md"></i>
		                        </div>
		                        <div class="col mdc-button" data-mdc-auto-init="MDCRipple" title="Questions" onclick="window.location='{{ route('questions.index') }}'">
		                            <i class="mdi mdi-help-circle-outline icon-md"></i>
		                        </div>
		                        <div class="col mdc-button" data-mdc-auto-init="MDCRipple" title="Content Posts!" onclick="window.location='{{ route('posts.index') }}'">
		                            <i class="mdi mdi-autorenew icon-md"></i>
		                        </div>
		                    </section>
		                </div>
			        </div>

	            </section>
	        </div>
	    </div>
		<div class="col-lg-8 ms-paper-content-container">
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