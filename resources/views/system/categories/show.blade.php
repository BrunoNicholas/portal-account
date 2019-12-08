@extends('layouts.site')
@section('title', 'Category Details')
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Category Details</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
	                    	<li class="breadcrumb-item"><a href="{{ route('categories.index') }}"> <i class="fa fa-tree"></i> Categories</a></li>
				            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-paperclip"></i> View Category </li>
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
		                <div class="card-body">
		                    <div class="table-responsive">
		                        <table id="example23" class="table table-striped table-bordered table-hoverable" width="100%" cellspacing="0">
		                        	@if($category->name)
			                        	<div class="form-group row mt-0">
						                    <label class="col-md-4 col-form-label text-right"> Category Name
						                    </label>
						                    <div class="col-md-8">
						                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" disabled>
						                    </div>
						                </div>
					                @endif
					                @if($category->categories_id)
						                <div class="form-group row mt-0">
						                    <label class="col-md-4 col-form-label text-right"> Major Category </label>
						                    <div class="col-md-8">
						                        <input type="text" class="form-control" name="name" value="{{ App\Models\Categories::where('id',$category->categories_id)->first()->display_name }}" disabled>
						                    </div>
						                </div>
					                @endif
					                @if($category->display_name)
						                <div class="form-group row mt-0">
						                    <label class="col-md-4 col-form-label text-right"> Display Name </label>
						                    <div class="col-md-8">
						                        <input type="text" class="form-control" name="display_name" value="{{ $category->display_name }}" disabled>
						                    </div>
						                </div>
					                @endif
					                @if($category->type)
						                <div class="form-group row mt-0">
						                    <label class="col-md-4 col-form-label text-right"> Type </label>
						                    <div class="col-md-8">
						                        <input type="text" class="form-control" name="type" value="{{ $category->type }}" disabled>
						                    </div>
						                </div>
					                @endif
					                @if($category->description)
						                <div class="form-group row mt-0">
						                    <label class="col-md-4 col-form-label text-right"> Description </label>
						                    <div class="col-md-8">
						                        <textarea class="form-control" name="description" disabled>{{ $category->description }}</textarea>
						                    </div>
						                </div>
					                @endif
					                <hr>
					                @if($category->user_id)
						                <div class="form-group row mt-0">
						                    <label class="col-md-4 col-form-label text-right"> Added By </label>
						                    <div class="col-md-8">
						                        <input type="text" class="form-control" name="type" value="{{ App\User::where('id',$category->user_id)->first()->name }}" disabled>
						                    </div>
						                </div>
					                @endif
					                @if($category->created_at)
						                <div class="form-group row mt-0">
						                    <label class="col-md-4 col-form-label text-right"> Date Added </label>
						                    <div class="col-md-8">
						                        <input type="text" class="form-control" name="type" value="{{ $category->created_at }}" disabled>
						                    </div>
						                </div>
					                @endif
					                @if($category->updated_at)
						                <div class="form-group row mt-0">
						                    <label class="col-md-4 col-form-label text-right"> Previously Updated </label>
						                    <div class="col-md-8">
						                        <input type="text" class="form-control" name="type" value="{{ $category->updated_at }}" disabled>
						                    </div>
						                </div>
					                @endif
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
		                	<div class="row text-center">
		                        <div class="col-md-6">
		                            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-rounded btn-block"><i class="fa fa-angle-double-left"></i> Back </a>
		                        </div>
		                        <div class="col-md-6">
		                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
		                                {{ csrf_field() }}
		                                {{ method_field('DELETE') }}
		                                <div class="tools">
		                                    <button type="submit" class="btn btn-danger btn-rounded btn-block"
		                                        onclick="return confirm('You are about to delete this category!\nThis is not reversible!')" title="Delete now!"><i class="fa fa-trash"></i> Delete </button>
		                                </div>
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