@extends('layouts.site')
@section('title', 'Home')
@section('styles') @endsection
@section('navigator')
    <div class="container mt-0" style="min-height: 500px;">
        <div class="row">
            <div class="d-flex no-block align-items-center col-4">
                <span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">{{ Auth::user()->name }} - Home</span>
            </div>
            <div class="d-flex no-block justify-content-end col-8">
                <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
                    <ol class="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript:void(0)"> <i class="fa fa-home"></i> Home</a></li>
                        </ol>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row mt-0 pl-0">
        <div class="col-lg-12 ms-paper-content-container">
            <div class="ms-paper-content">
                <section class="ms-component-section">


                </section>
            </div>
        </div>
    </div>
@endsection
@section('scripts') @endsection


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}