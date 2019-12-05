@extends('layouts.site')
@section('title', 'Home')
@section('styles') @endsection
@section('content')
    <header class="wrap wrap-mountain mt--40">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 pr-6">
                    <h1 class="animated fadeInDown animation-delay-5 color-white"> Salons, Spa's, Shops, Styles &amp; More</h1>
                    <p class="lead animated fadeInDown animation-delay-5 color-white mb-2"><small>{{ config('app.description') }}</small></p>
                    <div class="card card-body card-primary card-dark-inverse animated fadeInLeft animation-delay-5">
                        <div class="media">
                            <div class="media-left d-none d-sm-block media-middle pr-4">
                                <i class="zmdi zmdi-account zmdi-hc-5x color-primary"></i>
                            </div>
                            <div class="media-body no-mt">
                              <h3 class="color-primary no-mt">Your favorite style from the best.</h3>
                              <p>Search, book, order for your salon, spa services and shop products.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body card-info card-dark-inverse animated fadeInLeft animation-delay-7">
                        <div class="media">
                            <div class="media-left d-none d-sm-block media-middle pr-4">
                                <i class="zmdi zmdi-desktop-mac zmdi-hc-5x color-info"></i>
                            </div>
                            <div class="media-body no-mt">
                                <h3 class="color-info no-mt">Your office gone public.</h3>
                                <p>A <b title="Point Of Sale">POS</b> for your salons, spa's with fast and secure transactions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body card-success card-dark-inverse animated fadeInLeft animation-delay-7">
                        <div class="media">
                            <div class="media-left d-none d-sm-block media-middle pr-4">
                                <i class="zmdi zmdi-accounts-list zmdi-hc-5x color-success"></i>
                            </div>
                            <div class="media-body no-mt">
                                <h3 class="color-success no-mt">Your company expanded.</h3>
                                <p>Multiple outlets of shops, salons and spas under one account.</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="javascript:void(0);" class="btn btn-xlg btn-white color-warning btn-raised animated fadeInLeft animation-delay-14 mr-2"><i class="zmdi zmdi-settings"></i> Salons </a>
                        <a href="{{ route('styles.index', ['companies','all']) }}" class="btn btn-xlg btn-white color-success btn-raised animated fadeInRight animation-delay-14"><i class="zmdi zmdi-download"></i> Styles </a>
                    </div>
                </div>
                <div class="col-lg-5 text-center mt-6">
                    <div class="img-phone-container">
                        {{-- <img class="img-fluid animated zoomInDown animation-delay-3 index-1" src="{{ asset('assets/img/demo/pixel1.png') }}" style="border-radius: 5px;"> --}}
                        {{-- img-fluid img-phone-left --}}
                        <img class="img-fluid animated zoomInDown animation-delay-3 index-1" src="{{ asset('assets/img/demo/lavcut.jpg') }}" style="border-radius: 3px;">
                        {{-- img-fluid img-phone-right --}}
                        <img class="img-fluid img-phone-down" src="{{ asset('assets/img/demo/hairstuff.jpg') }}" style="border-radius: 3px;">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-6">
        <h2 class="text-center color-primary mb-2 wow fadeInDown animation-delay-4">{{ config('app.name') }} Features</h2>
        <p class="lead text-center aco wow fadeInDown animation-delay-5 mw-800 center-block mb-4"> 
            Why, <span class="color-primary">{{ config('app.name') }}</span> is your ultimate choice.<br>
            Dolor alias provident excepturi eligendi, nam numquam iusto eum illum, ea quisquam.
        </p>
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-md-6">
              <div class="card card-warning-inverse wow fadeInLeft animation-delay-4">
                  <div class="text-center card-body">
                      <span class="ms-icon ms-icon-circle ms-icon-white ms-icon-inverse ms-icon-xxlg "><i class="zmdi zmdi-desktop-mac"></i></span>
                      <h4 class="">A feature title</h4>
                      <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <a href="javascript:void(0)" class="btn btn-white color-warning btn-raised">Action here</a>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6">
              <div class="card card-royal-inverse wow fadeInLeft animation-delay-3">
                  <div class="text-center card-body">
                      <span class="ms-icon ms-icon-circle ms-icon-white ms-icon-inverse ms-icon-xxlg "><i class="zmdi zmdi-download"></i></span>
                      <h4 class="">A feature title</h4>
                      <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <a href="javascript:void(0)" class="btn btn-white color-royal btn-raised">Action here</a>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6">
              <div class="card card-success-inverse wow fadeInRight animation-delay-3">
                  <div class="text-center card-body">
                      <span class="ms-icon ms-icon-circle ms-icon-white ms-icon-inverse ms-icon-xxlg "><i class="zmdi zmdi-cloud-outline"></i></span>
                      <h4 class="">A feature title</h4>
                      <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <a href="javascript:void(0)" class="btn btn-white color-success btn-raised">Action here</a>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6">
              <div class="card card-danger-inverse wow fadeInRight animation-delay-4">
                  <div class="text-center card-body">
                      <span class="ms-icon ms-icon-circle ms-icon-white ms-icon-inverse ms-icon-xxlg "><i class="zmdi zmdi-flower"></i></span>
                      <h4 class="">A feature title</h4>
                      <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <a href="javascript:void(0)" class="btn btn-white color-danger btn-raised">Action here</a>
                  </div>
              </div>
          </div>
        </div>
    </div> <!-- container -->
    <div class="wrap ms-hero-bg-dark ms-hero-img-keyboard ms-bg-fixed mt-6">
        <div class="container index-1">
            <div class="text-center color-white mb-4 mw-800 center-block">
                <h1>Latest Works</h1>
                <p class="lead color-medium">Discover our projects and the rigorous process of creation. Our principles are creativity, design, experience and <span class="color-white">knowledge</span>. We are backed by 20 years of research.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="ms-thumbnail-container wow fadeInUp">
                        <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                            <img src="{{ asset('assets/img/demo/port21.jpg') }}" alt="" class="img-fluid">
                            <figcaption class="ms-thumbnail-caption text-center">
                                <div class="ms-thumbnail-caption-content">
                                    <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                <div class="ms-thumbnail-container wow fadeInUp">
                    <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                        <img src="{{ asset('assets/img/demo/port10.jpg') }}" alt="" class="img-fluid">
                        <figcaption class="ms-thumbnail-caption text-center">
                            <div class="ms-thumbnail-caption-content">
                                <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="ms-thumbnail-container wow fadeInUp">
                        <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                            <img src="{{ asset('assets/img/demo/portG1.jpg') }}" alt="" class="img-fluid">
                            <figcaption class="ms-thumbnail-caption text-center">
                                <div class="ms-thumbnail-caption-content">
                                    <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="ms-thumbnail-container wow fadeInUp">
                        <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                            <img src="{{ asset('assets/img/demo/port20.jpg') }}" alt="" class="img-fluid">
                            <figcaption class="ms-thumbnail-caption text-center">
                                <div class="ms-thumbnail-caption-content">
                                    <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="ms-thumbnail-container wow fadeInUp">
                      <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                          <img src="{{ asset('assets/img/demo/port18.jpg') }}" alt="" class="img-fluid">
                          <figcaption class="ms-thumbnail-caption text-center">
                              <div class="ms-thumbnail-caption-content">
                                  <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                  <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
                              </div>
                          </figcaption>
                      </figure>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="ms-thumbnail-container wow fadeInUp">
                        <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                            <img src="{{ asset('assets/img/demo/port2.jpg') }}" alt="" class="img-fluid">
                            <figcaption class="ms-thumbnail-caption text-center">
                                <div class="ms-thumbnail-caption-content">
                                    <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a href="javascript:void(0)" class="btn btn-raised btn-danger"><i class="zmdi zmdi-eye"></i> View more</a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-6">
        <div class="text-center color-white mb-4 text-center">
            <h1 class="color-primary">Our Team</h1>
            <p class="lead lead-lg color-danger text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">These are <span class="text-normal">the professionals</span> who, every day, make progress <span class="text-normal">the projects of our clients</span>.</p>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="card card-royal wow zoomInUp animation-delay-7">
                    <div class="ms-hero-bg-royal ms-hero-img-city">
                        <img src="{{ asset('assets/img/demo/avatar4.jpg') }}" alt="..." class="img-avatar-circle">
                    </div>
                    <div class="card-body pt-6 text-center">
                        <h3 class="color-royal">Sophie Marks</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-success wow zoomInUp animation-delay-7">
                    <div class="ms-hero-bg-success ms-hero-img-city">
                        <img src="assets/img/demo/avatar5.jpg" alt="..." class="img-avatar-circle">
                    </div>
                    <div class="card-body pt-6 text-center">
                        <h3 class="color-success">Cris Polner</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-primary wow zoomInUp animation-delay-7">
                    <div class="ms-hero-bg-primary ms-hero-img-city">
                        <img src="assets/img/demo/avatar6.jpg" alt="..." class="img-avatar-circle">
                    </div>
                    <div class="card-body pt-6 text-center">
                        <h3 class="color-primary">Julia Robert</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@endsection
@section('footer') @include('layouts.includes.footer') @endsection
@section('scripts') @endsection