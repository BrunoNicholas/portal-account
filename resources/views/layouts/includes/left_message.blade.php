<div class="col-lg-3 ms-paper-content-container">
	@if(route('messages.create','all') == Request::fullUrl())
	    <a href="{{ route('messages.index', 'inbox') }}" class="btn btn-primary btn-block btn-raised animated margin-bottom"><i class="fa-envelope-o fa"></i> Inbox</a>
	@else
		<a href="{{ route('messages.create', 'all') }}" class="btn btn-primary btn-block btn-raised animated margin-bottom"><i class="fa-edit fa"></i> Compose</a>
	@endif

	<div class="box box-solid" style="margin-top: 10px; margin-bottom: 10px;">
	    <div class="box-header with-border">
		    <button type="button" class="btn btn-box-tool pull-right" style="padding: 2px;" data-widget="collapse"><i class="fa fa-minus"></i></button>
	      	<h4 class="box-title text-center pull-left">Message Sections</h4>
	    </div>
	    {{-- sections --}}
	    <div class="box-body no-padding">
	        <ul class="nav nav-pills nav-stacked col-12 mdc-card__supporting-text">
	            <li class="col-md-12 mdc-card__supporting-text @if(route('messages.index', 'inbox') == Request::fullUrl()) active @endif ">
	            	<a href="{{ route('messages.index', 'inbox') }}">
	            		<i class="fa fa-inbox"></i> Inbox
	            		@if($inboxCount > 0)<span class="dropdown-count pull-right"> {{ $inboxCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text @if(route('messages.index', 'sent') == Request::fullUrl()) active @endif ">
	            	<a href="{{ route('messages.index', 'sent') }}">
	            		<i class="fa fa-envelope-o"></i> Sent
	            		@if($sentCount > 0)<span class="label label-success pull-right"> {{ $sentCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text @if(route('messages.index', 'draft') == Request::fullUrl()) active @endif ">
	            	<a href="{{ route('messages.index', 'draft') }}">
	            		<i class="fa fa-file-text-o"></i> Drafts
	            		@if($draftCount > 0)<span class="label label-primary pull-right"> {{ $draftCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text @if(route('messages.index','spam') == Request::fullUrl()) active @endif ">
	            	<a href="{{ route('messages.index','spam') }}">
	            		<i class="fa fa-filter"></i> Spam 
	            		@if($spamCount > 0)<span class="label label-warning pull-right"> {{ $spamCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text @if(route('messages.index','trash') == Request::fullUrl()) active @endif ">
	            	<a href="{{ route('messages.index','trash') }}">
	            		<i class="fa fa-trash-o"></i> Trash 
	            		@if($trashCount > 0)<span class="label label-danger pull-right"> {{ $trashCount }} </span>@endif
	            	</a>
	            </li>
	        </ul>
	    </div>
	</div>
	<div class="box box-solid" style="margin-top: 10px; margin-bottom: 10px;">
	    <div class="box-header with-border">
	    	<button type="button" class="btn btn-box-tool pull-right" style="padding: 2px;" data-widget="collapse"><i class="fa fa-minus"></i></button>
	      	<h4 class="box-title">Message Categories</h4>
	    </div>
	    <div class="box-body no-padding">
	        <ul class="nav nav-pills nav-stacked">
	            <li class="col-md-12 mdc-card__supporting-text">
	            	<a href="{{ route('messages.index', 'important') }}">
	            		<i class="fa fa-circle-o text-red"></i> Important
	            		@if($impCount)<span class="label label-default pull-right text-info"> {{ $impCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text">
	            	<a href="{{ route('messages.index', 'urgent') }}">
	            		<i class="fa fa-circle-o text-yellow"></i> Urgent
	            		@if($urgCount)<span class="label label-default pull-right text-info"> {{ $urgCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text">
	            	<a href="{{ route('messages.index', 'official') }}">
	            		<i class="fa fa-circle-o text-warning"></i> Official
	            		@if($offCount)<span class="label label-default pull-right text-info"> {{ $offCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text">
	            	<a href="{{ route('messages.index', 'unofficial') }}">
	            		<i class="fa fa-circle-o text-info"></i> Unofficial
	            		@if($unoffCount)<span class="label label-default pull-right text-info"> {{ $unoffCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text">
	            	<a href="{{ route('messages.index', 'normal') }}">
	            		<i class="fa fa-circle-o text-light-blue"></i> Normal
	            		@if($normalCount)<span class="label label-default float-right text-info"> {{ $normalCount }} </span>@endif
	            	</a>
	            </li>
	            <li class="col-md-12 mdc-card__supporting-text">
	            	<a href="{{ route('messages.index', 'all') }}">
	            		<i class="fa fa-circle-o text-primary"></i> All
	            		@if($allCount)<span class="label label-default float-right text-info"> {{ $allCount }} </span>@endif
	            	</a>
	            </li>
	        </ul>
	    </div>
	    <!-- /.box-body -->
	</div>
</div>