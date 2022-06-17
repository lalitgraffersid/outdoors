@extends('front.layout.master')
@section('content')

<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">{{--$category->name--}}</span>
  	</div>
</section>

<section class="about-content">
  	<div class="container">
  		<div class="row">
  			
  			@foreach($results as $value)
	  			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
	      		<div class="project-box">
	          		<div class="project-icon">
	              		<img src="{{ url('/public/admin/clip-one/assets/projects/featured_image/original')}}/{{ $value->featured_image }}" class="img-fluid">
	          		</div>
	          		<div class="project-title-inner">{{$value->title}}</div>                
	       			<p>{{ $value->short_description }}</p>
	       			<div class="pr-btn"><a href="{{route('projectDetails',$value->id)}}" class="project-btn">Read More</a></div>
	      		</div>
	      	</div>
	      @endforeach

     	</div>
	</div>
</section>

@endsection