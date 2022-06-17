@extends('front.layout.master')
@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="full-width">		
          	<div id="demo" class="carousel slide" data-ride="carousel">
              	<div class="carousel-inner">
                	
                  @foreach($banners as $key => $value)
                     <div class="carousel-item  {{$key == '0' ? 'active' : ''}}">
                        @if($value->file_type == 'Image')
                           <img src="{{ url('/public/admin/clip-one/assets/banners/original')}}/{{ $value->file }}" alt=""  class="img-fluid banner-img banner-height">
                           <div class="pos-center">
                              <p class="banner-caption">{{$value->description}}</p>
                           </div>
                        @else
                           <video src="{{ url('/public/admin/clip-one/assets/banners/videos')}}/{{ $value->file }}" autoplay="autoplay" width="100%" muted></video>
                        @endif   
                   	</div>
                  @endforeach

              	</div>
              	<a class="carousel-control-prev" href="#demo" data-slide="prev">
                	<span class="carousel-control-prev-icon"></span>
              	</a>
              	<a class="carousel-control-next" href="#demo" data-slide="next">
                	<span class="carousel-control-next-icon"></span>
              	</a>
            </div>
			</div>
		</div>
	</div>
</section>

<section class="about-content">
  	<div class="container">
     	<div class="about-content">
    		<div class="row">
         	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
             	<img src="{{ asset('/public/admin/clip-one/assets/pages/featured_image/original')}}/{{$about_us->featured_image}}">
         	</div>
         	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
             	<p class="abt-caption">About Us</p>
             	<div class="row">
                 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     {!! $about_us->description !!}
                 	</div>
                 	<div class="col-12 right-align"><a href="{{route('about_us')}}" class="link">Read More..</a></div>
             	</div>
         	</div>
     		</div>
 		</div>
	</div>
</section>

<section class="services-content">
	<div class="container"> 
    	<div class="service-bg">
        	<div class="row">
        	    
    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        			<div class="services-head">
            		Our Services
        			</div>
        			
        			<!-- partial:index.partial.html -->
                        <div class="owl-slider">
                            <div id="carousel" class="owl-carousel">
                                
                                @foreach($services as $value)
                                <?php
                                    $description = app\Helpers\AdminHelper::removeHtmlTags($value->description);
                                ?>
                                <div class="item">
                                    <div class="service-icon">
                             			<a href="{{route('services',$value->id)}}"><img src="{{ asset('/public/admin/clip-one/assets/services/featured_image/original')}}/{{ $value->featured_image }}" class="img-fluid"></a>
                   					</div>
                   					<a href="{{route('services',$value->id)}}"><span class="service-title">{{ $value->title }}</span> <i class="fa fa-chevron-circle-right chev"></i>
                   						<p class="service-text">{{ \Illuminate\Support\Str::limit(strip_tags($description), 150, $end='...') }}</p>
                   					</a>
                        	    </div>
                        	    @endforeach
                        	
                            </div>
                        </div>
                        <!-- partial -->
    			</div>

        	</div>
		</div>
   </div>
</section>

<section class="project-content-head">
  	<div class="container-fluid">
  		<div class="row">
      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          	<div class="project-head">Gallery</div>
      	</div>
    	</div>
   </div>
</section>

<section id="gallery">
  	<div class="container">
    	<div id="image-gallery">
      	<div class="row">
        		
            @foreach($galleries as $value)
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 image">
   	          	<div class="img-wrapper">
   	            	<a href="{{ url('/public/admin/clip-one/assets/gallery/image').'/'.$value->image }}"><img src="{{ url('/public/admin/clip-one/assets/gallery/image').'/'.$value->image }}" class="img-responsive"></a>
   	            	<div class="img-overlay">
   	              		<i class="fa fa-plus-circle" aria-hidden="true"></i>
   	            	</div>
   	          	</div>
           		</div>
            @endforeach

        		<div class="col-12 pt-2 right-align"><a href="{{route('gallery')}}" class="link">View All..</a></div>
      	</div>
    	</div>
  	</div> 
</section>

