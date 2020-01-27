@extends('layouts.site')
@section('title', 'Message Details')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
			<div class="d-flex no-block align-items-center col-md-4">
				<span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">View Message</span>
			</div>
	        <div class="d-flex no-block justify-content-end col-md-8">
	            <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
	                <ol class="breadcrumb">
			            <li class="breadcrumb-item"><a href="{{ route('profile') }}"> <i class="fa fa-user"></i> Profile </a></li>
			            <li class="breadcrumb-item"><a href="{{ route('messages.index','inbox') }}">  <i class="fa fa-envelope"></i> Messages </a></li>
			            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Message Details </li>
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
			                <h3 class="card-title"> <i class="fa-envelope-open fa text-info"></i> Message Details <small> (<span class="text-primary">{{ $message->folder }}</span>)</small></h3>
			            </section>
			            <div class="col-md-12" style="overflow-x: auto;">
			            	<div class="box box-primary">
			            <div class="box-header with-border">
				            <div class="box-tools pull-right">
				                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
				                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
				            </div>
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body no-padding">
				            <div class="mailbox-read-info">
				                <h5>
			                        @if($message->receiver == Auth::user()->id)
			                            <h5 class="m-b-0 font-16 font-medium">
			                            	<a href="{{ route('profile') }}">
						                        <img src="{{ App\User::where('id',$message->receiver)->first()->profile_image ? asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->first())->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="user" class="rounded-circle" width="45" style="border-radius: 50%;"> ME
						                        
			                                	<small> ( {{ (App\User::where('id',$message->receiver)->first())->email }} )</small>
			                            	</a>
			                            </h5>
			                        @else
			                            <h5 class="m-b-0 font-16 font-medium">
			                            	<a href="{{ route('users.show',$message->receiver) }}">
			                            		<img src="{{ App\User::where('id',$message->receiver)->first()->profile_image ? asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->first())->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="user" class="rounded-circle" width="45" style="border-radius: 50%;">
			                            		{{ (App\User::where('id',$message->receiver)->get()->first())->name }}
			                                	<small>
			                                		( {{ (App\User::where('id',$message->receiver)->get()->first())->email }} )
			                                	</small>
			                            	</a>
			                            </h5>
			                        @endif
			                        <span> From: 
			                            @if($message->sender == Auth::user()->id)
			                            	<img src="{{ App\User::where('id',$message->sender)->first()->profile_image ? asset('/files/profile/images/'. (App\User::where('id',$message->sender)->first())->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="user" class="rounded-circle" width="25" style="border-radius: 50%;">
			                                <a href="{{ route('profile') }}"> <b>Me</b> </a>
			                            @else
			                            	<img src="{{ App\User::where('id',$message->sender)->first()->profile_image ? asset('/files/profile/images/'. App\User::where('id',$message->sender)->first()->profile_image) : asset('files/defaults/images/profile.jpg') }}" alt="user" class="rounded-circle" width="35" style="border-radius: 50%;">
			                                <a href="{{ route('users.show',$message->sender) }}"><b>{{ (App\User::where('id',$message->sender)->get()->first())->email . ' - ' . (App\User::where('id',$message->sender)->get()->first())->name  }}</b></a>
			                            @endif
			                        </span>
				                	<span class="mailbox-read-time pull-right"> <b>{{ explode(' ', trim($message->created_at))[1] }}</b>, {{ explode(' ', trim($message->created_at))[0]  }}</span>
				                </h5>
				            </div>
				              <!-- /.mailbox-read-info -->
				              	@if($message->receiver == Auth::user()->id)
					              	<div class="mailbox-controls with-border text-center">
						                <div class="btn-group">
						                    <form action="{{ route('messages.update',[$message->id,'delete']) }}" method="post" style="margin: 2px;" class="pull-left">
						                        {{ csrf_field() }}
						                        {{ method_field('PATCH') }}
						                        <input type="hidden" name="sender" value="{{ $message->sender }}">
						                        <input type="hidden" name="receiver" value="{{ $message->receiver }}">
						                        <input type="hidden" name="message" value="{{ $message->message }}">
						                        <input type="hidden" name="status" value="spam">
						                        <button type="submit" class="btn btn-outline-primary font-18" title="Send to spam">
						                            <i class="fa fa-filter" title="Move to Spam"></i>
						                        </button>
						                    </form>
						                    <form action="{{ route('messages.update',[$message->id,'delete']) }}" method="post" style="margin: 2px;" class="pull-left">
						                        {{ csrf_field() }}
						                        {{ method_field('PATCH') }}
						                        <input type="hidden" name="sender" value="{{ $message->sender }}">
						                        <input type="hidden" name="receiver" value="{{ $message->receiver }}">
						                        <input type="hidden" name="message" value="{{ $message->message }}">
						                        <input type="hidden" name="status" value="trash">
						                        <button type="submit" class="btn btn-outline-primary font-18" title="Move to trash">
						                            <i class="fa fa-trash-o" title="Move to Trash"></i>
						                        </button>
						                    </form>
						                </div>
					              	</div>
					            @else
					            <br>
					        @endif
				            <!-- /.mailbox-controls -->
				            <div class="mailbox-read-message">
				                <p>@if($message->title )<big>{{ $message->title }}</big>@else <i>No title specified</i>@endif</p>

				                <textarea class="form-control" rows="12" style="overflow-y: auto;border: none; background-color: #fff; color: #000; padding-top: 5px;" disabled>{{ $message->message }}</textarea>
				            </div>
				            <!-- /.mailbox-read-message -->
			            </div>
			            <div class="box-footer">
				            <div class="pull-right">
				            	@if($message->sender != Auth::user()->id)
				                	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#replyModal" data-whatever="@mdo"><i class="fa fa-reply"></i> Reply</button>
				                	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
					                    <div class="modal-dialog" role="document">
					                        <div class="modal-content">
					                            <div class="modal-header">
					                                <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
					                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                            </div>
					                            <form action="{{ route('messages.store','inbox') }}" method="POST">
					                                @csrf
					                                @foreach ($errors->all() as $error)
					                                    <p class="alert alert-danger">{{ $error }}</p>
					                                @endforeach

					                                @if (session('success'))
					                                    <div class="alert alert-success">
					                                        {{ session('success') }}
					                                    </div>
					                                @endif
					                                <div class="modal-body">
					                                    <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
					                                    <input type="hidden" name="receiver" value="{{ $message->sender }}">
					                                    <input type="hidden" name="status" value="inbox">
					                                    <div class="form-group">
					                                        <div class="row">
					                                            <div class="col-md-6">
					                                                <label for="recipient-name" class="control-label">Topic:</label>
					                                                <input type="text" class="form-control" id="recipient-name1" name="title" value="{{ $message->title }}">
					                                            </div>
					                                            <div class="col-md-6">
					                                                <label for="priority">Priority</label>
					                                                <select class="custom-select form-control" name="folder">
					                                                    <option value="normal">Select priority</option>
					                                                    <option value="important">Important</option>
					                                                    <option value="urgent">Urgent</option>
					                                                    <option value="official">Official</option>
					                                                    <option value="unofficial">Unofficial</option>
					                                                    <option value="normal">Normal</option>
					                                                    <option value="">None</option>
					                                                </select>
					                                            </div>
					                                        </div>
					                                    </div>
					                                    <div class="form-group">
					                                        <label for="message-text" class="control-label">Message:</label>
					                                        <textarea class="form-control" id="message-text1" name="message">



                                	
