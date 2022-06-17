<link rel="stylesheet" href="{{asset('assets/front/css/compare.css')}}">

<div class="row">
	<div class="col-lg-12">
		<div class="services-hdng m-0">
			<h5>Our Gallery</h5>
		</div>

		<ul class="gallery-tabs">
			@foreach($categories as $category)
				<li><a href="javascript:void(0);" class="category_id" data-id="{{$category->id}}">{{$category->name}}</a></li>
			@endforeach
		</ul>
	</div>

	@foreach($results as $result)
	<div class="col-lg-4">
		<div id="slider1" class="beer-slider" data-beer-label="after" data-start="25"><img class="img-fluid" src="{{url('/public/admin/clip-one/assets/gallery/after_image')}}/{{$result->after_image}}" alt="image1" />
			<div class="beer-reveal" data-beer-label="before"><img class="img-fluid" src="{{url('/public/admin/clip-one/assets/gallery/before_image')}}/{{$result->before_image}}" alt="image2" /></div>
		</div>
	</div>
	@endforeach

</div>

<script src="{{asset('assets/front/js/compare2.js')}}"></script>
<script src="{{asset('assets/front/js/compare.js')}}"></script>
<script>
   	$('.category_id').on('click',function(){
      	var id = $(this).data('id');

      	$.ajax({
         	url: "{{ url('gallery') }}"+"/"+id,
         	method: "GET",
         	success: function (response) {
           		$('#gallery_div').html(response);
         	}
     	});
   	});
</script>