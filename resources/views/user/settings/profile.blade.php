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
			                                            <button type="submit" class="btn btn-sm btn-raised btn-success" ><i class="fa-check fa"></i><small>change</small></button>
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
	            	<div class="row">
			            <div class="col-md-12 stretch-card">
							<div class="card">
								<section class="card-header card-primary text-center">
									<h1 class="card-title">{{ Auth::user()->name }} - Profile Configurations And Settings</h1>
								</section>
								<section class="card-body" style="overflow-x: auto;">
									<ul class="nav nav-tabs  shadow-2dp" role="tablist">
										<li class="nav-item">
											<a class="nav-link withoutripple active" href="#home"  aria-controls="home" role="tab" data-toggle="tab"><i class="zmdi zmdi-account"></i> <span class="d-none d-sm-inline">My Wall </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link withoutripple" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="zmdi zmdi-settings"></i> <span class="d-none d-sm-inline">Account Information </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link withoutripple" href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="zmdi zmdi-key"></i> <span class="d-none d-sm-inline">Change Password </span></a>
										</li>
									</ul>
									<div class="tab-content" for='tab-primary-example'>
										<div role="tabpanel" class="tab-pane fade active show" id="home">
											<div class="card">
												<div class="card-body">
													@foreach ($errors->all() as $error)
				                                        <p class="alert alert-danger">{{ $error }}</p>
				                                    @endforeach

				                                    @if (session('success'))
				                                        <div class="alert alert-success">
				                                            {{ session('success') }}
				                                        </div>
				                                    @endif
				                                    <div class="row">
				                                    	<div >
				                                    		<h4>{{ $user->name }} <small title="{{ App\Models\Role::where('name',$user->role)->first()->description }}"> - {{ $user->email . ' (' . $user->status . ') ' }} | {{ App\Models\Role::where('name',$user->role)->first()->display_name }}</small></h4>
				                                    	</div>
				                                    	<div class="col-12"><hr></div>
				                                    	<div class="col-md-6">
				                                    		<span><b>Date Joined:</b> {{ $user->created_at }}</span>
				                                    	</div>
				                                    	<div class="col-md-6">
				                                    		<span><b>Recent Update:</b> {{ $user->updated_at }}</span>
				                                    	</div>
				                                    </div>
				                                </div>
			                                </div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="profile">
											<div class="card">
												<div class="card-body">
													<form class="form-horizontal form-material" action="{{ route('users.update', $user->id) }}" method="POST">
					                                    @csrf
					                                    {{ method_field('PATCH') }}
					                                    @foreach ($errors->all() as $error)
					                                        <p class="alert alert-danger">{{ $error }}</p>
					                                    @endforeach

					                                    @if (session('success'))
					                                        <div class="alert alert-success">
					                                            {{ session('success') }}
					                                        </div>
					                                    @endif
					                                    <div class="form-group">
					                                        <label >Full Name <span class="text-danger">*</span></label>
					                                        <div >
					                                            <input type="text" placeholder="Full names" name="name" class="form-control form-control-line" value="{{ $user->name }}" required>
					                                        </div>
					                                    </div>
					                                    <input type="hidden" name="email" value="{{ $user->email }}">
					                                    <div class="form-group">
					                                        <label for="example-email" >Email</label>
					                                        <div >
					                                            <input type="email" placeholder="Working Email" class="form-control form-control-line" value="{{ $user->email }}" id="example-email" disabled title="Email can not be changed while logged in.">
					                                        </div>
					                                    </div>
					                                    <input type="hidden" name="router" value="profile">
					                                    <div class="form-group">
					                                        <label>Gender</label>
					                                        <div class="form-control">
					                                            <input type="radio" id="malef" value="Male" name="gender" @if ($user->gender == 'Male')
					                                                checked="checked" 
					                                            @endif>  <label for="malef"> Male </label>
					                                            <input type="radio" id="femalef" value="Female" name="gender" @if ($user->gender == 'Female')
					                                                checked="checked" 
					                                            @endif> <label for="femalef"> Female </label>
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label class="">Date Of Birth <span class="text-danger">*</span></label>
					                                        <div class="">
					                                            <input type="date" name="date_of_birth" placeholder="Date you were bord" class="form-control form-control-line" value="{{ $user->date_of_birth }}">
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label >Phone Number <span class="text-danger">*</span></label>
					                                        <div>
					                                            <input type="text" name="telephone" placeholder="Working phone number" class="form-control form-control-line" value="{{ $user->telephone }}">
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label>Work Address </label>
					                                        <div>
					                                            <input type="text" placeholder="Where you stay Currently" name="work_address" class="form-control form-control-line" value="{{ $user->work_address }}">
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label > Home Address </label>
					                                        <div>
					                                            <input type="text" placeholder="Your home address, where you currently live" name="home_address" class="form-control form-control-line" value="{{ $user->home_address }}">
					                                        </div>
					                                    </div>
					                                    <input type="hidden" name="role" value="{{ $user->role }}">
					                                    <div class="form-group">
					                                        <label >Nationality </label>
					                                        <div >
					                                            <input type="text" placeholder="The country where you're from" name="nationality" class="form-control form-control-line" value="{{ $user->nationality }}">
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label >Occupation </label>
					                                        <div >
					                                            <input type="text" placeholder="What you do for a living" name="occupation" class="form-control form-control-line" value="{{ $user->occupation }}">
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label >Place of work </label>
					                                        <div >
					                                            <input type="text" placeholder="Where  you officially work from" name="place_of_work" class="form-control form-control-line" value="{{ $user->place_of_work }}">
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label >Email Notifications </label>
					                                        <div class="form-control">
					                                            <input type="radio" id="rademail1" name="email_notifications" value="Yes" @if ($user->email_notifications == 'Yes')
					                                            	checked 
					                                            @endif> <label for="rademail1">Yes</label>
					                                            <input type="radio" id="rademail2" name="email_notifications" value="No" @if ($user->email_notifications == 'No')
					                                            	checked 
					                                            @endif> <label for="rademail2">No</label>
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label >Your Description (Bio)</label>
					                                        <div >
					                                            <textarea rows="5" class="form-control form-control-line" name="bio">{{ $user->bio }}</textarea>
					                                        </div>
					                                      </div>
					                                      <div class="form-group">
					                                        <label >Account Status </label>
					                                        <div >
					                                            <input type="radio" name="status" value="Active" checked> Active
					                                            <input type="radio" name="status" value="Busy"> Busy
					                                            <input type="radio" name="status" value="Inactive"> Inactive
					                                            <input type="radio" name="status" value="Blocked"> Blocked
					                                            <input type="radio" name="status" value="Not Active"> Not Active
					                                            <input type="radio" name="status" value="Available"> Available
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <div class="col-sm-12">
					                                            <button type="submit" class="btn btn-success btn-raised"><i class="fa-check fa"></i> Update Profile</button>
					                                        </div>
					                                    </div>
					                                </form>
					                            </div>
			                                </div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="messages">
											<div class="card">
												<div class="card-body">
													<form class="form-horizontal form-material" action="{{ route('password.update') }}" method="POST">
				                                        @csrf
				                                        {{-- method_field('PATCH') --}}
				                                        @foreach ($errors->all() as $error)
				                                            <p class="alert alert-danger">{{ $error }}</p>
				                                        @endforeach

				                                        @if (session('success'))
				                                            <div class="alert alert-success">
				                                                {{ session('success') }}
				                                            </div>
				                                        @endif
				                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
				                                        <div class="form-group">
				                                            <label for="prevpass">Previous Password <span class="text-danger">*</span></label>
				                                            <div>
				                                                <input type="password" id="prevpass" placeholder="Previously used password" name="previous_password" class="form-control form-control-line" required>
				                                            </div>
				                                        </div>
				                                        <br>
				                                        <div class="form-group">
				                                            <label>New Password <span class="text-danger">*</span></label>
				                                            <div>
				                                                <input type="password" placeholder="Enter new password" name="password" class="form-control form-control-line" required>
				                                            </div>
				                                        </div>
				                                        <div class="form-group">
				                                            <label>Confirm Password <span class="text-danger">*</span></label>
				                                            <div>
				                                                <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control form-control-line" required>
				                                            </div>
				                                        </div>
				                                        <div class="form-group">
				                                            <div class="">
				                                                <button type="submit" class="btn btn-danger btn-raised"><i class="fa-warning fa"></i> Update Account Password</button>
				                                            </div>
				                                        </div>
				                                    </form>
				                                </div>
			                                </div>
										</div>
									</div>
									{{-- more from user --}}
									<div class="card">
										<div class="card-header"></div>
										<div class="card-body"></div>
									</div>
								</section>
							</div>
						</div>
			        </div>

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