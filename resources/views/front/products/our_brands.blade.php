@extends('front.layout.master')
@section('content')



<section class="hes_derimg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headeing_image">
                    <h4 class="brand">Our Brands</h4>
                    <p><strong><a href="{{route('home')}}">Home ></a></strong> <span>Our Brands</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===header===-->

 
  <!-- product section -->
<div class="container">
    <div class="heading_container heading_center">
        <h2 class="o_r_brand">Our Brands</h2>
    </div>
      
    <div class="row">

    	@foreach($results as $result)
        <div class="col-md-3">
          	<div class="box_our ">
           		<div class="image test">
           		    <a href="{{route('products',$result->brand_slug)}}">
                	<div class="box9">
                        <img src="{{url('/public/admin/clip-one/assets/brands/original')}}/{{$result->image}}">
                        <div class="box-content">
                            <h3 class="title">{{$result->name}}</h3>
                            <ul class="icon brand">   
                                <li><i class="fa fa-link"></i></li>
                            </ul>
                        </div>
                    </div> 
                    </a>
           		</div>
         	</div>
        </div>
        @endforeach

    </div>

    <div class="row">
		<div class="col-lg-12 text-center">
			<div class="mb-4">
				{{ $results->links() }}
			</div>
		</div>
	</div>

</div>

@endsection

@section('script')

@endsection