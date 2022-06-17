@extends('front.layout.master')
@section('content')

<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Product Category</span>
  	</div>
</section>

	<section class="about-content">
  	<div class="container">
  		<div class="row">
  			
		  @foreach($results as $result)
	  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
	      		<div class="project-box">
	          		<div class="project-icon">
					  <img src="{{url('/public/admin/clip-one/assets/category/original')}}/{{$result->image}}" alt="" class="img-fluid">
	          		</div>
	          		<div class="project-title-inner">{{$result->title}}</div>                
	       			<p>{{ $value->short_description }}</p>
	       			<div class="pr-btn"><a href="{{route('products',$result->id)}}" class="project-btn">View Products</a></div>
	      		</div>
	      	</div>
	      @endforeach

     	</div>
	</div>
</section>







@endsection