-----------------------------------
- [ Reply from {{ explode(' ', trim(App\User::where('id', $message->sender)->get()->first()->name))[0] }}'s sent message. ]

- {{ $message->message }}
___________________________________
					                                        </textarea>
					                                    </div>
					                                </div>
					                                <div class="modal-footer">
					                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					                                    <button type="submit" class="btn btn-primary">Send message</button>
					                                </div>
					                            </form>
					                        </div>
					                    </div>
					                </div>
				                @endif
				                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#forwardModal" data-whatever="@fat"><i class="fa fa-share"></i> Forward</button>
				                <div class="modal fade" id="forwardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
				                    <div class="modal-dialog" role="document">
				                        <div class="modal-content">
				                            <form action="{{ route('messages.store','inbox') }}" method="POST">
				                                @csrf
				                                @foreach ($errors->all() as $error)
				                                    <p class="alert alert-danger">{{ $error }}</p>
				                                @endforeach

				                                @if (session('success'))
				                                    <div class="alert alert-success">
				                                        {{ session('success') }}
				                                    </div>
				                                @endif
				                                <div class="modal-header">
				                                    <h4 class="modal-title" id="exampleModalLabel1">Forward this message</h4>
				                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                                </div>
				                                <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
				                                <input type="hidden" name="folder" value="{{ $message->folder }}">
				                                <input type="hidden" name="title" value="{{ $message->title }}">
				                                <input type="hidden" name="priority" value="unseen">
				                                <input type="hidden" name="status" value="inbox">
				                                <div class="modal-body">
				                                    <div class="form-group">
				                                        <label for="recipient-name" class="control-label">Recipient:</label>
				                                        <select class="custom-select form-control" name="receiver">
				                                            @foreach($users as $user)
				                                                @if($user->id != Auth::user()->id)
				                                                    <option value="{{ $user->id }}" title="{{ (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}">{{ $user->name . ' - ' . $user->email }}</option>
				                                                @endif
				                                            @endforeach
				                                        </select>
				                                    </div>
				                                    <div class="form-group">
				                                        <label for="message-text" class="control-label">Message:</label>
				                                        <textarea class="form-control" id="message-text1" name="message">{{ $message->message }}



-----
- [ Forwarded from {{ App\User::where('id',$message->sender)->get()->first()->name }} ]
- >>{{ $message->created_at }}
___________________________________
				                                        </textarea>
				                                    </div>
				                                </div>
				                                <div class="modal-footer">
				                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                                    <button type="submit" class="btn btn-primary">Send message</button>
				                                </div>
				                            </form>
				                        </div>
				                    </div>
				                </div>
				            </div>
				            @if($message->receiver == Auth::user()->id || $message->priority == 'unseen')
					            <form action="{{ route('messages.destroy',[$message->id,'delete']) }}" method="post">
				                	{{ csrf_field() }} {{ method_field('DELETE') }}
				                	<button type="submit" class="btn btn-danger" onclick="return confirm('You are about to delete this message completely from all viewers!\nThis is not reversible!')" title="This lets you delete this message completely."><i class="fa fa-trash-o"></i> Delete</button>
				                </form>
			                @endif
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