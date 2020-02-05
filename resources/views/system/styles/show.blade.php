@extends('layouts.site')
@section('title', 'Style Details')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Fashion Style Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('salons.show',['all',$salon->id]) }}"><i class="fa fa-address-book-o"></i> {{ $salon->salon_name }}</a></li>
                    	<li class="breadcrumb-item"><a href="{{ route('styles.index',['all',$salon->id]) }}"><i class="fa fa-list"></i> Style Details </a></li>
						<li class="breadcrumb-item active"><i class=""></i> {{ $style->style_name }}</li>
			        </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container" style="min-height: 600px;">
	<div class="row">
        <div class="col-md-6">
            <div id="carousel-product" class="ms-carousel ms-carousel-thumb carousel slide animated zoomInUp animation-delay-5" data-ride="carousel" data-interval="0">
	            <div class="card card-body text-center">
	                <!-- Wrapper for slides -->
                	<span class="badge col-12 badge-success mb-1" style="overflow-x: auto; font-size: 20px; text-transform: capitalize; padding: 5px 10px; border-radius: 5px;">
                		{{ $style->style_name }} | 
                		<small>
	                		{{ $salon->salon_name }} 
	                		({{ $salon->categories_id ? App\Models\Categories::where('id',$salon->categories_id)->first()->display_name : 'No category selected' }})
	                	</small>
                	</span>
	                <div class="carousel-inner" role="listbox"><?php $x=0; ?>
	                	@if($images)
	                		@foreach($images as $image) <!--{{  ++$x }} -->
	                		<div class="carousel-item @if($x == 1) active @endif" 
	                			style="text-align: center; background-color: #e5e5e5;">
			                    <img src="{{ asset('files/others/images/' . $image->image) }}" alt="..." style="width: auto; max-height: 350px;">
			                </div>
			                @endforeach
	                	@else
		                <div class="carousel-item active">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." style="max-height: 350px;">
		                </div>
		                <div class="carousel-item">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." style="max-height: 350px;">
		                </div>
		                <div class="carousel-item">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" style="max-height: 350px;" alt="...">
		                </div>
		                <div class="carousel-item">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." style="max-height: 350px;">
		                </div>
		                <div class="carousel-item">
		                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="..." style="max-height: 350px;">
		                </div>
		                @endif
	                </div>
	            </div>
              	<!-- Indicators -->
	            <ol class="carousel-indicators carousel-indicators-tumbs carousel-indicators-tumbs-outside"><!-- <?php $z=0?> -->
	            	@if($images)
	            		@foreach($images as $image)
	            		<li data-target="#carousel-product" data-slide-to="{{  $z++ }}" class="active">
		                  	<img src="{{ asset('files/others/images/' . $image->image) }}" alt="" style="max-height: 45px;">
		                </li>
		                @endforeach
	                @else
	                <li data-target="#carousel-product" data-slide-to="0" class="active">
	                  	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                <li data-target="#carousel-product" data-slide-to="1">
	                  	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                <li data-target="#carousel-product" data-slide-to="2">
	                  	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                <li data-target="#carousel-product" data-slide-to="3">
	                  	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                <li data-target="#carousel-product" data-slide-to="4">
	                  	<img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" style="max-height: 45px;">
	                </li>
	                @endif
	            </ol>
            </div>
        </div>
        <div class="col-md-6">
        	<div class="row">
        		<div class="col-12">
        			<div class="card animated zoomInDown animation-delay-5">
			            <div class="card-body">
		        			<div class="table-responsive">
		              			<table class="table">
		              				<thead>
		              					<tr>
		              						<th class="text-center"> Category </th>
		              						<th class="text-center"> Description </th>
		              					</tr>
		              				</thead>
		              				<tbody>
					                	@if($style->style_name)
					                  		<tr>
					                  			<td><strong>Style Name: </strong></td><td> {{ $style->style_name }}</td>
					                  		</tr>
					                  	@endif
					                	@if($style->company_id)
					                		<tr>
					                			<td><strong>Group Account: </strong> </td>
					                			<td><a href="{{ route('companies.show',['all',$style->company_id]) }}" target="_blank">
					                				{{ App\Models\Company::where('id',$style->company_id)->first()->company_name }}
					                			</a></td>
					                		</tr>
					                	@endif
					                  	@if($style->description)
					                  		<tr>
					                  			<td><strong>Description: </strong></td><td> {{ $style->description }}</td>
					                  		</tr>
					                  	@endif
					                  	@if($style->previous_price)
					                  		<tr>
					                  			<td style="min-width: 150px;">
					                  				<strong>Price: </strong></td><td> <strike class="color-danger">UGX. {{ $style->previous_price }}</strike>
					                  				@if($style->current_price)
					                  				<strong class="text-success pull-right">UGX. {{ $style->current_price }}</strong>
					                  				@endif
					                  			</td>
					                  		</tr>
					                  	@endif
					                  	@if($style->categories_id)
					                  		<tr>
					                  			<td>
					                  				<strong>Style Category:</strong>
					                  			</td>
					                  			<td> {{ App\Models\Categories::where('id',$style->categories_id)->first()->display_name }}</td>
					                  		</tr>
					                  	@endif
					                  	<tr>
					                  		<td><strong>Availability: </strong></td>
					                  		<td><span class="ms-tag ms-tag-success" style="text-transform: capitalize;"> {{ $style->status }} </span></td>
					                  	</tr>
					                	@if($style->user_id)
						                  	<tr>
						                  		<td><strong>Contact Person: </strong></td>
						                  		<td><a href="{{ route('users.show',$style->user_id) }}" target="_blank">
							                  		<img src="{{ App\User::where('id',$style->user_id)->first()->profile_image ? asset('files/profile/images/' . App\User::where('id',$style->user_id)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 25px; border-radius: 50%;">
							                  		{{ App\User::where('id',$style->user_id)->first()->name }}
							                  	</a></td>
							                </tr>
					                  	@endif
					                </tbody>
				                </table>
		              		</div>
		        		</div>
		        		<div class="card-body row">
	        				<div class="col-md-6 text-center pull-left" style="padding: 5px;">
	        					<a href="#" class="btn btn-primary btn-block btn-raised"><span class="fa fa-cart-plus"></span> Book Now!</a>
	        				</div>
	        				<div class="col-md-6 text-center pull-right" style="padding: 5px;">
	        					<button class="btn btn-success btn-block btn-raised" data-toggle="modal" data-target="#contactModal" @guest disabled title="You must be logged in to make a rating and review!" @else title="Hello {{ explode(' ', trim(Auth::user()->name))[0] }}, please do not leave minus reviewing this salon" @endguest><span class="glyphicon glyphicon-envelope"></span> Contact!</button>
	        				</div>
		        		</div>
		        	</div>
		        </div>
        	</div>
        	@auth
        	<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    	<form action="{{ route('messages.store','inbox') }}" method="POST">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach

                            <div class="modal-body">
                                <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="receiver" value="{{ $style->user_id }}">
                                <input type="hidden" name="status" value="inbox">
                                <input type="hidden" name="routers" value="{{ route('styles.show',['all',0,$style->id]) }}">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="recipient-name" class="control-label">Topic:</label>
                                            <input type="text" class="form-control" id="recipient-name1" name="title">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="priority">Priority</label>
                                            <select class="custom-select form-control" name="folder">
                                                <option value="normal">Select priority</option>
                                                <option value="important">Important</option>
                                                <option value="urgent">Urgent</option>
                                                <option value="official">Official</option>
                                                <option value="unofficial">Unofficial</option>
                                                <option value="normal">Normal</option>
                                                <option value="">None</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Message:</label>
                                    <textarea class="form-control" id="message-text1" name="message">





