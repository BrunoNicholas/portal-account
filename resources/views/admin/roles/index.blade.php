@extends('layouts.site')
@section('title', 'Roles')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">User Roles</h4></span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
	                    <ol class="breadcrumb">
	                    	<li class="breadcrumb-item"><a href="{{ route('userhome') }}"> <i class="fa fa-home"></i> Home</a></li>
			                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
			                <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-lock"></i> User Roles </li>
				        </ol>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="card card-body container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		<div class="col-lg-12 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<h4 class="section-title no-margin-top">Manage the user roles &amp; permissions | <a href="{{ route('roles.create') }}" class="btn btn-sm btn-info"> <i class="fa-plus fa"></i>Add New</a></h4>
	            	<div class="panel box-v4">
		                <div class="panel-body">
		                    <div class="table-responsive">
		                        <table id="example23" class="table table-striped table-bordered table-hoverable" width="100%" cellspacing="0">
		                            <thead>
		                                <tr>
		                                    <th class="text-center;">#</th>
		                                    <th class="text-left;">Database Name</th>
		                                    <th class="text-left;">Display Name</th>
		                                    <th class="text-left;">Description</th>
		                                    <th class="text-left;">Date Added</th>
		                                    <th class="text-center;">Actions</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $i=0; ?>
		                                @foreach($roles as $role)
		                                    <tr>
		                                        <td>{{ ++$i }}</td>
		                                        <td class="text-left;" style="min-width: 150px;">{{ $role->name }}</td>
		                                        <td class="text-left;">{{ $role->display_name }}</td>
		                                        <td class="text-left;">{{ $role->description }}</td>
		                                        <td class="text-left;" style="text-transform: capitalize;">{{ $role->created_at  }}</td>
		                                        <td style="min-width: 150px;">
		                                        	<div class="row text-center" style="margin-left: 3px;">
			                                            <a href="{{ route('roles.show', $role->id) }}" class="col-5 btn btn-sm btn-success" title="User Details" style="margin: 2px;"><i class="fa fa-info-circle"></i></a>
			                                            <a href="{{ route('roles.edit', $role->id) }}" class=" col-5 btn btn-sm btn-primary" style="margin: 2px;"><i class="fa fa-edit" title="Edit User Profile"></i></a>
			                                        </div>
		                                        </td>
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