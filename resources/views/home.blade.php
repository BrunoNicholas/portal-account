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
                        @role(['super-admin','admin','company-admin'])
                        <li class="nav-item"><a class="nav-link withoutripple" href="#companies" aria-controls="companies" role="tab" data-toggle="tab"><i class="fa fa-address-book"></i> <span class="d-none d-sm-inline"> Account Group Profile </span></a></li>
                        @endrole
                        @role(['super-admin','admin','company-admin','salon-admin'])
                        <li class="nav-item"><a class="nav-link withoutripple" href="#salons" aria-controls="salons" role="tab" data-toggle="tab"><i class="zmdi zmdi-male-female"></i> <span class="d-none d-sm-inline"> Account Salons(s)/Spa's</span></a></li>
                        @endrole
                        @role(['company-admin','shop-admin'])
                        <li class="nav-item"><a class="nav-link withoutripple" href="#shops" aria-controls="shops" role="tab" data-toggle="tab"><i class="zmdi zmdi-male-female"></i> <span class="d-none d-sm-inline"> Account Shops </span></a></li>
                        @endrole
                        <li class="nav-item"><a class="nav-link withoutripple active" href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="zmdi zmdi-settings"></i> <span class="d-none d-sm-inline">Stas</span></a></li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            @role(['super-admin','admin','company-admin'])
                                <div role="tabpanel" class="tab-pane fade" id="companies">
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
                                                        <td class="text-center" style="border: none; vertical-align: middle;">
                                                            <div class="row">
                                                                <a href="{{ route('companies.show', ['all',$company->id]) }}" class="col-3 color-primary" style="font-size: 13px;" title="Company Details">
                                                                    <i class="fa fa-users"></i>
                                                                </a>
                                                                <a href="{{ route('companies.show', ['all',$company->id]) }}" class="col-3 color-info" style="font-size: 13px;" title="Company Details">
                                                                    <i class="fa fa-info-circle"></i>
                                                                </a>
                                                                <button type="button" class="col-3 color-primary" style="font-size: 13px; border: none;"  data-toggle="modal" data-target="#edit{{ $i }}Modal"><i class="fa fa-edit" title="Edit Account"></i></a>
                                                            </div>
                                                            <div class="modal" id="edit{{ $i }}Modal" tabindex="-1" role="dialog" aria-labelledby="edit{{ $i }}ModalLabel">
                                                                <div class="modal-dialog animated zoomIn animated-3x" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h3 class="modal-title color-primary" id="edit{{ $i }}ModalLabel">Edit Multi Account Details</h3>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                                                                        </div>
                                                                        <form enctype="multipart/form-data" action="{{ route('companies.update', ['all',$company->id]) }}" method="POST">
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
                                                                                    <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Email <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="email" class="form-control" value="{{ $company->company_email }}" name="company_email" required>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Main Category </label>
                                                                                    <div class="col-md-9">
                                                                                        <select class="form-control" id="inputName" name="categories_id" required>
                                                                                            <option value="{{ $company->categories_id }}"> Select to change</option>
                                                                                            @foreach($cats as $category)
                                                                                                <option value="{{ $category->id }}" title="{{ $category->description }}">{{ $category->display_name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Telephone </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" id="inputSubject" placeholder="Active Telephone Number" name="company_telephone" value="{{ $company->company_telephone }}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Website </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="url" class="form-control" id="inputSubject" name="company_website" value="{{ $company->company_website }}" placeholder="Copy and paste the full website link here">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Headquaters </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" id="inputLoca" placeholder="City, Street, P.O.Box" name="company_location" value="{{ $company->company_location }}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px; vertical-align: middle;"> Specialisations </label>
                                                                                    <div class="col-md-9 text-left">
                                                                                        <div class="form-check radio">
                                                                                            <label class="form-radio-label">
                                                                                                <input type="radio" id="text22" value="products" name="products_services" @if ($company->products_services == 'products')
                                                                                                    checked 
                                                                                                @endif> Products (Shops Only)
                                                                                            </label>
                                                                                        </div><br>
                                                                                        <div class="form-check radio">
                                                                                            <label class="form-radio-label">
                                                                                                <input type="radio" id="text23" value="services" name="products_services" @if ($company->products_services == 'services')
                                                                                                    checked 
                                                                                                @endif> Services (Salons &amp; Spa's Only)
                                                                                            </label>
                                                                                        </div><br>
                                                                                        <div class="form-check radio">
                                                                                            <label class="form-radio-label">
                                                                                                <input type="radio" id="text24" value="products_and_services" name="products_services" @if ($company->products_services == 'products_and_services')
                                                                                                    checked 
                                                                                                @endif> Products &amp; Services
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 col-form-label text-right" style="padding: 0px; padding-top: 5px;"> Registration ID </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" name="company_ID" placeholder="Company registered ID" class="form-control" value="{{ $company->company_ID }}">
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
                                                            <button class="btn btn-sm btn-default btn-info">Other Multi Accounts</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endrole
                            @role(['super-admin','admin','company-admin','salon-admin'])
                                <div role="tabpanel" class="tab-pane fade" id="salons">
                                    <div class="table-responsive">
                                        <table class="table table-hoverable">
                                            <thead class="color-success">
                                                <tr>
                                                    <th class="text-center">Salon Name</th>
                                                    <th class="text-center">Main Category</th>
                                                    <th class="text-center">Telephone</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Styles</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php $i=0; ?>
                                                @foreach($salons as $salon)
                                                    <tr>
                                                        <td class="text-left text-center" style="min-width: 150px; vertical-align: middle;">
                                                            <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" style="max-width: 80px; border-radius: 10%;"><br>
                                                            {{ $salon->salon_name }}
                                                        </td>
                                                        <td class="text-left" style="vertical-align: middle;">{{ $salon->categories_id ? App\Models\Categories::where('id',$salon->categories_id)->first()->display_name: 'Uncategories' }}</td>
                                                        <td class="text-left" style="vertical-align: middle;">{{ $salon->salon_telephone }}</td>
                                                        <td class="text-left" style="text-transform: capitalize; vertical-align: middle;">{{ $salon->status }}</td>
                                                        <td class="text-center" style="vertical-align: middle;">{{ count($salon->styles) }}</td>
                                                        <td style="border: none; vertical-align: middle;">
                                                            <div class="row text-right">
                                                                <a href="{{ route('salons.show', ['all',$salon->id]) }}" class="col-3 color-success" style="font-size: 13px;" title="Public view">
                                                                    <i class="fa fa-users"></i>
                                                                </a>
                                                                <a class="col-3 color-info" style="font-size: 13px;" title="Salon Details">
                                                                    <i class="fa fa-info-circle"></i>
                                                                </a>
                                                                <a href="{{ route('salons.edit', ['all',$salon->id]) }}" class="col-3 color-primary" style="font-size: 13px;">
                                                                    <i class="fa fa-edit" title="Edit Salon"></i>
                                                                </a>
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
                                    <h4 class="mt-3 mb-1 text-center"> Fashion Styles Registered | <a href="{{ route('styles.index',['all',0]) }}"> Other fashion styles </a> </h4>
                                    @foreach($salons as $salon)
                                        <p class="mt-4 mb-2 right-line color-success"> {{ $salon->salon_name }} </p>
                                        <div class="row"><?php $i = 1; ?>
                                            @foreach($salon->styles as $sty)
                                                <div class="col-md-4">
                                                    <div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
                                                        <div class="ms-thumbnail card-body p-05">
                                                            <div class="withripple zoom-img">
                                                                <a href="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" data-lightbox="gallery" data-title="{{ $sty->style_name }}">
                                                                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" class="img-fluid" style="height: 200px;">
                                                                </a>
                                                                <div class="col-md-12" style="padding: 0px;">
                                                                    <div class="pull-left">
                                                                        <a href="{{ route('styles.show',[($sty->categories_id ? App\Models\Categories::where('id',$sty->categories_id)->first()->name : 'all'),$sty->salon_id,$sty->id]) }}" class="btn btn-info btn-xs" title="View style details" style="padding-top: 5px;">{{ $sty->style_name }} | 
                                                                            <b class="color-success">UGX. {{ $sty->current_price  }}</b>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-12 pull-right">
                                                                        <p class="btn btn-xs pull-left">
                                                                            <i class="fa fa-image"></i>
                                                                            @if(sizeof($sty->galleries) > 0)  @else No Gallery @endif
                                                                        </p>
                                                                        <a title="Go to Salon ({{ App\Models\Salon::where('id',$sty->salon_id)->first()->salon_name }})" href="{{ route('salons.show',['all',$sty->salon_id]) }}" class="btn btn-xs btn-success btn-raised pull-right"><i class="fa fa-shopping-basket" style="margin: 0px;"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @endrole
                            @role(['super-admin','admin','company-admin','shop-admin'])
                                <div role="tabpanel" class="tab-pane fade" id="shops">
                                    <div class="table-responsive">
                                        <table class="table table-hoverable">
                                            <thead class="color-info">
                                                <tr>
                                                    <th class="text-center">Shop Name</th>
                                                    <th class="text-center">Main Category</th>
                                                    <th class="text-center">Telephone</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Products</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php $i=0; ?>
                                                @foreach($shops as $shop)
                                                    <tr>
                                                        <td class="text-left text-center" style="min-width: 150px; vertical-align: middle;">
                                                            <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" style="max-width: 80px; border-radius: 10%;"><br>
                                                            {{ $shop->shop_name }}
                                                        </td>
                                                        <td class="text-left" style="vertical-align: middle;">{{ $shop->categories_id ? App\Models\Categories::where('id',$shop->categories_id)->first()->display_name: 'Uncategories' }}</td>
                                                        <td class="text-left" style="vertical-align: middle;">{{ $shop->shop_telephone }}</td>
                                                        <td class="text-left" style="text-transform: capitalize; vertical-align: middle;">{{ $shop->status }}</td>
                                                        <td class="text-center" style="vertical-align: middle;">{{ count($shop->products) }}</td>
                                                        <td style="border: none; vertical-align: middle;">
                                                            <div class="row text-right">
                                                                <a href="{{ route('shops.show', ['all',$shop->id]) }}" class="col-3 color-info" style="font-size: 13px;" title="Public view">
                                                                    <i class="fa fa-users"></i>
                                                                </a>
                                                                <a class="col-3 color-success" style="font-size: 13px;" title="shop Details">
                                                                    <i class="fa fa-info-circle"></i>
                                                                </a>
                                                                <a href="{{ route('shops.edit', ['all',$shop->id]) }}" class="col-3 color-primary" style="font-size: 13px;">
                                                                    <i class="fa fa-edit" title="Edit shop detail"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" style="vertical-align: middle;">
                                                        <a href="{{ route('shops.index','all') }}">
                                                            <button class="btn btn-sm btn-default btn-info">Other Shops</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h4 class="mt-4 mb-4 right-line"> Products Registered | <a href="{{ route('products.index',['all',0]) }}"> Other products </a> </h4>
                                    @foreach($shops as $shop)
                                        <p class="mt-4 mb-2 right-line color-info"> {{ $shop->shop_name }} </p>
                                        <div class="row"><?php $i = 1; ?>
                                            @foreach($shop->products as $prod)
                                                <div class="col-md-4">
                                                    <div class="card ms-feature wow zoomInUp animation-delay-{{ ++$i }}">
                                                        <div class="ms-thumbnail card-body p-05">
                                                            <div class="withripple zoom-img">
                                                                <a href="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" data-lightbox="gallery" data-title="{{ $prod->style_name }}">
                                                                    <img src="{{ asset('files/defaults/images/cover_bg_2.jpg') }}" alt="" class="img-fluid" style="height: 200px;">
                                                                </a>
                                                                <div class="col-md-12" style="padding: 0px;">
                                                                    <div class="pull-left">
                                                                        <a href="{{ route('products.show',[($prod->categories_id ? App\Models\Categories::where('id',$prod->categories_id)->first()->name : 'all'),$prod->shop_id,$prod->id]) }}" class="btn btn-info btn-xs" title="View product details" style="padding-top: 5px;">{{ $prod->product_name }} | 
                                                                            <b class="color-info">UGX. {{ $prod->current_price  }}</b>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-12 pull-right">
                                                                        <p class="btn btn-xs pull-left">
                                                                            <i class="fa fa-image"></i>
                                                                            @if(sizeof($prod->galleries) > 0)  @else No Gallery @endif
                                                                        </p>
                                                                        <a title="Go to shop ({{ App\Models\Shop::where('id',$prod->shop_id)->first()->shop_name }})" href="{{ route('shops.show',['all',$prod->shop_id]) }}" class="btn btn-xs btn-info btn-raised pull-right"><i class="fa fa-shopping-basket" style="margin: 0px;"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @endrole
                            <div role="tabpanel" class="tab-pane fade active show" id="settings">
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        </div>
                                        <div class="col-md-12">
                                            
                                        </div>
                                        <div class="col-md-12">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-primary" style="min-height: 400px;">
                    <ul class="nav nav-tabs  shadow-2dp" role="tablist">
                        @role(['super-admin','admin','company-admin','salon-admin'])
                        <li class="nav-item"><a class="nav-link withoutripple" href="#bookings" aria-controls="bookings" role="tab" data-toggle="tab"><i class="fa fa-address-book"></i> <span class="d-none d-sm-inline"> Service Bookings </span></a></li>
                        @endrole
                        @role(['super-admin','admin','company-admin','shop-admin'])
                        <li class="nav-item"><a class="nav-link withoutripple" href="#orders" aria-controls="orders" role="tab" data-toggle="tab"><i class="fa fa-address-book-o"></i> <span class="d-none d-sm-inline"> Product Orders </span></a></li>
                        @endrole
                        <li class="nav-item"><a class="nav-link withoutripple active" href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="zmdi zmdi-email"></i> <span class="d-none d-sm-inline"> Messages </span></a></li>
                    </ul>
                    <div class="card-body" style="max-height: 600px; overflow-y: auto;">
                        <div class="tab-content">
                            @role(['super-admin','admin','company-admin','salon-admin'])
                                <div role="tabpanel" class="tab-pane fade" id="bookings">
                                    <div class="table-responsive">
                                        


                                    </div>
                                </div>
                            @endrole
                            @role(['super-admin','admin','company-admin','shop-admin'])
                                <div role="tabpanel" class="tab-pane fade" id="orders">
                                    <div class="table-responsive">
                                        <table class="table table-hoverable">
                                            ord

                                        </table>
                                    </div>
                                </div>
                            @endrole
                            <div role="tabpanel" class="tab-pane fade active show" id="messages">
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
                                                <td class="contact" onclick="window.location='{{ route('messages.show',[$message->id,'details']) }}'" style="vertical-align: middle;">
                                                    @if($message->folder == 'important')
                                                        <i class="contact mt-2 color-danger">{{ $message->folder }}</i>
                                                    @elseif($message->folder == 'urgent')
                                                        <i class="contact mt-2 color-success">{{ $message->folder }}</i>
                                                    @elseif($message->folder == 'official')
                                                        <i class="contact mt-2 color-warning">{{ $message->folder }}</i>
                                                    @elseif($message->folder == 'unofficial')
                                                        <i class="contact mt-2 color-info">{{ $message->folder }}</i>
                                                    @elseif($message->folder == 'normal')
                                                        <i class="contact mt-2 color-default">{{ $message->folder }}</i>
                                                    @else
                                                        <i class="contact mt-2 color-primary">{{ $message->folder }}</i>
                                                    @endif
                                                </td>
                                                <td class="contact" style="vertical-align: middle;" onclick="window.location='{{ route('messages.show',[$message->id,'details']) }}'">
                                                    <span class="blue-grey-text text-darken-4">
                                                        <b>{{ $message->title }}</b>
                                                    </span> 
                                                    {{ strlen($message->message) > 15 ? substr($message->message, 0, 15) . '... ' : $message->message }}
                                                </td>
                                                @if($message->attachment) 
                                                    <td class="clip" title="This is a public (group) message sent to all!" style="vertical-align: middle;"><i class="fa fa-users"></i></td> <!-- fa fa-paperclip -->
                                                    <td class="time" title="This is a public (group) message sent to all!" style="vertical-align: middle;"> {{ $message->created_at }} </td>
                                                @else
                                                    <td colspan="2" class="time" title="{{ explode(' ', trim($message->created_at))[0] . ', ' . explode(' ', trim($message->created_at))[1] }}" style="vertical-align: middle;"> {{ $message->created_at }} </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="chb text-center color-primary" colspan="6"> <a href="{{ route('messages.index','inbox') }}">View All Messages</a> </td>
                                        </tr>
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
