@extends('layouts.site')
@section('title', 'New Style')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
<div class="ms-hero-page-override ms-hero-img-team ms-hero-bg-primary">
    <div class="container">
        <div class="text-center">
            <div class="row">
            	<div class="d-flex no-block align-items-center col-md-4">
					<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">
						<b class="text-white">New Fashion Style</b>
						<span class="text-white"> | {{ $salon->salon_name }}</span>
					</span>
				</div>
		        <div class="d-flex no-block justify-content-end col-md-8">
		            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
		                <ol class="breadcrumb">
        					<li class="breadcrumb-item"><a href="{{ route('salons.index','all') }}"> <i class="fa fa-address-book text-white"></i> <span class="text-white"> Salons </span></a></li>
        					<li class="breadcrumb-item"><a href="{{ route('salons.show',['all',$salon->id]) }}"> <i class="fa fa-address-book-o text-white"></i> <span class="text-white"> Your Salon </span></a></li>
        					<li class="breadcrumb-item active"> <i class="fa fa-plus text-white"></i> <span class="text-white"> New </span></li>
		                </ol>
		            </nav>
		        </div>
		        <p class="lead lead-lg color-light text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">Add fashion styles to your salon!</p>
	        </div>
	    </div>
	</div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card card-hero animated fadeInUp animation-delay-7">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('styles.store',['salon',$salon->id]) }}" name="cal">
            	@csrf
              	@foreach ($errors->all() as $error)
  	            	<p class="alert alert-danger">{{ $error }}</p>
  	            @endforeach
  	            @if (session('success'))
  	            	<div class="alert alert-success">
  	            		{{ session('success') }}
  	            	</div>
  	            @endif   
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	            <input type="hidden" name="salon_id" value="{{ $salon->id }}">
	            <fieldset class="container">
	            	<div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="inputName" autocomplete="false" class="col-lg-4 control-label">Style Name</label>
				                <div class="col-lg-8">
				                    <input type="text" name="style_name" class="form-control" id="inputName" placeholder="Valid Name" required>
				                </div>
	                		</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="iteCat" autocomplete="false" class="col-lg-4 control-label">Item Category</label>
				                <div class="col-lg-8">
				                    <select class="form-control" id="iteCat" name="categories_id" required>
				                    	@foreach($cats as $category)
				                    		<option value="{{ $category->id }}" title="{{ $category->description }}">{{ $category->display_name }}</option>
				                    	@endforeach
				                    </select>
				                </div>
	                		</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="mainProd" autocomplete="false" class="col-lg-4 control-label">Major Style (Only if it's a sub style)</label>
				                <div class="col-lg-8">
				                    <select class="form-control" id="mainProd" name="style_id">
				                    	<option value="">Leave empty if it's a Major item</option>
				                    	@foreach($styles as $style)
				                    		<option value="{{ $style->id }}" title="{{ $style->description }}">{{ $style->style_name }}</option>
				                    	@endforeach
				                    </select>
				                </div>
	                		</div>
	                	</div>	                	
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="Desc" autocomplete="false" class="col-lg-4 control-label">Description</label>
				                <div class="col-lg-8">
				                    <textarea name="description" class="form-control" id="Desc" placeholder="Fashion style description"></textarea>
				                </div>
	                		</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="prePx" autocomplete="false" class="col-lg-4 control-label">Previous Price</label>
				                <div class="col-lg-8">
				                    <input type="number" name="previous_price" class="form-control" id="prePx" placeholder="Price in UGX">
				                </div>
	                		</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group row">
	                			<label for="currPx" autocomplete="false" class="col-lg-4 control-label">Current Price</label>
				                <div class="col-lg-8">
				                    <input type="number" name="current_price" class="form-control" id="currPx" placeholder="Price in UGX">
				                </div>
	                		</div>
	                	</div>
	                </div>
	                <div class="form-group row justify-content-end mt-0">
		                <div class="col-lg-10 offset-lg-2">
		                    <button type="submit" class="btn btn-raised btn-success">Save Style</button>
		                    <a href="{{ route('home') }}" class="btn btn-danger">Cancel To Home</a>
		                </div>
	                </div>
	            </fieldset>
	        </form>
	    </div>
	</div>
</div>
@endsection
@section('scripts') @endsection