@extends('layouts.site')
@section('title') {{ $type }} Messages @endsection
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px; text-transform: capitalize;"> {{ $type }} Messages </span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
                    	<li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
			            <li class="breadcrumb-item"><a href="{{ route('profile') }}"> <i class="fa fa-user"></i> Profile </a></li>
			            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-envelope"></i> Messages </li>
	                </ol>
	            </nav>
	        </div>
	    </div>
    </div>
@endsection
@section('content')
<div class="container mt-0" style="min-height: 500px;">
	<div class="row mt-0 pl-0">
		@include('layouts.includes.left_message')
		<div class="col-lg-9 ms-paper-content-container">
			<div class="ms-paper-content">
	            <section class="ms-component-section">
	            	<div class="card">
			            <section class="card-primary" style="padding: 5px 15px;">
			                <h3 class="card-title">
			                    @if($type == 'inbox')
			                        <i class="fa fa-envelope text-info"></i> Inboxed Messages 
			                    @elseif($type == 'draft')
			                        <i class="fa fa-envelope text-primary"></i> Drafted Messages
			                    @elseif($type == 'trash')
			                        <i class="fa fa-envelope text-danger"></i> Trashed Messages
			                    @elseif($type == 'spam')
			                        <i class="fa fa-envelope text-warning"></i> Spamed Messages
			                    @elseif($type == 'sent')
			                        <i class="fa fa-envelope text-success"></i> Sent Messages
			                    @elseif($type == 'important')
			                        <i class="fa fa-envelope text-danger"></i> Important Messages
			                    @elseif($type == 'urgent')
			                        <i class="fa fa-envelope text-success"></i> Urgent Messages
			                    @elseif($type == 'official')
			                        <i class="fa fa-envelope text-warning"></i> Official Messages
			                    @elseif($type == 'unofficial')
			                        <i class="fa fa-envelope text-info"></i> Unofficial Messages
			                    @elseif($type == 'normal')
			                        <i class="fa fa-envelope text-dark"></i> Normal Messages
			                    @elseif($type == 'all')
			                        <i class="fa fa-envelope text-primary"></i> All Messages
			                    @elseif($type == 'all')
			                        All Messages
			                    @else
			                        Messagess
			                    @endif
			                </h3>
			            </section>
			            <div class="col-md-12" style="overflow-x: auto;">
			                <div class="box box-primary">
				                <!-- /.box-header -->
				                <div class="no-padding">
				                  	<div class="mailbox-controls">
					                    <!-- Check all button -->
					                    <div class="btn-group">
					                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'trash') }}'"><i class="fa fa-trash-o"></i></button>
					                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'important') }}'"><i class="fa fa-star"></i></button>
					                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'spam') }}'"><i class="fa fa-fire"></i></button>
					                    </div>
					                    <!-- /.btn-group -->
					                    <a href=""><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
					                    <div class="pull-right">
					                        
					                    </div>
					                </div>
					                <div class="table-responsive mailbox-messages">
					                    <table class="table table-hover table-striped">
						                    <tbody>
						                        @if(sizeof($messages) < 1)
					                              	<tr>
					                                  	<td class="chb text-center text-info" colspan="6" style="vertical-align: middle;"> <i> No {{ $type }} message found! </i> </td>
					                              	</tr>
						                        @endif
						                        @foreach ($messages as $message)
						                            <tr class="@if($message->priority == 'seen') unread @else read @endif" @if ($message->priority == 'seen') style="background-color: #e9f9f9;" @endif>

				                                        @if($message->sender == Auth::user()->id)
				                                            <td class="user-image" style="vertical-align: middle;">
				                                                <img src="{{ App\User::where('id',$message->receiver)->first()->profile_image ? asset('/files/profile/images/'. App\User::where('id',$message->receiver)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="user" class="rounded-circle" width="30">
				                                            </td>
				                                            <td class="user-name" style="vertical-align: middle;">
				                                                <h6 class="m-b-0">{{ (App\User::where('id',$message->receiver)->first())->name }}</h6>
				                                            </td>
				                                        @else
				                                            <td class="user-image" style="vertical-align: middle;">
				                                                <img src="{{ App\User::where('id',$message->sender)->first()->profile_image ? asset('/files/profile/images/'. App\User::where('id',$message->sender)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="user" class="rounded-circle" width="30">
				                                            </td>
				                                            <td class="user-name" style="vertical-align: middle;">
				                                                <h6 class="m-b-0">{{ (App\User::where('id',$message->sender)->first())->name }}</h6>
				                                            </td>
				                                        @endif
						                                <td class="contact pull-left" style="vertical-align: middle;">
						                                    <a class="link pull-left" href="{{ route('messages.show',[$message->id,'details']) }}">
				                                                @if($message->folder == 'important')
				                                                    <span class="btn btn-xs btn-danger m-r-10">{{ $message->folder }}</span>
				                                                @elseif($message->folder == 'urgent')
				                                                    <span class="btn btn-xs btn-success m-r-10">{{ $message->folder }}</span>
				                                                @elseif($message->folder == 'official')
				                                                    <span class="btn btn-xs btn-warning m-r-10">{{ $message->folder }}</span>
				                                                @elseif($message->folder == 'unofficial')
				                                                    <span class="btn btn-xs btn-info m-r-10">{{ $message->folder }}</span>
				                                                @elseif($message->folder == 'normal')
				                                                    <span class="btn btn-xs btn-default m-r-10">{{ $message->folder }}</span>
				                                                @else
				                                                    <span class="btn btn-xs btn-primary m-r-10 text-primary">{{ $message->folder }}</span>
				                                                @endif
				                                            </a>
				                                        </td>
				                                        <td class="contact" style="vertical-align: middle;">
				                                          	<a  href="{{ route('messages.show',[$message->id,'details']) }}">
				                                                <span class="blue-grey-text text-darken-4">
				                                                    <b>{{ $message->title }}</b>
				                                                </span> 
				                                                {{ strlen($message->message) > 20 ? substr($message->message, 0, 20) . '... ' : $message->message }}
				                                            </a>
						                                </td>
					                                  	@if($message->attachment) 
				                                            <td class="clip" title="This is a public (group) message sent to all!" style="vertical-align: middle;"><i class="fa fa-users"></i></td> <!-- fa fa-paperclip -->
				                                            <td class="time" title="This is a public (group) message sent to all!" style="vertical-align: middle;"> {{ $message->created_at }} </td>
				                                        @else
				                                            <td colspan="2" class="time" title="{{ explode(' ', trim($message->created_at))[0] . ', ' . explode(' ', trim($message->created_at))[1] }}" style="vertical-align: middle;"> {{ $message->created_at }} </td>
				                                        @endif
						                            </tr>
						                        @endforeach
					                        </tbody>
					                    </table>
					                    <!-- /.table -->
					                </div>
					                <!-- /.mail-box-messages -->
					                <br>
				                </div>
				                <!-- /.box-body -->
				                <div class="box-footer no-padding">
				                    <div class="btn-group">
				                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'trash') }}'"><i class="fa fa-trash-o"></i></button>
				                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'important') }}'"><i class="fa fa-star"></i></button>
				                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'spam') }}'"><i class="fa fa-fire"></i></button>
				                    </div>
				                    <!-- /.btn-group -->
				                    <a href=""><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
				                    <div class="pull-right">
				                        {{ $messages->links() }}
				                    </div>
				                </div>
				                <br style="visibility: hidden;">
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