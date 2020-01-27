@extends('layouts.site')
@section('title', 'View Image')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Image Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
		                <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}"> <i class="fa fa-image"></i> Galleries </a></li>
		                <li class="breadcrumb-item"><a href="{{ route('images.index') }}"> <i class="fa fa-image"></i> Images </a></li>
		                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-image"></i> View Image </li>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-7 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<div class="card card-primary">
		                <div class="card-header with-border">
		                    <h3 class="card-title text-center">		                        
		                        Image Details | {{ config('app.name') }}
		                    </h3>
		                </div>
		                <div class="card-body">
		                    <div class="row text-center">
		                        <div class="col-md-12">
		                            <img src="{{ $image->image ? asset('files/others/images/' . $image->image) : asset('start/images/icons/favicon.png') }}" alt="image image" style="border-radius: 3px; width: 100%;">
		                        </div>
		                        <div class="col-md-12" style="margin-top: 5px; margin-bottom: 5px;">
		                            <div class="form-control">
		                                Added By: <a href="{{ route('users.show',$image->user_id) }}"> {{ App\User::where('id',$image->user_id)->get()->first()->name }} </a>
		                            </div>
		                        </div>
		                            <div class="col-md-6">
		                                <a href="{{ route('images.edit', $image->id) }}" class="btn btn-info btn-sm btn-xs btn-block"><i class="fa fa-edit"></i> Edit image</a>
		                            </div>
		                            <div class="col-md-6">
		                                <form method="POST" action="{{ route('images.destroy', $image->id) }}">
		                                    {{ csrf_field() }}
		                                    {{ method_field('DELETE') }}
		                                    <div class="tools">
		                                        <button type="submit" class="btn btn-danger btn-xs btn-block"
		                                            onclick="return confirm('You are about to delete this image!\nThis is not reversible!')" title="This will delete this entire image"><i class="fa fa-trash"></i> Delete </button>
		                                    </div>
		                                </form>
		                            </div>
		                    </div>
		                </div>
		            </div>
                    <div class="card">
                        <div class="card-header"><h4 style="width: 100%; text-align: center;"> View Image Details </h4></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table m-b-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Description</th>
                                        </tr>
                                    </thead>
                                    <?php $i=0; ?>
                                    <tbody>
                                        @if($image->image)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Image: </th>
                                                <td style="text-align: left;"><a href="{{ asset('files/others/images/'.$image->image) }}" target="_blank">Image File</a></td>
                                            </tr>
                                        @endif
                                        @if($image->gallery_id)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Image Gallery: </th>
                                                <td style="text-align: left;">
                                                    <a href="{{ route('galleries.show',$image->gallery_id) }}"> 
                                                        <img src="{{ asset('files/galleries/images/' . App\Models\Gallery::where('id',$image->gallery_id)->first()->image) }}" style="width: 30px; border-radius: 50%;" alt="g-img"> 
                                                        {{ App\Models\Gallery::where('id',$image->gallery_id)->first()->gallery_name }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                        @if($image->image_size)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Image Size/Caption: </th>
                                                <td style="text-align: left;">{{ $image->image_size }}</td>
                                            </tr>
                                        @endif
                                        @if($image->title)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Gallery Image Title: </th>
                                                <td style="text-align: left;">{{ $image->title }}</td>
                                            </tr>
                                        @endif
                                        @if($image->size)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Default Image Size: </th>
                                                <td style="text-align: left;">{{ $image->size }}</td>
                                            </tr>
                                        @endif
                                        @if($image->user_id)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Added By: </th>
                                                <td style="text-align: left;">
                                                    <a href="{{ route('users.show',$image->user_id) }}" target="_blank">
                                                        <img src="{{ App\User::where('id',$image->user_id)->first()->profile_image ? asset('files/profile/images/' . App\User::where('id',$image->user_id)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="width: 30px; border-radius: 50%;" alt="author"> 
                                                        {{ App\User::where('id',$image->user_id)->first()->name }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                        @if($image->description)
                                            <tr>
                                                <th style="text-align: right; max-width: 100px;">Description: </th>
                                                <td style="text-align: left;">
                                                    <textarea class="form-control" disabled style="background-color: #fff; border: thin solid transparent;">{{ $image->description }}</textarea>
                                                </td>
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
        <div class="col-lg-5 ms-paper-content-container">
            <div class="ms-paper-content">
                <section class="ms-component-section">
                    <div class="card card-primary">
                        <div class="card-header"><h4 class="text-center"> Other Related Images </h4></div>
                        <div class="card-body"> <!-- {{ $gallery = App\Models\Gallery::where('id',$image->gallery_id)->first() }} -->
                            <div class="row">
                                @foreach($gallery->images as $img)
                                    @if($img != $image)
                                        <div class="col-md-6 mt-2" onclick="window.location='{{ route('images.show',$img->id) }}'">
                                            <div>
                                                <div class="el-card-item">
                                                    <div class="card-avatar el-overlay-1" style="text-align: center;"> 
                                                        <div style="max-width: 450px; overflow-x: hidden;">
                                                            <img src="{{ asset('files/others/images/'. $img->image) }}" alt="image" style=" height: 200px; width: auto; border-radius: 3px;"/>
                                                        </div>
                                                        <div class="el-overlay">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    {{ explode(' ',trim($img->created_at))[1] }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{ explode(' ',trim($img->created_at))[0] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="row">
                                                            <div class="col-md-12 ml-2">
                                                                <span class="pull-left">
                                                                    {{ strlen($img->title) > 15 ? substr($img->title, 0, 15) . '... ' : $img->title }}
                                                                    <small>
                                                                    </small>
                                                                </span> 
                                                                <span class="pull-right">
                                                                    
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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