--------------------
Message from fashion style {{ $style->style_name }}
Link: {{ route('styles.show',['all',0,$style->id]) }}
                                	</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>@endauth
        </div>
    </div>
    <h3 class="mt-4 mb-4 right-line"> Other Styles From {{ $salon->salon_name }} | <a href="{{ route('styles.index',['all',0]) }}"> Other salons' styles </a> </h3>
    <div class="row"><?php $i=3; ?>
    	@foreach($salon->styles as $sty)
    		@if($sty->id != $style->id)
	    		<div class="col-md-4">
	                <div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
	                    <div class="ms-thumbnail card-body p-05">
	                        <div class="withripple zoom-img">
	                            <a href="{{ sizeof($sty->galleries) > 0 ? asset('files/galleries/images/'. $sty->galleries->first()->image) : asset('files/defaults/images/cover_bg_2.jpg') }}" data-lightbox="gallery" data-title="{{ $sty->style_name }}"><img src="{{ sizeof($sty->galleries) > 0 ? asset('files/galleries/images/'. $sty->galleries->first()->image) : asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" class="img-fluid" style="height: 200px;"></a>
	                            <div class="col-md-12" style="padding: 0px;">
		                            <div class="pull-left">
		                            	<a href="javascript:void(0)" class="btn btn-primary btn-xs btn-raised" title="Add to the booking list">
		                            		<i class="fa fa-cart-plus" style="margin: 0px; padding: 0px;"></i>
		                            	</a>
		                                <a href="{{ route('styles.show',[($sty->categories_id ? App\Models\Categories::where('id',$sty->categories_id)->first()->name : 'all'),$sty->salon_id,$sty->id]) }}" class="btn btn-info btn-xs" title="View style details" style="padding-top: 5px;">{{ $sty->style_name }} | 
		                                	<strike class="color-danger">UGX. {{ $sty->current_price  }}</strike>
		                                	<b class="color-success">UGX. {{ $sty->current_price  }}</b>
		                                </a>
		                            </div>
	                                <a title="Go to Salon ({{ App\Models\Salon::where('id',$sty->salon_id)->first()->salon_name }})" href="{{ route('salons.show',['all',$sty->salon_id]) }}" class="btn btn-xs btn-success btn-raised pull-right"><i class="fa fa-shopping-basket" style="margin: 0px;"></i> </a>
	                            </div>
	                        </div>
	                    </div>
		            </div>
		        </div>
		    @endif
    	@endforeach
    </div>
</div>
@endsection
@section('scripts') @endsection