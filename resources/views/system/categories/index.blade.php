@extends('layouts.site')
@section('title', 'Categories')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">System Categories</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
			            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-tree"></i> Categories </li>
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
		                <div class="card-body">
		                    <div class="table-responsive">
		                        <table id="example23" class="table table-striped table-bordered table-hoverable" width="100%" cellspacing="0">
		                            <thead>
		                                <tr>
		                                    <th class="text-center;">#</th>
		                                    <th class="text-left;">Name</th>
		                                    <th class="text-left;">Main</th>
		                                    <th class="text-left;">Type</th>
		                                    <th class="text-left;">Display name</th>
		                                    <th class="text-center;">Status</th>
		                                    <th class="text-center;">Actions</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $i=0; ?>
		                                @foreach($categories as $category)
		                                	<tr>
		                                		<td>{{ ++$i }}</td>
		                                		<td class="text-left;">{{ $category->name }}</td>
		                                		<td class="text-left;">{{ $category->categories_id }}</td>
		                                		<td class="text-left;">{{ $category->type }}</td>
		                                		<td class="text-left;">{{ $category->display_name }}</td>
		                                		<td class="text-center"> {{ $category->status }} </td>
		                                		<td class="text-center" style="min-width: 110px;">
		                                			<div class="col-md-12">
			                                			<div class="row" style="">
			                                				<a href="{{ route('categories.show', $category->id) }}" class="color-success col-6" title="Category Details" style="">
			                                					<i class="fa fa-info-circle" style="font-size: 15px;"></i>
			                                				</a>
				                                        	<button class="color-primary col-6"  data-toggle="modal" data-target="#my{{ $category->id }}Modal" style="border: none;">
				                                        		<i class="fa fa-edit" title="Edit category details" style="font-size: 15px;"></i>
				                                        	</button>
				                                        </div>
				                                    </div>
		                                		</td>
		                                		<div class="modal" id="my{{ $category->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												    <div class="modal-dialog animated zoomIn animated-3x" role="document">
												        <div class="modal-content">
												            <div class="modal-header">
												                <h3 class="modal-title color-primary" id="myModalLabel"> {{ $category->display_name }} - Edit Details</h3>
												                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
												            </div>
												            <form action="{{ route('categories.update', $category->id) }}" class="form-horizontal form-bordered" method="post">
												            	<div class="modal-body">
														            @csrf
														            {{ method_field('PATCH') }}

														            @foreach ($errors->all() as $error)
														            	<p class="alert alert-danger">{{ $error }}</p>
														            @endforeach

														            <input type="hidden" name="_token" value="{{ csrf_token() }}">
														            <input type="hidden" name="user_id" value="{{ $category->user_id }}">
													                <div class="form-group row mt-0">
													                    <label class="col-md-4 col-form-label text-right"> Category Name </label>
													                    <div class="col-md-8">
													                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" autofocus required>
													                    </div>
													                </div>
													                <div class="form-group row mt-0">
													                    <label class="col-md-4 col-form-label text-right"> Major Category </label>
													                    <div class="col-md-8">
													                        <select class="form-control" name="categories_id">
													                        	<option value="{{ $category->categories_id }}">Skip not to change</option>
													                        	@foreach($categories as $cat)
													                        		<option value="{{ $cat->id }}">{{ $cat->display_name }}</option>
													                        	@endforeach
													                        </select>
													                    </div>
													                </div>
													                <div class="form-group row mt-0">
													                    <label class="col-md-4 col-form-label text-right">Display Name </label>
													                    <div class="col-md-8">
													                        <input type="text" class="form-control" name="display_name" value="{{ $category->display_name }}" required>
													                    </div>
													                </div>
													                <div class="form-group row mt-0">
													                    <label class="col-md-4 col-form-label text-right"> Type </label>
													                    <div class="col-md-8">
													                        <input type="text" class="form-control" name="type" value="{{ $category->type }}" placeholder="shop,salon,hair,face,body">
													                    </div>
													                </div>
													                <div class="form-group row mt-0">
													                    <label class="col-md-4 col-form-label text-right"> Description </label>
													                    <div class="col-md-8">
													                        <textarea class="form-control" name="description" placeholder="Describe category">{{ $category->description }}</textarea>
													                    </div>
													                </div>
													                <div class="form-group row mt-0">
													                    <label class="col-md-4 col-form-label text-right"> Status </label>
													                    <div class="col-md-8">
													                    	<div class="row">
													                    		<div class="col-md-5">
													                    			<div class="form-check radio pt-2">
			                                        									<label class="form-radio-label">
			                                        										<input type="radio" name="status" value="active" @if ($category->status == 'active')
			                                        											checked
			                                        										@endif> Active
			                                        									</label>
			                                        								</div>
													                    		</div>
													                    		<div class="col-md-5">
													                    			<div class="form-check radio pt-2">
			                                        									<label class="form-radio-label">
			                                        										<input type="radio" name="status" value="pending" @if ($category->status == 'pending')
			                                        											checked
			                                        										@endif> Pending
			                                        									</label>
			                                        								</div>
													                    		</div>
													                    	</div>
													                    </div>
													                </div>
													            </div>
													            <div class="modal-footer">
													                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													                <button type="submit" class="btn  btn-primary">Save Changes</button>
													            </div>
												            </form>
												        </div>
												    </div>
												</div>
		                                	</tr>
		                                @endforeach
		                            </tbody>
		                        </table>
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
		                <div class="card-body">
		                	<h4 class="text-center">Create new category</h4>
		                	<form action="{{ route('categories.store') }}" class="form-horizontal form-bordered" method="post" style="padding: 0px;">
					            @csrf
					            @foreach ($errors->all() as $error)
					            	<p class="alert alert-danger">{{ $error }}</p>
					            @endforeach

					            <input type="hidden" name="_token" value="{{ csrf_token() }}">
					            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

					            <div class="form-body">
					                <div class="form-group row mt-0">
					                    <label class="col-md-5 col-form-label text-right"> Name <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-7">
					                        <input type="text" class="form-control" name="name" autofocus required>
					                    </div>
					                </div>
					                <div class="form-group row mt-0">
					                    <label class="col-md-5 col-form-label text-right"> Major </label>
					                    <div class="col-md-7">
					                        <select class="form-control" name="categories_id">
					                        	<option value="">Leave empty if major</option>
					                        	@foreach($categories as $cat)
					                        		<option value="{{ $cat->id }}">{{ $cat->display_name }}</option>
					                        	@endforeach
					                        </select>
					                    </div>
					                </div>
					                <div class="form-group row mt-0">
					                    <label class="col-md-5 col-form-label text-right">Display Name <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-7">
					                        <input type="text" class="form-control" name="display_name" required>
					                    </div>
					                </div>
					                <div class="form-group row mt-0">
					                    <label class="col-md-5 col-form-label text-right"> Type <span class="text-danger">*</span>
					                    </label>
					                    <div class="col-md-7">
					                        <input type="text" class="form-control" name="type" placeholder="shop,salon,hair,face,body">
					                    </div>
					                </div>
					                <div class="form-group row mt-0">
					                    <label class="col-md-5 col-form-label text-right"> Description </label>
					                    <div class="col-md-7">
					                        <textarea class="form-control" name="description" placeholder="Describe category"></textarea>
					                    </div>
					                </div>
					                <div class="form-group row mt-0 justify-content-center">
					                  <div class="col-lg-12">
					                    <button type="submit" class="btn btn-block btn-raised btn-primary">Save</button>
					                  </div>
					                </div>
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