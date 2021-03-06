@extends('layouts.site')
@section('title', 'Questions')
@section('styles')
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('navigator')
	<div class="container mt-0">
		<div class="row">
		    <div class="d-flex no-block align-items-center col-md-4">
			    <span class="text-left color-primary mb-0 wow fadeInDown animation-delay-4" style="font-size: 24px;">Asked Questions</span>
		    </div>
            <div class="d-flex no-block justify-content-end col-md-8">
                <nav aria-label="breadcrumb" style="padding: 0px; height: 43px;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-question"></i> Questions </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="ms-hero-bg-primary ms-hero-img-mountain">
                    <h3 class="color-white index-1 text-center pb-2 pt-1 no-mb">User Asked Questions</h3>
                </div>
                <div class="ms-collapse no-margin" id="accordion12" role="tablist" aria-multiselectable="true">
                    <div class="mb-0 card card-primary">
                        <div class="card-header" role="tab" id="headingOne12">
                            <h4 class="card-title ms-rotate-icon">
                                <a class="withripple" role="button" data-toggle="collapse" href="#collapseOne12" aria-expanded="trie" aria-controls="collapseOne12">
                                <i class="zmdi zmdi-attachment-alt"></i> Question Number One </a>
                            </h4>
                        </div>
                        <div id="collapseOne12" class="card-collapse collapse show" role="tabpanel" aria-labelledby="headingOne12" data-parent="#accordion12">
                          <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias delectus laboriosam, ut placeat autem itaque, possimus illum dicta enim quia. Quam similique voluptate illo debitis corrupti sunt, vitae dicta officia impedit hic. Perferendis, odit consequuntur. Numquam doloremque aperiam ut, adipisci molestiae, delectus deleniti accusamus expedita sit suscipit nostrum voluptatem perspiciatis deserunt optio hic nihil distinctio nesciunt. Dolor assumenda repudiandae, tempora magni quidem maiores minima adipisci architecto porro accusamus alias fugit, doloremque fugiat veniam est totam.</p>
                            <p>Quos cum sunt temporibus ipsam, voluptatibus cupiditate magnam quam officiis laborum facere ipsa molestiae ratione fugiat iusto perspiciatis dolorem veniam maxime tempore perferendis illum aliquam! Aspernatur quasi possimus rem tempora, facere sed voluptatibus sequi saepe consectetur necessitatibus a cumque fugiat earum error, maxime fugit voluptatum quae minima tenetur reiciendis dolor temporibus labore odit. Quos, ex architecto labore quasi nostrum tempora ipsam id numquam voluptatum, eos, tempore. Delectus, esse! Dolorum ipsam eos nesciunt soluta, voluptatum beatae?</p>
                          </div>
                        </div>
                    </div>
                    <div class="mb-0 card card-primary">
                        <div class="card-header" role="tab" id="headingThree3">
                            <h4 class="card-title ms-rotate-icon">
                                <a class="collapsed withripple" role="button" data-toggle="collapse" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                    <i class="zmdi zmdi-attachment-alt"></i> Question Number Three </a>
                            </h4>
                        </div>
                        <div id="collapseThree3" class="card-collapse collapse" role="tabpanel" aria-labelledby="headingThree12" data-parent="#accordion12">
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias delectus laboriosam, ut placeat autem itaque, possimus illum dicta enim quia. Quam similique voluptate illo debitis corrupti sunt, vitae dicta officia impedit hic. Perferendis, odit consequuntur. Numquam doloremque aperiam ut, adipisci molestiae, delectus deleniti accusamus expedita sit suscipit nostrum voluptatem perspiciatis deserunt optio hic nihil distinctio nesciunt. Dolor assumenda repudiandae, tempora magni quidem maiores minima adipisci architecto porro accusamus alias fugit, doloremque fugiat veniam est totam.</p>
                                <p>Quos cum sunt temporibus ipsam, voluptatibus cupiditate magnam quam officiis laborum facere ipsa molestiae ratione fugiat iusto perspiciatis dolorem veniam maxime tempore perferendis illum aliquam! Aspernatur quasi possimus rem tempora, facere sed voluptatibus sequi saepe consectetur necessitatibus a cumque fugiat earum error, maxime fugit voluptatum quae minima tenetur reiciendis dolor temporibus labore odit. Quos, ex architecto labore quasi nostrum tempora ipsam id numquam voluptatum, eos, tempore. Delectus, esse! Dolorum ipsam eos nesciunt soluta, voluptatum beatae?</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-0 card card-primary">
                        <div class="card-header" role="tab" id="headingThree3">
                            <h4 class="card-title ms-rotate-icon">
                                <a class="collapsed withripple" role="button" data-toggle="collapse" href="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                                    <i class="zmdi zmdi-attachment-alt"></i> Question Number Three </a>
                            </h4>
                        </div>
                        <div id="collapseThree4" class="card-collapse collapse" role="tabpanel" aria-labelledby="headingThree12" data-parent="#accordion12">
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias delectus laboriosam, ut placeat autem itaque, possimus illum dicta enim quia. Quam similique voluptate illo debitis corrupti sunt, vitae dicta officia impedit hic. Perferendis, odit consequuntur. Numquam doloremque aperiam ut, adipisci molestiae, delectus deleniti accusamus expedita sit suscipit nostrum voluptatem perspiciatis deserunt optio hic nihil distinctio nesciunt. Dolor assumenda repudiandae, tempora magni quidem maiores minima adipisci architecto porro accusamus alias fugit, doloremque fugiat veniam est totam.</p>
                                <p>Quos cum sunt temporibus ipsam, voluptatibus cupiditate magnam quam officiis laborum facere ipsa molestiae ratione fugiat iusto perspiciatis dolorem veniam maxime tempore perferendis illum aliquam! Aspernatur quasi possimus rem tempora, facere sed voluptatibus sequi saepe consectetur necessitatibus a cumque fugiat earum error, maxime fugit voluptatum quae minima tenetur reiciendis dolor temporibus labore odit. Quos, ex architecto labore quasi nostrum tempora ipsam id numquam voluptatum, eos, tempore. Delectus, esse! Dolorum ipsam eos nesciunt soluta, voluptatum beatae?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="ms-hero-bg-primary ms-hero-img-mountain">
                    <h3 class="color-white index-1 text-center pb-2 pt-1 no-mb">Ask A Question</h3>
                </div>
                <div class="card-body">
                    <h3 class="color-primary"> Ask a question! </h3>
                    <form method="POST" action="{{ route('questions.store') }}">
                        @csrf
                        @auth <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> @endauth
                        <div class="form-group label-floating mt-0">
                            <label for="inputName" class="control-label">Subject</label>
                            <input type="text" class="form-control" id="inputName" name="topic" @permission('can_add_questions') @else disabled @endpermission>
                        </div>
                        <div class="form-group label-floating mt-0">
                            <label for="textArea" class="control-label">Question Content</label>
                            <textarea class="form-control" rows="5" id="textArea" name="description" required @permission('can_add_questions') @else disabled @endpermission></textarea>
                        </div>
                        <div class="form-group text-right mt-0">
                            <button type="reset" class="btn btn-danger" @permission('can_add_questions') @else disabled title="Inufficient rights to add a question" @endpermission>Clear</button>
                            <button type="submit" class="btn btn-raised btn-primary" @permission('can_add_questions') @else disabled title="Inufficient rights to add a question" @endpermission><i class="fa-check fa" style="padding: 0px; margin: 0px;"></i> Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->
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