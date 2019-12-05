{{-- class => ms-conf-btn --}}
@if($message = Session::get('danger'))
<a href="#topmessage" class="ms-configurator-btn btn-circle btn-circle-raised btn-circle-danger animated rubberBand mt-6" title="{{ $message }}"><i class="fa fa-warning"></i></a>
@endif
@if($message = Session::get('success'))
<a href="#topmessage" class="ms-configurator-btn btn-circle btn-circle-raised btn-circle-success animated rubberBand mt-6" title="{{ $message }}"><i class="fa fa-warning"></i></a>
@endif
@if($message = Session::get('info'))
<a href="#topmessage" class="ms-configurator-btn btn-circle btn-circle-raised btn-circle-info animated rubberBand mt-6" title="{{ $message }}" style=""><i class="fa fa-warning"></i></a>
@endif
@if($message = Session::get('warning'))
<a href="#topmessage" class="ms-configurator-btn btn-circle btn-circle-raised btn-circle-warning animated rubberBand mt-6" title="{{ $message }}"><i class="fa fa-warning"></i></a>
@endif