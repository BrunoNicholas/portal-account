@extends('layouts.site')
@section('title', 'Galleries')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">My Account Galleries  @permission('can_make_image_uploads') <button class="btn btn-xs btn raised btn-success text-primary" onclick="window.location='{{ route('galleries.create') }}'"> Add New </button> @endpermission</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
            			<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-image"></i> Galleries </li>
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
	            	<div class="card"> <?php $i=0; ?>
                        <div class="card-body">
                            <div class="row">
                                @if(sizeof($galleries) < 1)
                                    <p class="col-md-12 alert alert-danger text-center" style="padding-left: 50px;"> No gallery items found! @permission('can_make_image_uploads')<button class="btn btn-xs btn raised btn-success pull-right text-white" onclick="window.location='{{ route('galleries.create') }}'">Add New</button>@endpermission</p>
                                @endif
                                @foreach($galleries as $gallery)
                                    <div class="col-md-3" style="padding-top: 10px;" onclick="window.location='{{ route('galleries.show', $gallery->id) }}'">
                                        <div class="" style="border: thin solid transparent;">
                                            <div class="el-card-item">
                                                <div class="el-card-avatar el-overlay-1" style="text-align: center;"> 
                                                    <div style="max-width: 450px; overflow-x: hidden;">
                                                        <img src="{{ asset('files/galleries/images/'. $gallery->image) }}" alt="image" style=" height: 200px; width: auto; border-radius: 5px;"/>
                                                    </div>
                                                    <div class="el-overlay">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="text-muted">
                                                                    {{ $gallery->images->count() }} Images 
                                                                    @if($gallery->company_id || $gallery->shop_id || $gallery->salon_id || $gallery->style_id || $gallery->product_id)
                                                                    <i class="fa fa-check color-primary"></i>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="col-md-6" title="Date the gallery was added. Time: {{ explode(' ', trim($gallery->created_at))[1] }}">
                                                                <span>{{ explode(' ', trim($gallery->created_at))[0] }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="el-card-content">
                                                    <div class="row">                                                    
                                                        <div class="col-md-4 pull-left">
                                                            
                                                        </div>
                                                        <div class="col-md-8 pull-right">
                                                            
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
	            </section>
	        </div>
	    </div>
	</div>
</div>
{{--  @include('layouts.includes.footer')  --}}
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