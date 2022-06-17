@extends('front.layout.master')
@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="grey-bg full-width">
				<div class="container">
					<div class="row">

						<div class="col-lg-9">
							<div class="row">
								<div class="col-lg-12 mb-4">
									<div class="web-content">
										<h1 class="categoty-hdng">{{$category->name}} Containers</h1>
									</div>
								</div>

								@foreach($results as $result)
								<?php 
									$product_image = DB::table('product_images')->where('product_id',$result->id)->first();
								?>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<div class="container-panel">
										<div class="container-icon buy-icon">
											<img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$product_image->image}}" alt="" class="img-fluid d-block mx-auto">
										</div>

										<div class="container-text buy-text">
											<h6>{{$result->title}}</h6>
											<a href="{{route('productDetails',$result->id)}}">View More</a>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>


						<div class="col-lg-3">
							<div class="catrgory-side">
								<h3>Sub Categories</h3>

								<ul class="sidebar-links">
									@foreach($sub_categories as $sub_category)
									<li><a href="{{route('productsByCategory',[$sub_category->category_id,$sub_category->id])}}">{{$sub_category->title}}</a></li>
									@endforeach
								</ul>

								<a href="{{route('contact_us')}}" class="inner-contact">Contact Us <i class="icofont-long-arrow-right"></i></a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('script')
<script>
	$(document).ready(function(){
		$('#footer_class').removeClass();
	});
</script>
@endsection