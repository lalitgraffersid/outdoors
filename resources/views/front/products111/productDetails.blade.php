@extends('front.layout.master')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="grey-bg full-width">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-7 col-sm-12">

							<div class="detail-panel">
								<div class="pro-detail-box mb-4">
									<img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$product_images[0]->image}}" alt="" class="img-fluid d-block mx-auto">
								</div>


								<div class="aligner">
										<div class="owl-carousel owl-theme">
											
											@foreach($product_images as $product_image)
											<div class="item">
												<a href="{{url('/public/admin/clip-one/assets/products/original')}}/{{$product_image->image}}" data-lightbox="gallery">
													<img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$product_image->image}}" alt="">
												</a>
											</div>
											@endforeach
											
										</div>
									</div>
							</div>

							
						</div>

						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
							<div class="machine-details">
								<div class="web-content">
								<h1>{{$result->title}}</h1>
								<p>{!! $result->short_description !!}</p>
								<p>{!! $result->long_description !!}</p>
								</div>

								<ul class="button-list mt-3">
										<li><a href="{{route('contact_us')}}">Contact Us</a></li>
								</ul>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
<script  src="{{asset('assets/front/js/owl.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#footer_class').removeClass();
	});
</script>
@endsection