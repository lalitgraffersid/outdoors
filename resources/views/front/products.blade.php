@extends('front.layout.master')
@section('content')
<style>
   .product h6 {
    padding: 10px 0px;
    font-weight: 600 !important;
    text-transform: capitalize;
    padding-bottom: 5px;
    font: 18px/24px 'Lato', sans-serif;
}
.price {
    color: #ff1616;
    font-size: 18px;
    font-weight: 600;
}
.product a.info {
    text-transform: uppercase;
    padding: 7px;
    font-size: 13px;
    color: #fff;
    width: 120px;
    float: left;
    text-align: center;
    background: #ff9030;
}
.product a.cart {
   text-transform: uppercase;
    padding: 7px;
    font-size: 13px;
    color: #fff;
    width: 120px;
    float: right;
    text-align: center;
    background: #222;
}
.pic img.img-fluid {
    width: 100%;
    border: 1px solid #9d9d9d;
    height: 210px;
    object-fit: cover;
}
.pic {
    padding-bottom: 15px;
}
.col-md-3.wow.product {
   margin: 20px 5px;
    border: 1px solid;
    padding: 10px;
    max-width: 24%;
}
@media only screen and (max-width: 767px) {
    .col-md-3.wow.product {
        margin: 20px 45px;
    max-width: 100%;
    }
    }
</style>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
  
		  	<!-- <span class="main-title"Product List</span> -->
  	</div>
</section>

<main id="main">

    <div class="container" style="margin-top: 35px;margin-bottom: 30px;">
        <div class="row">
            


        @foreach($results as $product)
        <?php 
              //    $images = DB::table('product_images')->where('product_id',$product->id)->get();
               ?>
                <div class="col-lg-4 col-md-6">
									<div class="services-wrapper">
										<div class="services-icon">
											<img src="{{url('/public/admin/clip-one/assets/category/original')}}/{{$product->image}}" alt="" class="img-fluid" style="height: 320px;">
										</div>

										<div class="services-text">
											<h3>{{$product->title}}</h3>
											<a href="{{ URL::to('/') }}/products/{{ $product->id }}">View Product</a>
										</div>
									</div>
								</div>

                   @endforeach
               </div>
            </div>
          
          
        </div>
    </div>

    <section>
        <div class="container-fluid">
            <div class="section-title" style="padding-bottom: 0px;"></div>
        </div>
    </section>
</main>

@endsection