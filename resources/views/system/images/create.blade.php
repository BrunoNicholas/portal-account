@extends('layouts.site')
@section('title', 'Add Image')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Add Image</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
		                <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}"> <i class="fa fa-image"></i> Galleries </a></li>
		                <li class="breadcrumb-item"><a href="{{ route('images.index') }}"> <i class="fa fa-image"></i> Images </a></li>
		                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Add Image </li>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-8 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<div class="card">
                        <div class="card-header"><h4 style="width: 100%; text-align: center;"> Add Images </h4></div>
                        <div class="card-body">
                            <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
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

                                <section class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mt-3">
                                                    <label for="file-item">Image :</label>
                                                    <input type="file" id="file-item" name="image" accept=".jpg, .png, .jpeg" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="main"> Select Gallery : </label>
                                                    <select class="custom-select form-control" name="gallery_id">
                                                        @foreach($galleries as $gallery)
                                                            <option value="{{ $gallery->id }}">{{ $gallery->gallery_name . ' ('. $gallery->title . ') ' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="caption_text"> Image Title : </label>
                                                    <input type="text" name="title" class="form-control" id="caption_text" placeholder="Image Title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="caption_text"> Image Caption : </label>
                                                    <input type="text" name="caption" class="form-control" id="caption_text" placeholder="Caption Text">
                                                </div>
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div div class="col-md-12 text-center">
                                    <a href="{{ route('images.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                                    <button type="submit" class="btn btn-raised btn-rounded btn-primary" style="min-width: 150px;">Add Image</button>
                                </div>
                            </form>
                        </div>
                    </div>

	            </section>
	        </div>
	    </div>
	    <div class="col-lg-4 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<div class="card">
	            		<div class="card-header">
	            			<h4>Other Images</h4>
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