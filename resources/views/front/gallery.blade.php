@extends('front.layout.master')
@section('content')

<section class="position-relative page-header gallery-page-header">
	<wrapper></wapper>    
 		<div class="page-head">
      	<span class="main-title">Gallery</span>
  		</div>
</section>

<section id="gallery" class="mb-4">
  	<div class="container">
    	<div id="image-gallery">
      	<div class="row pt-4">
         	
         	@foreach($results as $value)
	        		<div class="col-lg-4 col-md-4 col-sm-6 image">
	             	<div class="img-wrapper">
	               	<a href="{{ url('/public/admin/clip-one/assets/gallery/image').'/'.$value->image }}"><img src="{{ url('/public/admin/clip-one/assets/gallery/image').'/'.$value->image }}" class="img-responsive"></a>
	               	<div class="img-overlay">
	                 		<i class="fa fa-plus-circle" aria-hidden="true"></i>
	               	</div>
	             	</div>
	           	</div>
          	@endforeach

      	</div><!-- End row -->
 		</div><!-- End image gallery -->
	</div><!-- End container --> 
</section>

@endsection