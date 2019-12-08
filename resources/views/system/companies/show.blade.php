@extends('layouts.site')
@section('title', 'Company Details')
@section('styles') @endsection
{{-- @section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Company Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
					    	<li class="breadcrumb-item"><a href="{{ route('companies.index') }}"><i class="ion ion-ios-toggle-outline text-primary"></i>Companies</a></li>
					        <li class="breadcrumb-item active"><a href="javascript:void(0)"><i class="fa fa-tree"></i>View Company</a></li>
				        </ol>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection --}}
@section('content')
{{-- <div class="container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-12 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">


	            </section>
	        </div>
	    </div>
	</div>
</div> --}}
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
	            <div class="col-lg-12 col-md-6 order-md-1">
	                <div class="card animated fadeInUp animation-delay-7">
		                <div class="ms-hero-bg-primary ms-hero-img-coffee">
		                    <h3 class="color-white index-1 text-center no-m pt-4">{{ $company->company_name }}</h3>
		                    <div class="color-medium index-1 text-center np-m">{{ $company->company_email }}</div>
		                    <img src="{{ $company->company_logo ? asset('files/companies/images/' . $company->company_logo) : asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." class="img-avatar-circle">
		                </div>
		                <div class="card-body pt-4 text-center">
		                    <h3 class="color-primary">Company Bio</h3>
		                    <p>{{ $company->company_bio }}</p>
		                    <hr>
		                    <b>Date Added: </b> {{ explode(' ', trim($company->created_at))[0] }}, <b> Time: </b> {{ explode(' ', trim($company->created_at))[1] }}
		                    {{-- <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
		                    <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
		                    <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a> --}}
		                </div>
	                </div>
	            </div>
	            @auth
		            @if($company->user_id == Auth::user()->id)
		            <div class="col-lg-12 col-md-12 order-md-3 order-lg-2">
		            	<div class="row">
		            		<div class="col-lg-6">
		                		<a href="javascript:void(0)" title="Edit my company profile" class="btn btn-warning btn-raised btn-block animated fadeInUp animation-delay-12"><i class="zmdi zmdi-edit" style="margin: 0px;"></i> Edit</a>
		                	</div>
		                	<div class="col-lg-6">
		                		<form method="POST" action="{{ route('companies.destroy', $company->id) }}">
	                                {{ csrf_field() }}
	                                {{ method_field('DELETE') }}
		                			<button type="submit" title="Delete this company profile" class="btn btn-danger btn-raised btn-block animated fadeInUp animation-delay-12" onclick="return confirm('You are about to delete this company.\nThis is riskky and not reversible.')">
		                				<i class="zmdi zmdi-delete" style="margin: 0px;"></i> 
		                				Delete 
		                			</button>
		                		</form>
		                	</div>
		                </div>
	              	</div>
	              	@endif
              	@endauth
	            <div class="col-lg-12 col-md-6 order-md-2 order-lg-3">
	                <div class="card animated fadeInUp animation-delay-12">
		                <div class="ms-hero-bg-royal ms-hero-img-mountain">
		                    <h3 class="color-white index-1 text-center pb-4 pt-4"> Company Salons, Spa's & Shops </h3>
		                </div>
		                <div class="card-body">
		                    <div class="ms-media-list">
		                      <div class="media mb-2">
		                        <a class="mr-3" href="#">
		                          <img class="media-object" src="assets/img/demo/avatar6.jpg">
		                        </a>
		                        <div class="media-body">
		                          <h4 class="mt-0 mb-0 color-warning">Maria Sharaphova</h4>
		                          <a href="mailto:joe@example.com?subject=feedback">maria.sha@example.com</a>
		                          <div class="">
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
		                          </div>
		                        </div>
		                      </div>
		                      <div class="media mb-2">
		                        <div class="media-left media-middle">
		                          <a class="mr-3" href="#">
		                            <img class="media-object" src="assets/img/demo/avatar3.jpg">
		                          </a>
		                        </div>
		                        <div class="media-body">
		                          <h4 class="mt-0 mb-0 color-warning">Rafael Nadal</h4>
		                          <a href="mailto:joe@example.com?subject=feedback">rafa.nad@example.com</a>
		                          <div class="">
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
		                          </div>
		                        </div>
		                      </div>
		                      <div class="media mb-2">
		                        <div class="media-left media-middle">
		                          <a class="mr-3" href="#">
		                            <img class="media-object" src="assets/img/demo/avatar5.jpg">
		                          </a>
		                        </div>
		                        <div class="media-body">
		                          <h4 class="mt-0 mb-0 color-warning">Roger Federer</h4>
		                          <a href="mailto:joe@example.com?subject=feedback">roger.fef@example.com</a>
		                          <div class="">
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
		                            <a href="javascript:void(0)" class="btn-circle btn-circle-xs no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
		                          </div>
		                        </div>
		                      </div>
		                    </div>
		                </div>
	                </div>
	            </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
	            <div class="col-sm-4">
	                <div class="card card-info card-body overflow-hidden text-center wow zoomInUp animation-delay-2">
	                  	<h2 class="counter color-info">{{ $company->shops->count() }}</h2>
	                  	<i class="fa fa-4x fa-file-text color-info"></i>
	                  	<p class="mt-2 no-mb lead small-caps color-info">company shops</p>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="card card-success card-body overflow-hidden text-center wow zoomInUp animation-delay-5">
	                  	<h2 class="counter color-success">{{ $company->salons->count() }}</h2>
	                  	<i class="fa fa-4x fa-briefcase color-success"></i>
	                  	<p class="mt-2 no-mb lead small-caps color-success">company salons</p>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="card card-royal card-body overflow-hidden text-center wow zoomInUp animation-delay-4">
	                  	<h2 class="counter color-royal">{{ $company->reviews->count() }}</h2>
	                  	<i class="fa fa-4x fa-comments-o color-royal"></i>
	                  	<p class="mt-2 no-mb lead small-caps color-royal">reviews</p>
	                </div>
	            </div>
            </div>
            {{-- information table --}}
            <div class="card card-primary animated fadeInUp animation-delay-12">
	            <div class="card-header">
	                <h3 class="card-title"><i class="zmdi zmdi-account-circle"></i> Company Information </h3>
	            </div>
	            <div class="table-responsive">
		            <table class="table table-no-border table-striped">
		            	@if($company->company_name)
		                <tr>
		                  	<th><i class="zmdi zmdi-account mr-1 color-success"></i> Company Name</th>
		                  	<td>{{ $company->company_name }}</td>
		                </tr>
		                @endif
		                @if($company->company_email)
		                <tr>
		                  	<th><i class="fa fa-envelope mr-1 color-warning"></i> Company Email </th>
		                  	<td>{{ $company->company_email }}</td>
		                </tr>
		                @endif
		                @if($company->user_id)
		                <tr>
		                  	<th><i class="zmdi zmdi-face mr-1 color-danger"></i> Administrator </th>
		                  	<td>
		                  		<a href="{{ route('users.show',$company->user_id) }}" target="_blank">
		                  			<img src="{{ App\User::where('id',$company->user_id)->first()->profile_image ? asset('files/profile/images/' . App\User::where('id',$company->user_id)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;">
		                  			{{ App\User::where('id',$company->user_id)->first()->name }}
		                  		</a>
		                  	</td>
		                </tr>
		                @endif
		                @if($company->company_ID)
		                <tr>
		                  	<th><i class="zmdi zmdi-link mr-1 color-info"></i> Company ID</th>
		                  	<td>{{ $company->company_ID }}</td>
		                </tr>
		                @endif
		                @if($company->company_telephone)
		                <tr>
		                  	<th><i class="zmdi zmdi-phone-in-talk mr-1 color-royal"></i> Telephone</th>
		                  	<td>{{ $company->company_telephone }}</td>
		                </tr>
		                @endif
		                @if($company->products_services)
		                <tr>
		                  	<th><i class="zmdi zmdi-spinner mr-1 color-primary"></i> Specialism</th>
		                  	<td style="text-transform: capitalize;">{{ count(explode('_', trim($company->products_services))) > 1 ? explode('_', trim($company->products_services))[0] . ' ' . explode('_', trim($company->products_services))[1]  : explode('_', trim($company->products_services))[0] }}</td>
		                </tr>
		                @endif
		                @if($company->company_website)
		                <tr>
		                  	<th><i class="zmdi zmdi-spinner mr-1 color-primary"></i> Website</th>
		                  	<td>{{ $company->company_website }}</td>
		                </tr>
		                @endif
		                @if($company->company_location)
		                <tr>
		                  	<th><i class="zmdi zmdi-spinner mr-1 color-primary"></i> Location</th>
		                  	<td>{{ $company->company_location }}</td>
		                </tr>
		                @endif
		                @if($company->description)
		                <tr>
		                  	<th style="min-width: 200px;"><i class="zmdi zmdi-spinner mr-1 color-primary"></i> Description</th>
		                  	<td>{{ $company->description }}</td>
		                </tr>
		                @endif
		            </table>
		        </div>
            </div>
            <h2 class="color-primary text-center mt-4 mb-2">Company Reviews</h2>
            <div class="row">
              <div class="col-lg-12">
                {{-- <ul class="ms-timeline">
                  <li class="ms-timeline-item wow materialUp">
                    <div class="ms-timeline-date">
                      <time class="timeline-time" datetime="">2016 <span>March</span></time>
                      <i class="ms-timeline-point bg-royal"></i>
                      <img src="assets/img/demo/avatar6.jpg" class="ms-timeline-point-img">
                    </div>
                    <div class="card card-royal">
                      <div class="card-header">
                        <h3 class="card-title">Card Title</h3>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-4">
                            <img src="assets/img/demo/office1.jpg" alt="" class="img-fluid">
                          </div>
                          <div class="col-sm-8">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, praesentium, quam! Quia fugiat aperiam.</p>
                            <p>Perspiciatis soluta voluptate dolore officiis libero repellat cupiditate explicabo atque facere aliquam.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="ms-timeline-item wow materialUp">
                    <div class="ms-timeline-date">
                      <time class="timeline-time" datetime="">2015 <span>October</span></time>
                      <i class="ms-timeline-point bg-info"></i>
                    </div>
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Card Title</h3>
                      </div>
                      <div class="list-group">
                        <a href="javascript:void(0)" class="list-group-item withripple"><i class="zmdi zmdi-favorite"></i>Cras justo odio <span class="badge badge-default pull-right">Active</span></a>
                        <a href="javascript:void(0)" class="list-group-item withripple"><i class="zmdi zmdi-cocktail"></i> Dapibus ac facilisis in <span class="badge badge-primary pull-right">Other</span></a>
                        <a href="javascript:void(0)" class="list-group-item withripple active"><i class="zmdi zmdi-cast"></i>Morbi leo risus <span class="badge badge-default pull-right">New</span></a>
                        <a href="javascript:void(0)" class="list-group-item withripple"><i class="zmdi zmdi-city"></i>Porta ac consectetur ac <span class="badge badge-warning pull-right">Two words</span></a>
                        <a href="javascript:void(0)" class="list-group-item withripple"><i class="zmdi zmdi-chart"></i>Vestibulum at eros <span class="badge badge-success pull-right">Success</span></a>
                      </div>
                    </div>
                  </li>
                  <li class="ms-timeline-item wow materialUp">
                    <div class="ms-timeline-date">
                      <time class="timeline-time" datetime="">2015 <span>October</span></time>
                      <i class="ms-timeline-point bg-success"></i>
                    </div>
                    <div class="card card-success-inverse">
                      <div class="card-body"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus officiis autem magni et, nisi eveniet nulla magnam tenetur voluptatem dolore, assumenda delectus error porro animi architecto dolorum quod veniam nesciunt. </div>
                    </div>
                  </li>
                  <li class="ms-timeline-item wow materialUp">
                    <div class="ms-timeline-date">
                      <time class="timeline-time" datetime="">2015 <span>February</span></time>
                      <i class="ms-timeline-point bg-warning"></i>
                      <img src="assets/img/demo/avatar2.jpg" class="ms-timeline-point-img">
                    </div>
                    <div class="card card-warning">
                      <div class="card-header">
                        <h3 class="card-title">Card Title</h3>
                      </div>
                      <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, nulla recusandae blanditiis architecto soluta culpa obcaecati quis earum atque consequuntur.</p>
                        <div class="row">
                          <div class="col-sm-4">
                            <img src="assets/img/demo/office2.jpg" alt="" class="img-fluid">
                          </div>
                          <div class="col-sm-4">
                            <img src="assets/img/demo/office3.jpg" alt="" class="img-fluid">
                          </div>
                          <div class="col-sm-4">
                            <img src="assets/img/demo/office4.jpg" alt="" class="img-fluid">
                          </div>
                        </div>
                        <br>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, ipsum voluptates eius placeat dolorum reprehenderit ducimus accusamus magni aspernatur at dolore assumenda quae suscipit enim veritatis obcaecati molestias laudantium maxime!</p>
                      </div>
                    </div>
                  </li>
                  <li class="ms-timeline-item wow materialUp">
                    <div class="ms-timeline-date">
                      <time class="timeline-time" datetime="">2014 <span>July</span></time>
                      <i class="ms-timeline-point"></i>
                    </div>
                    <div class="card">
                      <blockquote class="blockquote blockquote-color-bg-primary withripple color-white">
                        <p><strong>Blockquote in timeline!</strong> consectetur adipiscing elit. Integer sodales sagittis magna. consectetur adipiscing elit sed consequat, quam semper libero.</p>
                        <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                      </blockquote>
                    </div>
                  </li>
                  <li class="ms-timeline-item wow materialUp">
                    <div class="ms-timeline-date">
                      <time class="timeline-time" datetime="">2014 <span>January</span></time>
                      <i class="ms-timeline-point bg-info"></i>
                      <img src="assets/img/demo/avatar3.jpg" class="ms-timeline-point-img">
                    </div>
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Card Title</h3>
                      </div>
                      <div class="js-player" data-plyr-provider="youtube" data-plyr-embed-id="9ZfN87gSjvI"></div>
                    </div>
                  </li>
                  <li class="ms-timeline-item wow materialUp">
                    <div class="ms-timeline-date">
                      <time class="timeline-time" datetime="">2013 <span>June</span></time>
                      <i class="ms-timeline-point"></i>
                    </div>
                    <div class="card">
                      <div class="ms-hero-bg-primary ms-hero-img-coffee">
                        <h3 class="color-white index-1 text-center no-m pt-4">Victoria Smith</h3>
                        <div class="color-medium index-1 text-center np-m">@vic_smith</div>
                        <img src="assets/img/demo/avatar1.jpg" alt="..." class="img-avatar-circle">
                      </div>
                      <div class="card-body pt-4 text-center">
                        <h3 class="color-primary">Bio</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
                      </div>
                    </div>
                  </li>
                </ul> --}}
              </div>
            </div>
        </div>
	</div>
</div> <!-- container -->
@endsection
@section('scripts') @endsection