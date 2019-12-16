@extends('layouts.site')
@section('title', 'Images')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Images @permission('can_make_image_uploads') <button class="btn btn-xs btn raised btn-success text-primary" onclick="window.location='{{ route('images.create') }}'"> Add New </button> @endpermission</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
			            <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}"> <i class="fa fa-image"></i> Galleries </a></li>
			            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-image"></i> Images </li>
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
                            <?php $i=0; ?>
                            <div class="card-body">
                                <div class="row">
                                    @if(sizeof($images) < 1)
                                        <p class="col-md-12 alert alert-danger" style="padding-left: 50px;"> No image items found! </p>
                                    @endif
                                    @foreach($galleries as $gallery)
                                        <div id="{{ $gallery->id }}" class="col-md-12" style="border-bottom: thin solid #e6e6e6; padding-bottom: 5px;">
                                            <div class="card">
                                                <div class="card-header text-center" onclick="window.location='{{ route('galleries.show',$gallery->id) }}'">
                                                    <h3>
                                                    	<img src="{{ asset('files/galleries/images/' . $gallery->image) }}" style="width: 35px; border-radius: 50%;" alt="g-img">
                                                    	{{ $gallery->gallery_name }}
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    @foreach($gallery->images as $image)
                                                        <div class="col-md-3" style="padding-top: 10px;" onclick="window.location='{{ route('images.show',$image->id) }}'">
                                                            <div class="card" style="border: thin solid transparent;">
                                                                <div class="el-card-item">
                                                                    <div class="el-card-avatar el-overlay-1" style="text-align: center;"> 
                                                                        <div style="max-width: 450px; overflow-x: auto;">
                                                                            <img src="{{ asset('files/others/images/'. $image->image) }}" alt="image" style=" height: 200px; width: auto; border-radius: 3px;"/>
                                                                        </div>
                                                                        <div class="el-overlay">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    {{ explode(' ',trim($image->created_at))[0] }}
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    {{ explode(' ',trim($image->created_at))[1] }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="el-card-content">
                                                                        <div class="row">
                                                                            <div class="col-md-12 ml-1">
                                                                                <span class="pull-left">{{ substr($image->title, 0,17) . '...' }} 
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
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

	            </section>
	        </div>
	    </div>
	</div>
</div>
@include('layouts.includes.footer')
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script>
	    $('#example23').DataTable({
	        dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
	    });
	</script>
@endsection