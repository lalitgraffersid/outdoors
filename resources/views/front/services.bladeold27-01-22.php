@extends('front.layout.master')
@section('content')

<section class="position-relative page-header service-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">{{$result->title}}</span>
  	</div>
</section>

<section class="about-content">
  	<div class="container">
  		<div class="about-content">
        	<div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              		<h2>{{$result->title}}</h2>
              		<div class="abt-text abt-margin">
              			{!! $result->description !!}
        			</div>
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
		             	<img src="{{ url('/public/admin/clip-one/assets/services/additional_images/original')}}/{{ $value->image }}" class="abt-img-responsive">
		           	</div> 
		       	</div>
		      @endforeach

	    	</div>
	   </div>
	</section>
@endif

@endsection