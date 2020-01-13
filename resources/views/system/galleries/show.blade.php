@extends('layouts.site')
@section('title') @if($gallery->gallery_name) {{ $gallery->gallery_name }} | @endif View Gallery @endsection
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Gallery Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
			                <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}"> <i class="fa fa-image"></i> Galleries </a></li>
			                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-image"></i> {{ $gallery->gallery_name }} </li>
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
		<div class="col-lg-8 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<div class="card">
                        <div class="card-header"><h4 style="width: 100%; text-align: center;"> Gallery Details </h4></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table m-b-0 text-left">
                                    <?php $i=0; ?>
                                    <tbody>
                                        @if($gallery->gallery_name)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Gallery Name: </th>
                                                <td style="text-align: left;">{{ $gallery->gallery_name }}</td>
                                            </tr>
                                        @endif
                                        @if($gallery->gallery_id)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Main Gallery: </th>
                                                <td style="text-align: left;"><a href="{{ route('galleries.show',$gallery->gallery_id) }}"> <img src="{{ asset('files/galleries/images/' . App\Models\Gallery::where('id',$gallery->gallery_id)->first()->image) }}" style="width: 30px; border-radius: 50%;" alt="g-img"> {{ App\Models\Gallery::where('id',$gallery->gallery_id)->first()->gallery_name }}</a></td>
                                            </tr>
                                        @endif
                                        @if($gallery->caption)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Gallery Image Caption: </th>
                                                <td style="text-align: left;">{{ $gallery->caption }}</td>
                                            </tr>
                                        @endif
                                        @if($gallery->title)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Gallery Image Title: </th>
                                                <td style="text-align: left;">{{ $gallery->title }}</td>
                                            </tr>
                                        @endif
                                        @if($gallery->size)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Default Image Size: </th>
                                                <td style="text-align: left;">{{ $gallery->size }}</td>
                                            </tr>
                                        @endif
                                        @if($gallery->user_id)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Created By: </th>
                                                <td style="text-align: left;">
                                                    <a href="{{ route('users.show',$gallery->user_id) }}" target="_blank">
                                                        <img src="{{ App\User::where('id',$gallery->user_id)->first()->profile_image ? asset('files/profile/images/' . App\User::where('id',$gallery->user_id)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="width: 30px; border-radius: 50%;" alt="author"> 
                                                        {{ App\User::where('id',$gallery->user_id)->first()->name }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                        @if($gallery->status)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;"> Gallery Status: </th>
                                                <td style="text-align: left; text-transform: capitalize;">{{ $gallery->status }}</td>
                                            </tr>
                                        @endif
                                        @if($gallery->created_at)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;"> Date Added: </th>
                                                <td style="text-align: left; text-transform: capitalize;">{{ $gallery->created_at }} | <b> Recent Update: </b> {{ $gallery->updated_at }} </td>
                                            </tr>
                                        @endif
                                        @if($gallery->description)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Description: </th>
                                                <td style="text-align: left;">
                                                    <textarea class="form-control" disabled style="background-color: #fff; border: thin solid transparent;">{{ $gallery->description }}</textarea>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="box">
                                <h3 class="box-header text-center">Gallery Images</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                	@if(sizeof($gallery->images) < 1)
                                		<div class="col-md-12 text-center" style="padding-top: 10px;">
                                            <div class="card card-body" style="border: thin solid transparent;">
                                            	<span class="text-danger"> No image added to this gallery yet. </span>
                                            </div>
                                        </div>
                                	@endif
                                    @foreach($gallery->images as $image)
                                        <div class="col-md-4" style="padding-top: 10px;" onclick="window.location='{{ route('images.show',$image->id) }}'">
                                            <div class="card" style="border: thin solid transparent;">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1" style="text-align: center;"> 
                                                        <div style="max-width: 450px; overflow-x: hidden;">
                                                            <img src="{{ asset('files/others/images/'. $image->image) }}" alt="image" style=" height: 200px; width: auto; border-radius: 3px;"/>
                                                        </div>
                                                        <div class="el-overlay">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    {{ explode(' ',trim($image->created_at))[1] }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{ explode(' ',trim($image->created_at))[0] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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
	            			<h3>Gallery Options</h3>
	            		</div>
	            		<div class="card-body">
                            <div class="col-md-12 text-center"> 
                                <a href="{{ asset('files/galleries/images/'. $gallery->image) }}" target="_blank">
                                    <img src="{{ asset('files/galleries/images/' . $gallery->image) }}" alt="Gallery Image" style="border-radius: 5px; max-width: 100%;">
                                </a>
                                <br><br>
                                <a href="{{ route('galleries.edit', $gallery->id) }}"><i class="fa-edit fa"></i> Edit This Gallery </a>
                                <br><br>
                                <form method="POST" action="{{ route('galleries.destroy', $gallery->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('This will delete your album and it\'s image complately. It is not reversible.\nIs this okay?')" class="btn btn-sm btn-block btn-default text-danger">Delete Gallery</button>
                                </form>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="panel panel-body">
                                <h4 class="text-center pt-1">Attach gallery to Items</h4>
                                <div class="col-md-12">
                                    <div class="row">
                                        <button type="button" class="badge badge-success col-3" data-toggle="modal" data-target="#GalSalonModal">Salon</button>
                                        <button type="button" class="badge badge-info col-3" data-toggle="modal" data-target="#GalShopModal">Shop</button>
                                        <button type="button" class="badge badge-success col-3" data-toggle="modal" data-target="#GalStyleModal">Style</button>
                                        <button type="button" class="badge badge-info col-3" data-toggle="modal" data-target="#GalProductModal">Product</button>
                                    </div>
                                </div>
                                {{-- modals for gallery attachment --}}
                                <div class="modal" id="GalSalonModal" tabindex="-1" role="dialog" aria-labelledby="GalSalonModal">
                                    <div class="modal-dialog animated zoomIn animated-3x" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title color-primary" id="edit{{ $i }}ModalLabel">Attach this gallery to your salon</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                                            </div>
                                            <form enctype="multipart/form-data" action="{{ route('galleries.update',$gallery->id) }}" method="POST">
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        @csrf
                                                        {{ method_field('PATCH') }}

                                                        @foreach ($errors->all() as $error)
                                                            <p class="alert alert-danger">{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Account Name </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="" value="" required>
                                                        </div>
                                                    </div>

                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-raised">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" id="GalShopModal" tabindex="-1" role="dialog" aria-labelledby="GalShopModal">
                                    <div class="modal-dialog animated zoomIn animated-3x" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title color-primary" id="edit{{ $i }}ModalLabel">Attach this salon to your shop</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                                            </div>
                                            <form enctype="multipart/form-data" action="{{ route('galleries.update',$gallery->id) }}" method="POST">
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        @csrf
                                                        {{ method_field('PATCH') }}

                                                        @foreach ($errors->all() as $error)
                                                            <p class="alert alert-danger">{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Account Name </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="" value="" required>
                                                        </div>
                                                    </div>

                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-raised">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" id="GalStyleModal" tabindex="-1" role="dialog" aria-labelledby="GalStyleModal">
                                    <div class="modal-dialog animated zoomIn animated-3x" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title color-primary" id="edit{{ $i }}ModalLabel">Attack gallery to fashion style</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                                            </div>
                                            <form enctype="multipart/form-data" action="{{ route('galleries.update',$gallery->id) }}" method="POST">
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        @csrf
                                                        {{ method_field('PATCH') }}

                                                        @foreach ($errors->all() as $error)
                                                            <p class="alert alert-danger">{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Account Name </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="" value="" required>
                                                        </div>
                                                    </div>

                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-raised">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" id="GalProductModal" tabindex="-1" role="dialog" aria-labelledby="GalProductModal">
                                    <div class="modal-dialog animated zoomIn animated-3x" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title color-primary" id="edit{{ $i }}ModalLabel">Attach this gallery to a shop product</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                                            </div>
                                            <form enctype="multipart/form-data" action="{{ route('galleries.update',$gallery->id) }}" method="POST">
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        @csrf
                                                        {{ method_field('PATCH') }}

                                                        @foreach ($errors->all() as $error)
                                                            <p class="alert alert-danger">{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Account Name </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="" value="" required>
                                                        </div>
                                                    </div>

                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-raised">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
	            		</div>
	            	</div>
                    <div class="card card-body">
                        <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                                    
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">

                            <section class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mt-3">
                                                <label for="file-item">Browse for image :</label>
                                                <input type="file" id="file-item" name="image" accept=".jpg, .png, .jpeg" required>
                                            </div>
                                        </div>
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
                                <button type="submit" class="btn btn-raised btn-sm btn-primary" style="min-width: 150px;">Upload Image</button>
                            </div>
                        </form>

                    </div>
	            </section>
	        </div>
	    </div>
	</div>
</div>
@endsection
@section('scripts') @endsection