@extends('layouts.site')
@section('title', 'Add Gallery')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">New Gallery</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
		                <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}"> <i class="fa fa-image"></i> Galleries </a></li>
		                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Add Gallery </li>
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
                        <div class="card-header"><h4 style="width: 100%; text-align: center;"> Create Gallery </h4></div>
                        <div class="card-body">
                            <form action="{{ route('galleries.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                                        
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <section class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Names"> Gallery Name (If new): </label>
                                                    <input type="text" name="gallery_name" class="form-control" id="Names" placeholder="Fill this for a new gallery" autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="main"> Main Gallery : </label>
                                                    <select class="custom-select form-control" name="gallery_id">
                                                        <option value="">Chose from Existing</option>
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
                                                    <label for="image-title"> Title : </label>
                                                    <input type="text" name="title" class="form-control" id="image-title" placeholder="Title of image" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="">
                                                    <label for="file-item">Add Image :</label>
                                                    <input type="file" id="file-item" name="image" accept=".jpg, .png, .jpeg, .gif" required>
                                                </div>
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            </div>
                                        </div>
                                    </div>                                      
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="item-description">Item Description : </label>
                                            <textarea name="description" placeholder="Gallery description  details here!" class="form-control" id="item-description" required></textarea>
                                        </div>
                                    </div>
                                </section>
                                <div div class="col-md-12 text-center">
                                    <a href="{{ route('galleries.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                                    <button type="submit" class="btn btn-rounded btn-raised btn-primary" style="min-width: 150px;">Add Gallery</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
		<div class="col-lg-8 ms-paper-content-container">

		</div>
	</div>
</div>

</div>
@endsection
@section('scripts') @endsection