<section class="contact-content">
   <div class="container">
     	<div class="row">
         <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
          	<p class="contact-text">We have your ideas in mind and aim to be innovative and creative</p>
         </div>
         <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          	<p class="contact-text2"><i class="fa fa-phone cont-icon"></i> {{$settings->name_1}}: <a href="calto:{{$settings->phone_1}}" class="link">{{$settings->phone_1}}</a></p>
          	<p class="contact-text2"><i class="fa fa-phone cont-icon"></i> {{$settings->name_2}}: <a href="calto:{{$settings->phone_2}}" class="link">{{$settings->phone_2}}</a></p>
      	</div>
     	</div>
 	</div>
</section>

<section class="project-content-head">
 	<div class="container-fluid">
    	<div class="row">  
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="project-head">
               Our Projects
            </div>
        	</div>
      </div>
	</div>
</section>


@foreach($categories as $key => $value)
   <section class="position-relative <?php if($key == '0'){echo "project-content";}else{echo "project-content2";} ?>" style="background: url('{{ url('/public/admin/clip-one/assets/categories/original')}}/{{ $value->image }}') center no-repeat;">
     	<wrapper></wrapper>
       	<div class="project-pos">
         	<span class="project-title">{{$value->name}}</span>
       		<p class="project-subtext project-pos-sub">{{$value->description}}</p>
       		<a href="{{route('projects',$value->id)}}" class="project-btn">View All <i class="fa fa-play"></i></a>
     		</div>
   </section>
@endforeach

<!-- <section>
      <div class="container-fluid">
        <div class="row">
          <div class="home-about services-panel full-width">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 mb-4">
                  <div class="services-hdng">
                    <h2>Products Overview</h2>
                    <p>Leading suppliers of top quality horse feed and horse supplements, <br> agri feeds, horse tack, pet food and equipment</p>
                  </div>
                 </div>

                 @foreach($results as $result)

                <div class="col-lg-4 col-md-6">
                  <div class="services-wrapper">
                    <div class="services-icon">
                      <img src="{{url('/public/admin/clip-one/assets/category/original')}}/{{$result->image}}" alt="" class="img-fluid">
                    </div>

                    <div class="services-text">
                      <h3>{{$result->title}}</h3>
                      <a href="{{route('products',$result->id)}}">View Category</a>
                    </div>
                  </div>
                </div>

                @endforeach

                


              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->


<section id="testim" class="testim testi-content">
   <div class="web-content text-center">
     	<h3 class="testi-head">Testimonials</h3>
   </div>
  	<div class="wrap">
    	<span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
      <span id="left-arrow" class="arrow left fa fa-chevron-left "></span> 
      <ul id="testim-dots" class="dots">
         @foreach($testimonials as $key => $value)
            <li class="dot <?php if($key == '0'){echo 'active';} ?>"></li>
         @endforeach
      </ul>
      <div id="testim-content" class="cont">
         
         @foreach($testimonials as $key => $value)
         <div class="<?php if($key == '0'){echo 'active';} ?>">
           	<p class="testi-text">{{$value->description}}</p>                  
           	<h2 class="testi-name">-- {{$value->name}} --</h2>
         </div>
         @endforeach

      </div>
  	</div>
  	<div class="row">
    	<div class="offset-md-2 col-md-8 col-sm-12">
      	<div class="mail-content">
        		<div class="mail-content-head">Join our mailing list
          		<p class="mail-content-subhead">Outdoor Structures</p>
        		</div>
        		<div class="mail-box">
               <form id="quickForm" action="{{route('mailing_list.save')}}" method="POST">
                  {{csrf_field()}}
             		<ul>
   	            	<li><input type="text" class="form-control" name="name" placeholder="Name"></li>
   	            	<li><input type="text" class="form-control" name="email" placeholder="Email"></li>
   	            	<li><button type="submit" class="send-btn"><i class="fa fa-telegram send-icon"></i></button></li>
               	</ul>
               </form>
          	</div>
        	</div>
      </div>
   </div>
</section>

@endsection

@section('script')
<script src="{{asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
$(function () {
   $('#quickForm').validate({
      rules: {
         name: {
            required: true
         },
         email: {
            required: true
         }
      },
      messages: {
      name: {
            required: "Please enter Name",
         },
         email: {
            required: "Please enter email",
         }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
         error.addClass('invalid-feedback');
         element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
         $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
         $(element).removeClass('is-invalid');
      }
   });
});
</script>
@endsection