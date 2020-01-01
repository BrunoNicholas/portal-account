@extends('layouts.site')
@section('title', 'Home')
@section('styles') @endsection
@section('top_menu') style="display: none;" @endsection
@section('navigator')
    <div class="ms-hero-page ms-hero-img-city2 ms-hero-bg-info mb-1" style="padding: 0px;">
        <div class="text-center color-white mt-0 mb-1 index-1" style="padding-top: 5px;">
            <h3>
                <i class="fa fa-home text-white"></i>  My Control Panel
                <small> - 
                    {{ Auth::user()->name }} 
                    <img src="{{ Auth::user()->profile_image ? asset('files/profile/images/' . Auth::user()->profile_image) : asset('files/defaults/images/profile.jpg') }}" style="max-width: 30px; border-radius: 50%;">
                </small>
            </h3>
            <p class="lead lead-lg">
                <ol class="breadcrumb d-flex justify-content-center" style="height: 40px;">
                    <li class="breadcrumb-item active text-white" style="text-transform: capitalize;">
                        {{ App\Models\Role::where('name', Auth::user()->role)->first()->display_name }}
                        -
                        {{ Auth::user()->status }}
                    </li>
                </ol>
            </p>
            <br>
        </div>
    </div>
@endsection
@section('content')
    <div class="mt-0 pl-2 pr-2">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-primary" style="min-height: 400px;">
                    <ul class="nav nav-tabs  shadow-2dp" role="tablist">
                        @role(['super-admin','admin','company-admin'])<li class="nav-item"><a class="nav-link withoutripple active" href="#companies" aria-controls="companies" role="tab" data-toggle="tab"><i class="fa fa-address-book"></i> <span class="d-none d-sm-inline"> My Group Profile </span></a></li>@endrole
                        
                        @role(['super-admin','admin','company-admin','salon-admin'])<li class="nav-item"><a class="nav-link withoutripple" href="#salons" aria-controls="salons" role="tab" data-toggle="tab"><i class="zmdi zmdi-male-female"></i> <span class="d-none d-sm-inline"> My Salons(s)/Spa's</span></a></li>@endrole
                        
                        @role(['company-admin','shop-admin'])<li class="nav-item"><a class="nav-link withoutripple" href="#shops" aria-controls="shops" role="tab" data-toggle="tab"><i class="zmdi zmdi-male-female"></i> <span class="d-none d-sm-inline"> My Shops </span></a></li>@endrole
                        
                        <li class="nav-item"><a class="nav-link withoutripple" href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="zmdi zmdi-settings"></i> <span class="d-none d-sm-inline">Stas</span></a></li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            @role(['super-admin','admin','company-admin'])<div role="tabpanel" class="tab-pane fade active show" id="companies">
                                <div class="table-responsive">
                                    <table class="table table-hoverable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Account Name</th>
                                                <th class="text-center">Main Category</th>
                                                <th class="text-center">Telephone</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=0; ?>
                                            @foreach($companies as $company)
                                                <tr>
                                                    <td class="text-left text-center" style="min-width: 150px; vertical-align: middle;"><img src="
                                                        {{ $company->company_logo ? asset('files/companies/images/' . $company->company_logo) : asset('files/defaults/images/cover_bg_2.jpg') }}" style="max-width: 75px; border-radius: 10%;"><br>
                                                        {{ $company->company_name }}</td>
                                                    <td class="text-left" style="vertical-align: middle;">{{ $company->categories_id ? App\Models\Categories::where('id',$company->categories_id)->first()->display_name: 'Uncategories' }}</td>
                                                    <td class="text-left" style="vertical-align: middle;">{{ $company->company_telephone }}</td>
                                                    <td class="text-left" style="text-transform: capitalize; vertical-align: middle;">{{ $company->status }}</td>
                                                    <td class="row text-center mt-1" style="min-width: 115px; border: none;">
                                                        <div class="row">
                                                            <a href="{{ route('companies.show', ['all',$company->id]) }}" class="col-5 btn btn-sm btn-info" style="font-size: 13px;" title="Company Details"><i class="fa fa-info-circle"></i></a>
                                                            <button type="button" class="col-5 btn btn-sm btn-primary" style="font-size: 13px;"  data-toggle="modal" data-target="#edit{{ $i }}Modal"><i class="fa fa-edit" title="Edit Account"></i></a>
                                                        </div>
                                                        <div class="modal" id="edit{{ $i }}Modal" tabindex="-1" role="dialog" aria-labelledby="edit{{ $i }}ModalLabel">
                                                            <div class="modal-dialog animated zoomIn animated-3x" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title color-primary" id="edit{{ $i }}ModalLabel">Edit Multi Account Details</h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                                                                    </div>
                                                                    <form action="" method="POST">
                                                                        <div class="modal-body">
                                                                            <div class="col-md-12">
                                                                                @csrf
                                                                                {{ method_field('PATCH') }}

                                                                                @foreach ($errors->all() as $error)
                                                                                    <p class="alert alert-danger">{{ $error }}</p>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Account Name </label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control" name="company_name" value="{{ $company->company_name }}" required>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label text-right"> Email <span class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-md-9">
                                                                                    <input type="email" class="form-control" value="{{ $company->company_email }}" name="company_email" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary btn-raised">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr><!-- {{ ++$i }} -->
                                            @endforeach
                                            <tr>
                                                <td colspan="6" style="vertical-align: middle;">
                                                    <a href="{{ route('companies.index','all') }}">
                                                        <button class="btn btn-sm btn-default btn-info">Multi Accounts</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>@endrole
                            @role(['company-admin','salon-admin'])<div role="tabpanel" class="tab-pane fade" id="salons">
                                <div class="table-responsive">
                                    <table class="table table-hoverable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="text-left">Salon Name</th>
                                                <th class="text-left">Main Category</th>
                                                <th class="text-left">Telephone</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=0; ?>
                                            @foreach($salons as $salon)
                                                <tr>
                                                    <td class="text-left" style="vertical-align: middle;">{{ ++$i }}.</td>
                                                    <td class="text-left text-center" style="min-width: 150px; vertical-align: middle;"><img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" style="max-width: 75px; border-radius: 10%;"><br>
                                                        {{ $salon->salon_name }}</td>
                                                    <td class="text-left" style="vertical-align: middle;">{{ $salon->categories_id ? App\Models\Categories::where('id',$salon->categories_id)->first()->display_name: 'Uncategories' }}</td>
                                                    <td class="text-left" style="vertical-align: middle;">{{ $salon->salon_telephone }}</td>
                                                    <td class="text-left" style="text-transform: capitalize; vertical-align: middle;">{{ $salon->status }}</td>
                                                    <td class="row text-center mt-1" style="min-width: 115px; border: none;">
                                                        <div class="row">
                                                            <a href="{{ route('salons.show', ['all',$salon->id]) }}" class="col-5 btn btn-sm btn-info" style="font-size: 13px;" title="Salon Details"><i class="fa fa-info-circle"></i></a>
                                                            <a href="{{ route('salons.edit', ['all',$salon->id]) }}" class="col-5 btn btn-sm btn-primary" style="font-size: 13px;"><i class="fa fa-edit" title="Edit Salon"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="6" style="vertical-align: middle;">
                                                    <a href="{{ route('salons.index','all') }}">
                                                        <button class="btn btn-sm btn-default btn-info">All Salons</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>@endrole
                            @role(['company-admin','shop-admin'])<div role="tabpanel" class="tab-pane fade" id="shops">
                                <div class="table-responsive">
                                    
                                </div>
                            </div>@endrole
                            <div role="tabpanel" class="tab-pane fade" id="settings">
                                <div class="table-responsive">
                                    <table class="table table-hoverable">
                                        
                                        set
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-primary" style="min-height: 400px;">
                    <ul class="nav nav-tabs  shadow-2dp" role="tablist">
                        <li class="nav-item"><a class="nav-link withoutripple active" href="#bookings" aria-controls="bookings" role="tab" data-toggle="tab"><i class="fa fa-address-book"></i> <span class="d-none d-sm-inline"> Bookings </span></a></li>
                        <li class="nav-item"><a class="nav-link withoutripple" href="#orders" aria-controls="orders" role="tab" data-toggle="tab"><i class="fa fa-address-book-o"></i> <span class="d-none d-sm-inline"> Orders </span></a></li>
                        <li class="nav-item"><a class="nav-link withoutripple" href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="zmdi zmdi-email"></i> <span class="d-none d-sm-inline"> Messages </span></a></li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="bookings">
                                <div class="table-responsive">
                                    


                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="orders">
                                <div class="table-responsive">
                                    <table class="table table-hoverable">
                                        ord

                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages">
                                <div class="table-responsive">
                                    <table class="table table-hoverable">
                                         @if(sizeof($messages) < 1)
                                            <tr>
                                                <td class="chb text-center text-info" colspan="6"> <i> No new messages found! </i> </td>
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts') @endsection
