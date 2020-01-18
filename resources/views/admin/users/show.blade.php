@extends('layouts.site')
@section('title') {{ $user->name }} | User Details @endsection
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">
					<img src="{{ $user->profile_image ? asset('files/profile/images/' . $user->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 30px; border-radius: 40%;">
					{{ $user->name }} - Details
				</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
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
<div class="card card-body container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-8 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<h4 class="section-title no-margin-top"> @role(['super-admin','admin'])
	            		<a href="{{ route('users.index') }}" title="Back to users">
	            			<i class="fa-angle-double-left fa"></i> All Users
	            		</a>
	            		 | @endrole Available information about {{ explode(' ', trim($user->name))[0] }} 
	            	</h4>
	            	<div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            	<table class="table m-b-0 text-left">
                                	<thead>
		                                <tr>
		                                    <th style="text-align: center;" scope="col">#</th>
		                                    <th style="text-align: center;" scope="col">Attribute</th>
		                                    <th style="text-align: center;" scope="col">Value</th>
		                                    <th style="text-align: center;" scope="col">More</th>
		                                </tr>
		                            </thead>
		                            <?php $i=0; ?>
		                            <tbody>
		                                @if($user->name)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Full Names</td>
		                                        <td style="text-align: center;"><b>{{ $user->name }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->email)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Email</td>
		                                        <td style="text-align: center;"><b>{{ $user->email }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->telephone)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Telephone</td>
		                                        <td style="text-align: center;"><b>{{ $user->telephone }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->date_of_birth)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Date Of Birth</td>
		                                        <td style="text-align: center;"><b>{{ $user->date_of_birth }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->place_of_work)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Place of Work</td>
		                                        <td style="text-align: center;"><b>{{ $user->place_of_work }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->church)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Ministry (Church)</td>
		                                        <td style="text-align: center;"><b>{{ $user->church }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->nationality)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Nationality</td>
		                                        <td style="text-align: center;"><b>{{ $user->nationality }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->occupation)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Occupation</td>
		                                        <td style="text-align: center;"><b>{{ $user->occupation }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->work_address)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left"> Address of Work </td>
		                                        <td style="text-align: center;"><b>{{ $user->work_address }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->home_address)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left"> Address of Home </td>
		                                        <td style="text-align: center;"><b>{{ $user->home_address }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->gender)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Gender</td>
		                                        <td style="text-align: center;"><b>{{ $user->gender }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->year_enrolled)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Year Enrolled</td>
		                                        <td style="text-align: center;"><b>{{ $user->year_enrolled }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->unenrollment_year)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Graduation Year</td>
		                                        <td><b>{{ $user->unenrollment_year }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->role)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">System Role</td>
		                                        <td style="text-align: center"><b>{{ App\Models\Role::where('name',$user->role)->get()->first()->display_name }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->bio)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left;">User Bio</td>
		                                        <td style="text-align: left;"><b>{{ $user->bio }}</b></td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->status)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left">Account Status</td>
		                                        <td style="text-align: center; text-transform: capitalize;">
		                                            @if($user->status == 'active')
		                                                <span class="btn-xs btn-rounded badge badge-success">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
		                                            @elseif($user->status == 'away')
		                                                <span class="btn-xs btn-rounded badge badge-primary">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
		                                            @elseif($user->status == 'busy')
		                                                <span class="btn-xs btn-rounded badge badge-danger">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
		                                            @elseif($user->status == 'blocked')
		                                                <span class="btn-xs btn-rounded badge badge-danger">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
		                                            @elseif($user->status == 'inactive')
		                                                <span class="btn-xs btn-rounded badge badge-info">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
		                                            @else
		                                                <span class="btn-xs btn-rounded badge badge-warning">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
		                                            @endif
		                                        </td>
		                                        <td></td>
		                                    </tr>
		                                @endif
		                                @if($user->created_at)
		                                    <tr>
		                                        <th scope="row">{{ ++$i }}</th>
		                                        <td style="text-align: left;">User Since</td>
		                                        <td style="text-align: center;"><b>{{ explode(' ', trim($user->created_at))[0] }}</b></td>
		                                        <td>Time: <b>{{ explode(' ', trim($user->created_at))[1] }}</b></td>
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
	            	<h4 class="section-title no-margin-top text-center"> {{ explode(' ', trim($user->name))[0] }}'s Operations</h4>
	            	<div class="card">
                        <div class="card-body">
	                        <div class="row text-center">
	                            <div class="col-md-12">
	                                <img src="{{ $user->profile_image ? asset('files/profile/images/' . $user->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="user image" style="max-width: 98%; border-radius: 3px;">
	                            </div>
	                            @role(['super-admin','admin'])
	                            <div class="col-md-12">
	                                <div class="row">
	                                    <div class="col-6">
	                                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-block"> Back </a>
	                                    </div>
	                                    <div class="col-6">
	                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
	                                            {{ csrf_field() }}
	                                            {{ method_field('DELETE') }}
	                                            <div class="tools">
	                                                <button type="submit" class="btn btn-danger btn-block"
	                                                    @if($user->id == Auth::user()->id) disabled @elseif($user->role == 'super-admin') disabled @endif onclick="return confirm('You are about to delete!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
	                            @endrole
	                        </div>
                        </div>
                        <div class="card-body">
							<div class="row text-center">
								<h4 class="col-12 color-primary text-center"> Credits </h4>
	                            <div class="col-md-12">
	                            	<div class="table-responsive">
	                            		<table class="table table-bordered">
	                            			<tbody>
	                            				@if($user->hasRole('company-admin'))
	                            				<tr>
	                            					<td>Account Owner</td>
	                            					<td>{{ $user->companies->count() }}</td>
	                            				</tr>
	                            				@endif
	                            				@if($user->hasRole(['company-admin','salon-admin']))
	                            				<tr>
	                            					<td>Salons Owned</td>
	                            					<td>{{ $user->salons->count() }}</td>
	                            				</tr>
	                            				@endif
	                            				@if($user->hasRole(['company-admin','shop-admin']))
	                            				<tr>
	                            					<td>Shops Owned</td>
	                            					<td>{{ $user->shops->count() }}</td>
	                            				</tr>
	                            				@endif
	                            				<tr>
	                            					<td>Bookings Made</td>
	                            					<td style="width: 40%;">{{ $user->bookings->count() }}</td>
	                            				</tr>
	                            				<tr>
	                            					<td>Orders Made</td>
	                            					<td>{{ $user->orders->count() }}</td>
	                            				</tr>
	                            				@if($user->hasRole(['super-admin','admin','salon-admin','shop-admin','company-admin']))
	                            				<tr>
	                            					<td>Posts Made</td>
	                            					<td>{{ $user->posts->count() }}</td>
	                            				</tr>
	                            				@endif
	                            				<tr>
	                            					<td>Questions Asked</td>
	                            					<td>{{ $user->questions->count() }}</td>
	                            				</tr>
	                            			</tbody>
	                            		</table>
	                            	</div>
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