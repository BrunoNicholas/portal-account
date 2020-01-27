@extends('layouts.site')
@section('title', 'Edit Image Details')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Edit Image Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
		                <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}"> <i class="fa fa-image"></i> Galleries </a></li>
		                <li class="breadcrumb-item"><a href="{{ route('images.index') }}"> <i class="fa fa-image"></i> Images </a></li>
		                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-edit"></i> Edit Image </li>
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
	            	<div class="card">
						<div class="card-header"><h4 style="width: 100%; text-align: center;"> Edit Image </h4></div>
	                    <div class="card-body">
	                    	<form action="{{ route('images.update',$image->id) }}" enctype="multipart/form-data" method="POST">
	                            @csrf
	                            {{ method_field('PATCH') }}

	                            @foreach ($errors->all() as $error)
	                                <p class="alert alert-danger">{{ $error }}</p>
	                            @endforeach
	                                    
	                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                            <section class="row">
	                                <div class="col-md-12">
	                                    <div class="row">
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="main"> Select Gallery : </label>
	                                                <select class="custom-select form-control" name="gallery_id">
	                                                	<option value="{{ $image->gallery_id }}">Select to change gallery</option>
	                                                    @foreach($galleries as $gallery)
	                                                        <option value="{{ $gallery->id }}">{{ $gallery->gallery_name . ' ('. $gallery->title . ') ' }}</option>
	                                                    @endforeach
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="col-md-6">
	                                            <div class="mt-3">
	                                                <label >Change Image :</label>
	                                                <input type="file" onclick="return confirm('Chosing a different image will delete the current one.\nClick okay if this is what you want.')" name="image" accept=".jpg, .png, .jpeg, .gif">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                    <div class="row">
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="caption_text"> Image Title : </label>
	                                                <input type="text" name="title" value="{{ $image->title }}" class="form-control" id="caption_text" placeholder="Image Title">
	                                            </div>
	                                        </div>
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="caption_text"> Image Caption : </label>
	                                                <input type="text" name="caption" class="form-control" value="{{ $image->caption }}" id="caption_text" placeholder="Caption Text">
	                                            </div>
	                                            <input type="hidden" name="user_id" value="{{ $image->user_id }}">
	                                        </div>
	                                    </div>
	                                </div>
	                            </section>
	                            <div div class="col-md-12 text-center">
	                                <a href="{{ route('images.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
	                                <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;">Update Image</button>
	                            </div>
	                        </form>
	                    </div>
					</div>
	            </section>
	        </div>
	    </div>
	</div>
</div>
@endsection
@section('scripts') @endsection