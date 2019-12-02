@extends('layouts.site')
@section('title', 'Administrator')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Administrator</span>
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
<div class="container">
	<div class="row mt-0 pl-0">
		<div class="col-lg-12 ms-paper-content-container" style="">
			<div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 pt-1">
                    <div class="panel panel-body text-center">
                    	<div class="row pl-2">                    	
                        	<i class="fa fa-4x fa-group primary-color text-center col-4" style="padding-top: 20px;"></i>
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
                <div class="col-lg-3 col-md-6 col-sm-6 pt-1">
                    <div class="panel panel-body text-center">
                    	<div class="row pl-2">                    	
                        	<i class="fa fa-4x fa-id-card-o primary-color text-center col-4" style="padding-top: 20px;"></i>
	                        <div class="col-8">
		                        <h2>
		                        	<b class="counter">{{ App\Models\Company::where('status', 'active')->get()->count() }}</b>
		                        	<small style="font-size: 15px;"> / <b class="counter">{{ count($companies) }}</b></small>
		                        </h2>
		                        <p class="mt-2 no-mb lead small-caps">Companies</p>
		                    </div>
		                </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 pt-1">
                    <div class="panel panel-body text-center">
                    	<div class="row pl-2">                    	
                        	<i class="fa fa-4x fa-group primary-color text-center col-4" style="padding-top: 20px;"></i>
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
                <div class="col-lg-3 col-md-6 col-sm-6 pt-1">
                    <div class="panel panel-body text-center">
                    	<div class="row pl-2">                    	
                        	<i class="fa fa-4x fa-group primary-color text-center col-4" style="padding-top: 20px;"></i>
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
            </div>
		</div>
		<div class="col-lg-9 ms-paper-content-container" style="">
	        <div class="ms-paper-content">
	            <section class="ms-component-section">
		                <h4 class="section-title no-margin-top">Manage the system users, roles, salons and more!</h4>
		                <div class="card">
		                    <!-- Nav tabs -->
		                    <ul class="nav nav-tabs  shadow-2dp" role="tablist">
		                      <li class="nav-item"><a class="nav-link withoutripple active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="zmdi zmdi-home"></i> <span class="d-none d-sm-inline">Home</span></a></li>
		                      <li class="nav-item"><a class="nav-link withoutripple" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="zmdi zmdi-account"></i> <span class="d-none d-sm-inline">Profile</span></a></li>
		                      <li class="nav-item"><a class="nav-link withoutripple" href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="zmdi zmdi-email"></i> <span class="d-none d-sm-inline">Messages</span></a></li>
		                      <li class="nav-item"><a class="nav-link withoutripple" href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="zmdi zmdi-settings"></i> <span class="d-none d-sm-inline">Settings</span></a></li>
		                    </ul>
		                    <div class="card-body">
		                      <!-- Tab panes -->
		                      <div class="tab-content">
		                        <div role="tabpanel" class="tab-pane fade active show" id="home">
		                          <p>Curabitur tempus felis tortor, sit amet accumsan nisi posuere a. Etiam nulla lectus, luctus nec pulvinar ac, accumsan vitae tellus. Donec scelerisque sem sit amet lorem pulvinar suscipit. Pellentesque fermentum hendrerit sapien, luctus sagittis ante egestas vehicula. Praesentnec erat purus.</p>
		                          <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc facilisis porttitor urna vel commodo. Sed a arcu eget justo ornare gravida. Etiam fermentum libero bibendum hendrerit ultrices. In a accumsan justo, quis pretium ex.</p>
		                        </div>
		                        <div role="tabpanel" class="tab-pane fade" id="profile">
		                          <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin cursus ullamcorper erat, nec faucibus libero sollicitudin sit amet. Cras aliquet vel purus a ultrices. Integer commodo diam ac libero fermentum consequat. Donec velit velit, aliquet vel vulputate ut, vehicula ut enim. Curabitur tempus imperdiet pretium. Sed pretium, mi vel imperdiet pharetra, ligula dolor facilisis odio, vel imperdiet lectus justo at ante.</p>
		                          <p>Cras sit amet bibendum felis, id auctor arcu. Donec lobortis lorem mi, id vulputate nisl porta id. Duis aliquet rutrum laoreet. Fusce vel libero ante. Sed ornare tincidunt interdum.</p>
		                        </div>
		                        <div role="tabpanel" class="tab-pane fade" id="messages">
		                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aspernatur, suscipit possimus ipsam ab quos eaque sapiente, quo id cumque, mollitia, provident qui voluptate officia cum minus veritatis nulla doloribus laudantium consectetur dolorum ex impedit et error sequi.</p>
		                          <p>Tenetur ipsa accusamus, sint soluta totam facilis voluptatem praesentium quia excepturi explicabo dolore autem unde ullam molestiae laborum voluptate in impedit laboriosam nemo dolorem officiis debitis. Nostrum labore fuga numquam facere provident ullam voluptate voluptatibus architecto.</p>
		                        </div>
		                        <div role="tabpanel" class="tab-pane fade" id="settings">
		                          <p>Exercitationem saepe dolores eveniet eligendi dolorum molestiae nulla, nesciunt modi aspernatur porro magni dolore perferendis ducimus voluptatibus ipsa.</p>
		                          <p>Sit eum iusto in cum fuga consequatur maiores saepe perferendis itaque similique natus, temporibus commodi, repellendus sint aperiam nobis dolorem magnam totam quasi rem modi placeat, laudantium iste unde tenetur veritatis exercitationem vitae quos labore facilis fugiat suscipit consequatur veniam, ab dolorem quidem. Quibusdam deserunt quasi atque.</p>
		                        </div>
		                      </div>
		                    </div>
		            </div> <!-- card -->
		        </section>
		    </div>
		</div>
		<div class="col-lg-3 ms-paper-content-container" style="">

		</div>
	</div>
</div>


@endsection
@section('scripts') @endsection