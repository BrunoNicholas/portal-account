@extends('layouts.site')
@section('title', 'Users')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">System Users
				</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <ol class="breadcrumb">
				            <li class="breadcrumb-item"><a href="{{ route('userhome') }}"> <i class="fa fa-home"></i> Home</a></li>
			                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
			                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-users"></i> System Users </li>
				        </ol>
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
		            <div class="panel box-v4">
		                <div class="panel-body">
		                    <div class="responsive-table">
		                        <table id="example" class="table table-striped table-bordered table-hoverable" width="100%" cellspacing="0">
		                            <thead>
		                                <tr>
		                                    <th class="text-center;">#</th>
		                                    <th class="text-left;">Name</th>
		                                    <th class="text-left;">Email</th>
		                                    <th class="text-left;">Privillege</th>
		                                    <th class="text-left;">Status</th>
		                                    <th class="text-center;">Actions</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $i=0; ?>
		                                @foreach($users as $user)
		                                    <tr>
		                                        <td>{{ ++$i }}</td>
		                                        <td style="min-width: 150px; text-align: right;">
	                                                {{ $user->name }} <img src="{{ $user->profile_image ? asset('files/profile/images/' . $user->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 40%;"></td>
		                                        <td class="text-left;">{{ $user->email }}</td>
		                                        <td class="text-left;">{{ $user->role ? App\Models\Role::where('name',$user->role)->get()->first()->display_name : 'Hacker Account' }}</td>
		                                        <td class="text-left;" style="text-transform: capitalize;">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</td>
		                                        <td style="min-width: 150px;">
		                                        	<div class="row text-center" style="margin-left: 3px;">
			                                            <a href="{{ route('users.show', $user->id) }}" class="col-5 btn btn-sm btn-success" title="User Details" style="margin: 2px;"><i class="fa fa-info-circle"></i></a>
			                                            <a href="{{ route('users.edit', $user->id) }}" class=" col-5 btn btn-sm btn-primary" style="margin: 2px;"><i class="fa fa-edit" title="Edit User Profile"></i></a>
			                                        </div>
		                                        </td>
		                                    </tr>
		                                @endforeach
		                            </tbody>
		                            {{ $users->links() }}
		                        </table>
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