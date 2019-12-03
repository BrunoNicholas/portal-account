@extends('layouts.site')
@section('title', 'Administrator')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Administrator - Control Panel</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-dashboard"></i> Administrator </li>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-12 ms-paper-content-container">
			<div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 pt-1" onclick="window.location='{{ route('users.index') }}'">
                    <div class="panel panel-body text-center">
                    	<div class="row pl-2 text-success">                    	
                        	<i class="fa fa-4x fa-group primary-color text-success text-center col-4" style="padding-top: 20px;"></i>
	                        <div class="col-8">
		                        <h2>
		                        	<b class="counter">{{ App\User::where('status', 'active')->get()->count() }}</b>
		                        	<small style="font-size: 15px;"> / <b class="counter">{{ count($users) }}</b></small>
		                        </h2>
		                        <p class="mt-2 no-mb lead small-caps">system users</p>
		                    </div>
		                </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 pt-1" onclick="window.location='{{ route('companies.index') }}'">
                    <div class="panel panel-body text-center">
                    	<div class="row pl-2 text-warning">                    	
                        	<i class="fa fa-4x fa-id-card-o primary-color text-warning text-center col-4" style="padding-top: 20px;"></i>
	                        <div class="col-8">
		                        <h2>
		                        	<b class="counter">{{ App\Models\Company::where('status', 'active')->get()->count() }}</b>
		                        	<small style="font-size: 15px;"> / <b class="counter">{{ count($companies) }}</b></small>
		                        </h2>
		                        <p class="mt-2 no-mb lead small-caps">companies</p>
		                    </div>
		                </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 pt-1" onclick="window.location='{{ route('salons.index') }}'">
                    <div class="panel panel-body text-center">
                    	<div class="row pl-2 text-info">                    	
                        	<i class="fa fa-4x fa-address-book primary-color text-info text-center col-4" style="padding-top: 20px;"></i>
	                        <div class="col-8">
		                        <h2>
		                        	<b class="counter">{{ App\Models\Salon::where('status', 'active')->get()->count() }}</b>
		                        	<small style="font-size: 15px;"> / <b class="counter">{{ count($salons) }}</b></small>
		                        </h2>
		                        <p class="mt-2 no-mb lead small-caps">salons &amp; spas</p>
		                    </div>
		                </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 pt-1" onclick="window.location='{{ route('shops.index') }}'">
                    <div class="panel panel-body text-center">
                    	<div class="row pl-2 text-danger">                    	
                        	<i class="fa fa-4x fa-address-card primary-color text-danger text-center col-4" style="padding-top: 20px;"></i>
	                        <div class="col-8">
		                        <h2>
		                        	<b class="counter">{{ App\Models\Shop::where('status', 'active')->get()->count() }}</b>
		                        	<small style="font-size: 15px;"> / <b class="counter">{{ count($shops) }}</b></small>
		                        </h2>
		                        <p class="mt-2 no-mb lead small-caps">shops</p>
		                    </div>
		                </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-lg-9 ms-paper-content-container">
	        <div class="ms-paper-content">
	            <section class="ms-component-section">
		            <h4 class="section-title no-margin-top">Manage the system users, roles, salons and more!</h4>
		            <div class="card">
		                <!-- Nav tabs -->
		                <ul class="nav nav-tabs  shadow-2dp" role="tablist">
		                    <li class="nav-item"><a class="nav-link withoutripple active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="zmdi zmdi-accounts"></i> <span class="d-none d-sm-inline">System Users</span></a></li>
		                    <li class="nav-item"><a class="nav-link withoutripple" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="zmdi zmdi-accounts-alt"></i> <span class="d-none d-sm-inline">User Roles</span></a></li>
		                    <li class="nav-item"><a class="nav-link withoutripple" href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="zmdi zmdi-sort-amount-desc"></i> <span class="d-none d-sm-inline">Questions</span></a></li>
		                    <li class="nav-item"><a class="nav-link withoutripple" href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="zmdi zmdi-settings"></i> <span class="d-none d-sm-inline">Settings</span></a></li>
		                </ul>
		                <div class="card-body">
		                    <!-- Tab panes -->
		                    <div class="tab-content">
		                        <div role="tabpanel" class="tab-pane fade active show" id="home">
		                        	<div class="table-responsive">
			                          	<table class="table table-hoverable">
			                                <thead>
			                                    <tr>
			                                        <th>#</th>
			                                        <th class="text-left">Full Names</th>
			                                        <th class="text-left">Email</th>
			                                        <th class="text-left">System Role</th>
			                                        <th class="text-left">Telephone</th>
			                                        <th class="text-center">Status</th>
			                                        <th class="text-center">Actions</th>
			                                    </tr>
			                                </thead>
			                                <tbody><?php $i=0; ?>
			                                    @foreach($users as $user)
			                                        <tr>
			                                            <td class="text-left">{{ ++$i }}</td>
			                                            <td class="text-left" style="min-width: 150px;"><img src="
			                                            	{{ $user->profile_image ? asset('files/profile/images/' . $user->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 40%;">
			                                                {{ $user->name }}</td>
			                                            <td class="text-left">{{ $user->email }}</td>
			                                            <td class="text-left">{{ $user->role ? App\Models\Role::where('name',$user->role)->first()->display_name: 'Hacker' }}</td>
			                                            <td class="text-left">{{ $user->telephone }}</td>
			                                            <td class="text-left" style="text-transform: capitalize;">{{ $user->status }}</td>
			                                            <td class="row text-center" style="min-width: 115px;">
			                                                <a href="{{ route('users.show', $user->id) }}" class="col-5 btn btn-sm btn-info" style="font-size: 13px; margin: 2px;" title="User Details"><i class="fa fa-info-circle"></i></a>
			                                                <a href="{{ route('users.edit', $user->id) }}" class="col-5 btn btn-sm btn-primary" style="font-size: 13px; margin: 2px;"><i class="fa fa-edit" title="Edit User Profile"></i></a>
			                                            </td>
			                                        </tr>
			                                    @endforeach
			                                    <tr>
			                                        <td colspan="7">
			                                            <a href="{{ route('users.index') }}">
			                                                <button class="btn btn-sm btn-default btn-info">All Users</button>
			                                            </a> | 
			                                            <a href="{{ route('users.create') }}" title="Add new user" class="btn btn-sm btn-primary">
			                                                <i class="fa-plus fa"></i> New User
			                                            </a>
			                                        </td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                        </div>
		                        </div>
		                        <div role="tabpanel" class="tab-pane fade" id="profile">
			                        <div class="table-hoverable">
			                        	<table class="table table-hoverable">
			                                <thead>
			                                    <tr>
			                                        <th class="text-left">#</th>
			                                        <th>Database Name</th>
			                                        <th>Display Name</th>
			                                        <th>Description</th>
			                                        <th>Updated</th>
			                                        <th>Added</th>
			                                        <th>Actions</th>
			                                    </tr>
			                                </thead>
			                                <tbody><?php $a=0; ?>
			                                    @foreach($roles as $role)
			                                        <tr>
			                                            <td class="text-left">{{ ++$a }}</td>
			                                            <td class="text-left">{{ $role->name }}</td>
			                                            <td class="text-left">{{ $role->display_name }}</td>
			                                            <td class="text-left">{{ $role->description }}</td>
			                                            <td class="text-left">{{ $role->updated_at }}</td>
			                                            <td class="text-left">{{ $role->created_at }}</td>
			                                            <td class="row text-center" style="min-width: 115px;">
			                                                <a href="{{ route('roles.show', $role->id) }}" class="col-5 btn btn-sm btn-info" style="font-size: 13px; margin: 2px;" title="User Details"><i class="fa fa-info-circle"></i></a>
			                                                <a href="{{ route('roles.edit', $role->id) }}" class="col-5 btn btn-sm btn-primary" style="font-size: 13px; margin: 2px;"><i class="fa fa-edit" title="Edit User Profile"></i></a>
			                                            </td>
			                                        </tr>
			                                    @endforeach
			                                    <tr>
			                                        <td colspan="7">
			                                            <a href="{{ route('roles.index') }}">
			                                                <button class="btn btn-sm btn-info">View All Roles</button>
			                                            </a> | 
			                                            <a href="{{ route('roles.create') }}" title="Add new user role" class="btn btn-primary btn-sm">
			                                                <i class="fa-plus fa">add</i>
			                                            </a>
			                                        </td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                        </div>
		                        </div>
		                        <div role="tabpanel" class="tab-pane fade" id="messages">
			                        <span class="text-danger">Still under developement</span>
		                        </div>
		                        <div role="tabpanel" class="tab-pane fade" id="settings">
		                          	<span class="text-danger">Still under developement</span>
		                        </div>
		                      </div>
		                    </div>
		            </div> <!-- card -->
		        </section>
		    </div>
		</div>
		<div class="col-lg-3 ms-paper-content-container">
			<div class="ms-paper-content">
				<section class="ms-component-section">
					<h4 class="section-title no-margin-top text-center"> Activity </h4>
					<div class="card">
						<div class="card-header text-center">
							Operations &amp; Counters
						</div>
						<div class="card-body">

							
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts') @endsection