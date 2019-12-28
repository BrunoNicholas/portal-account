@extends('layouts.site')
@section('title', 'View Gallery')
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
			                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-image"></i> View Gallery </li>
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
                                                        <div style="max-width: 450px; overflow-x: auto;">
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
                                                    <div class="el-card-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4 class="block">
                                                                    <b class="pull-left">{{ substr($image->title, 0,17) . '...' }} 
                                                                        <small>
                                                                        </small>
                                                                    </b> 
                                                                    <small class="pull-right">
                                                                        
                                                                    </small>
                                                                </h4>
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
	            			<div class="row">
	                            <div class="col-md-12"> 
	                                <a href="{{ asset('files/galleries/images/'. $gallery->image) }}" target="_blank">
	                                    <img src="{{ asset('files/galleries/images/' . $gallery->image) }}" alt="Gallery Image" style="border-radius: 5px; max-width: 100%;">
	                                </a>
	                                <hr>
	                                <a href="{{ route('galleries.edit', $gallery->id) }}"><i class="fa-edit fa"></i> Edit This Gallery </a>
	                                <hr>
	                                <form method="POST" action="{{ route('galleries.destroy', $gallery->id) }}">
	                                    {{ csrf_field() }}
	                                    {{ method_field('DELETE') }}
	                                    <button type="submit" onclick="return confirm('This will delete your album and it\'s image complately. It is not reversible.\nIs this okay?')" class="btn btn-sm btn-block btn-default text-danger">Delete Gallery</button>
	                                </form>
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