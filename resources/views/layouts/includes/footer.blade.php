<aside class="ms-footbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ms-footer-col">
	            <div class="ms-footbar-block">
	                <h3 class="ms-footbar-title text-center">Brief Sitemap</h3>
	                <ul class="list-unstyled ms-icon-list three_cols">
		                <li><a href="{{ route('userhome') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
		                <li><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
		                <li><a href="{{ route('messages.index','inbox') }}"><i class="fa-envelope fa"></i> Messages</a></li>
		                <li><a href="{{ route('profile') }}"><i class="zmdi zmdi-image-o"></i> User Profile</a></li>
		                <li><a href="{{ route('jobs.index') }}"><i class="zmdi zmdi-case"></i> Jobs </a></li>
		                <li><a href="{{ route('bookings.index',['all',0]) }}"><i class="zmdi zmdi-time"></i> Bookings</a></li>
		                <li><a href="{{ route('companies.index','all') }}"><i class="zmdi zmdi-money"></i> Companies</a></li>
		                <li><a href="{{ route('shops.index','all') }}"><i class="zmdi zmdi-favorite-outline"></i> Shops</a></li>
		                <li><a href="{{ route('salons.index','all') }}"><i class="zmdi zmdi-accounts"></i> Salons</a></li>
		                <li><a href="{{ route('galleries.index') }}"><i class="zmdi zmdi-image"></i> Galleries</a></li>
		                <li><a href="{{ route('questions.index') }}"><i class="fa-question-circle fa"></i> Questions</a></li>
		                <li><a href="{{ route('posts.index') }}"><i class="zmdi zmdi-lock"></i> Posts</a></li>
	                </ul>
	            </div>
	            {{-- <div class="ms-footbar-block">
	                <h3 class="ms-footbar-title">Subscribe</h3>
	                <p class="">Lorem ipsum Amet fugiat elit nisi anim mollit minim labore ut esse Duis ullamco ad dolor veniam velit.</p>
	                <form>
		                <div class="form-group label-floating mt-2 mb-1">
		                    <div class="input-group ms-input-subscribe">
		                      	<label class="control-label" for="ms-subscribe"><i class="zmdi zmdi-email"></i> Email Adress</label>
		                      	<input type="email" id="ms-subscribe" class="form-control">
		                    </div>
		                </div>
		                <button class="ms-subscribre-btn" type="button">Subscribe</button>
	                </form>
	            </div> --}}
	            
	            <div class="ms-footbar-block">
	                <h3 class="ms-footbar-title">Social Media</h3>
	                <div class="ms-footbar-social">
		                <a href="javascript:void(0)" class="btn-circle btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
		                <a href="javascript:void(0)" class="btn-circle btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
		                <a href="javascript:void(0)" class="btn-circle btn-youtube"><i class="zmdi zmdi-youtube-play"></i></a>
		                <a href="javascript:void(0)" class="btn-circle btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
	                </div>
	            </div>
            </div>
            <div class="col-lg-5 col-md-7 ms-footer-col ms-footer-alt-color">
              	<div class="ms-footbar-block">
	                <h3 class="ms-footbar-title text-center mb-2">Last Articles</h3>
	                <div class="ms-footer-media">
	                  <div class="media">
	                    <div class="media-left media-middle">
	                      <a href="javascript:void(0)">
	                        <img class="media-object media-object-circle" src="{{ asset('assets/img/demo/p75.jpg') }}" alt="...">
	                      </a>
	                    </div>
	                    <div class="media-body">
	                      <h4 class="media-heading"><a href="javascript:void(0)">Lorem ipsum dolor sit expedita cumque amet consectetur adipisicing repellat</a></h4>
	                      <div class="media-footer">
	                        <span><i class="zmdi zmdi-time color-info-light"></i> August 18, 2016</span>
	                        <span><i class="zmdi zmdi-folder-outline color-warning-light"></i> <a href="javascript:void(0)">Design</a></span>
	                      </div>
	                    </div>
	                  </div>
	                  <div class="media">
	                    <div class="media-left media-middle">
	                      <a href="javascript:void(0)">
	                        <img class="media-object media-object-circle" src="assets/img/demo/p75.jpg" alt="...">
	                      </a>
	                    </div>
	                    <div class="media-body">
	                      <h4 class="media-heading"><a href="javascript:void(0)">Labore ut esse Duis consectetur expedita cumque ullamco ad dolor veniam velit</a></h4>
	                      <div class="media-footer">
	                        <span><i class="zmdi zmdi-time color-info-light"></i> August 18, 2016</span>
	                        <span><i class="zmdi zmdi-folder-outline color-warning-light"></i> <a href="javascript:void(0)">News</a></span>
	                      </div>
	                    </div>
	                  </div>
	                </div>
              	</div>
            </div>
            <div class="col-lg-3 col-md-5 ms-footer-col ms-footer-text-right">
	            <div class="ms-footbar-block">
	                <div class="ms-footbar-title">
	                  	<span class="ms-logo ms-logo-white ms-logo-sm mr-1">SP</span>
	                  	<h3 class="no-m ms-site-title"> Salon <span> Portal </span></h3>
	                </div>
	                <address class="no-mb">
		                <p><i class="color-danger-light zmdi zmdi-pin mr-1"></i> 795 Folsom Ave, Suite 600</p>
		                <p><i class="color-warning-light zmdi zmdi-map mr-1"></i> San Francisco, CA 94107</p>
		                <p><i class="color-info-light zmdi zmdi-email mr-1"></i> <a href="mailto:joe@example.com">example@domain.com</a></p>
		                <p><i class="color-royal-light zmdi zmdi-phone mr-1"></i>+34 123 456 7890 </p>
		                <p><i class="color-success-light fa fa-fax mr-1"></i>+34 123 456 7890 </p>
	                </address>
	            </div>
            </div>
        </div>
    </div>
</aside>