@extends('front.layout.master')
@section('content')

<section class="position-relative page-header abt-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	
		  	<!-- <span class="main-title">About Us</span> -->
  	</div>
</section>

<section class="about-content">
  	<div class="container">
  		<div class="about-content">
        	<div class="row">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 ">
             	<img class="zoom" src="{{ asset('/public/admin/clip-one/assets/pages/featured_image/original')}}/{{ $result->featured_image }}">
          	</div>
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 ">
               {!! $result->description !!}
            </div>
        	</div>
    	</div>
	</div>
</section>

@if(count(images)>0)
	<section  class="about-content">
	 	<div class="container">
	     	<div class="row">
	        	
	        	@foreach($images as $value)
		        	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
		          	<div class="abt-img">
		             	<img src="{{ url('/public/admin/clip-one/assets/pages/additional_images/original')}}/{{ $value->image }}" class="abt-img-responsive zoom1">
		           	</div> 
		       	</div>
		      @endforeach

	    	</div>
	   </div>
	</section>
@endif

@endsection