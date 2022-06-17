@extends('front.layout.master')

@section('content')

<style>
	.contentbox {
    padding: 15px;
}


</style>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   
		  	<!-- <span class="main-title">Product List</span> -->
  	</div>
</section>

  <section class="about-content">
  	<div class="container">
  		<div class="row">
  			
      @foreach($results as $result)
      <?php 
               $images = DB::table('product_images')->where('product_id',$result->id)->get();
               ?>
	  			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
	      		<div class="project-box">
	          		<div class="project-icon">
                <img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$images[0]->image}}" alt="" class="img-fluid">
	          		</div>
					<div class="contentbox">
	          		<div class="project-title-inner"><a href="{{route('productDetails',$result->id)}}">{{$result->title}}</a></div>                
	       			<p>{{ $result->short_description }}</p>
               @if($result->variants == '1')
                              <?php
                                 $yourArr = explode(",", $result->prices);
                                 $max = max($yourArr);
                                 $min = min($yourArr);
                              ?>
                      <h4>Price: €{{$min}} - €{{$max}}</h4>
                        @else
                       @endif 


					   <?php
  $hide=" "; // default visible
   if ($result->price == 0) : 
      $hide="hide";
 ?>
  <label class="<?= $hide ?> cus-price">
				  
              </label>


<?php endif ?>
<?php
  $hide=" "; // default visible
   if ($result->price > 1) : 
      $hide="hide";
 ?>
 <label class="<?= $hide ?>">
                  Price: <span id="price_span">€{{$result->price}}</span>
				  
              </label>
<?php endif ?>
	       			<div class="pr-btn"><a href="{{route('productDetails',$result->id)}}" class="project-btn">View Detail</a></div>
	      		</div>
						      		</div>

	      	</div>
	      @endforeach

     	</div>
	</div>
</section>
 
@endsection

@section('script')

@endsection