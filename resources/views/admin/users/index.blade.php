@extends('layouts.site')
@section('title', 'Users')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">System Users
				</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
			            <li class="breadcrumb-item"><a href="{{ route('userhome') }}"> <i class="fa fa-home"></i> Home</a></li>
		                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
		                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-users"></i> System Users </li>
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
		            <h4 class="section-title no-margin-top">Manage the system users | <a href="{{ route('users.create') }}" class="btn btn-sm btn-info"> <i class="fa-plus fa"></i> New User </a></h4>
		            <div class="card box-v4">
		                <div class="card-body">
		                    <div class="table-responsive">
		                        <table id="example23" class="table table-striped table-bordered table-hoverable" width="100%" cellspacing="0">
		                            <thead>
		                                <tr>
		                                    <th class="text-center;" style="vertical-align: middle; min-width: 50px;">#</th>
		                                    <th class="text-center;" style="vertical-align: middle; min-width: 50px;">Name</th>
		                                    <th class="text-center;" style="vertical-align: middle; min-width: 50px;">Email</th>
		                                    <th class="text-center;" style="vertical-align: middle; min-width: 50px;">Privillege</th>
		                                    <th class="text-center;" style="vertical-align: middle; min-width: 50px;">Status</th>
		                                    <th class="text-center;" style="vertical-align: middle; min-width: 50px;">Actions</th>

		                                    <th style="vertical-align: middle; min-width: 100px;">Multi Account</th>
		                                    <th style="vertical-align: middle;">Salons</th>
		                                    <th style="vertical-align: middle;">Shops</th>
		                                    <th style="vertical-align: middle;">Bookings</th>
		                                    <th style="vertical-align: middle;">Orders</th>
		                                    <th style="vertical-align: middle;">Posts</th>
		                                    <th style="vertical-align: middle;">Questions</th>
		                                    <th style="vertical-align: middle;">Reviews</th>
		                                    <th style="vertical-align: middle;">Ratings</th>
		                                    <th style="vertical-align: middle;">Galleries</th>
		                                    <th style="vertical-align: middle;">Images</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $i=0; ?>
		                                @foreach($users as $user)
		                                    <tr>
		                                        <td class="text-center">{{ ++$i }}</td>
		                                        <td style="min-width: 150px; text-align: right;">
	                                                {{ $user->name }} <img src="{{ $user->profile_image ? asset('files/profile/images/' . $user->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 40%;"></td>
		                                        <td class="text-left;">{{ $user->email }}</td>
		                                        <td class="text-center;" style="min-width: 150px;">{{ $user->role ? App\Models\Role::where('name',$user->role)->get()->first()->display_name : 'Hacker Account' }}</td>
		                                        <td class="text-center;" style="text-transform: capitalize; min-width:150px;">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</td>
		                                        <td style="min-width: 120px;">
		                                        	<div class="row text-center" style="margin-left: 3px;">
			                                            <a href="{{ route('users.show', $user->id) }}" class="col-5 btn btn-sm btn-success" title="User Details" style="margin: 2px;"><i class="fa fa-info-circle"></i></a>
			                                            <a href="{{ route('users.edit', $user->id) }}" class=" col-5 btn btn-sm btn-primary" style="margin: 2px;"><i class="fa fa-edit" title="Edit User Profile"></i></a>
			                                        </div>
		                                        </td>
		                                        <td class="text-center"> {{ sizeof($user->companies) > 0 ? 'Yes' : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->salons) > 0 ? $user->salons->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->shops) > 0 ? $user->shops->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->bookings) > 0 ? $user->bookings->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->orders) > 0 ? $user->orders->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->posts) > 0 ? $user->posts->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->questions) > 0 ? $user->questions->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->reviews) > 0 ? $user->reviews->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->ratings) > 0 ? $user->ratings->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->galleries) > 0 ? $user->galleries->count() : '' }} </td>
		                                        <td class="text-center"> {{ sizeof($user->images) > 0 ? $user->images->count() : '' }} </td>
		                                    </tr>
		                                @endforeach
		                            </tbody>
		                        </table>
		                        {{ $users->links() }}
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