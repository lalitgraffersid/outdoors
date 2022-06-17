
<?php $__env->startSection('content'); ?>

<style>
    .mul{
		height: 200px!important;
		width: 400px!important;
    right: 0!important;
    left: auto!important;
    width: 290px;
    transform: none!important;
    top: 35px!important;
}
	.linkselct {
    color: #000 !important;
    font-weight: 800;
    transition: all 200ms linear;
}
.selected_btn {
    background: #eeeeee !important;
    height: fit-content;
    border-radius: 10px;
	

}
.btn-green {
    background: #40a798;
    color: #fff;
    font-size: 16px;
    padding: 7px 10px;
    border: 1px solid #fff;
    width: 110px;
    display: block;
    text-align: center;
    cursor: pointer;
    transition: ease-in-out 0.5s;
	}
	.about-content {
    margin: 5px 0;
}
  #color_span, #size_span, #price_span{
    font-size: initial;
    top: auto;
  }
  #price_span, .price, .price span{
    font-size: 30px;
    top: auto;
  }
	.price-section{
		padding-top: 20px;
	}
  label.cus-price {
    font-weight: 600;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    font-size: 25px;
}
.add-cart {
    background-color: #ff1616;
    display: inline-block;
    padding: 10px 30px;
    color: #fff !important;
    outline: none;
    border-radius: 5px;
    font-size: 17px;
    letter-spacing: 1px;
    margin-top: 20px;
}
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

.product-calculator {
    width: 1140px;
    margin: 50px auto;
    padding: 0px 15px;
}
.product-calculator h3 {
    margin-bottom: 20px;
    font-weight: 700;
    color: #000;
    letter-spacing: 1px;
}
.product-calculator select {
    margin-bottom: 20px;
    height: 45px;
    border: navajowhite;
    box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
    padding: 0px 10px;
    border-radius: 10px;
}
	a#cartUrl {
    margin-top: 10px;
    width: 100%;
    height: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
}
	.product-calculator label {
    color: #000;
    font-weight: 500;
    text-transform: capitalize;
    font-size: 16px;
}
	a#cartUrl:hover {
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
		color: #fff;
	}
	@media(max-width:1024px){
		.product-calculator {
			width: 100%;
		}
	}
  .zoom:hover {
    transform: scale(1.03);
}
.zoom1:hover {
    transform: scale(1.6);
}
.zoom2:hover {
    transform: scale(1.05);
}
</style>

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="full-width">		
          	<div id="demo" class="carousel slide" data-ride="carousel">
              	<div class="carousel-inner">
                	
                  <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="carousel-item  <?php echo e($key == '0' ? 'active' : ''); ?>">
                        <?php if($value->file_type == 'Image'): ?>
                           <img src="<?php echo e(url('/public/admin/clip-one/assets/banners/original')); ?>/<?php echo e($value->file); ?>" alt=""  class="img-fluid banner-img banner-height">
                           <div class="pos-center">
                              <p class="banner-caption"><?php echo e($value->description); ?></p>
                           </div>
                        <?php else: ?>
                           <video src="<?php echo e(url('/public/admin/clip-one/assets/banners/videos')); ?>/<?php echo e($value->file); ?>" autoplay="autoplay" width="100%" muted></video>
                        <?php endif; ?>   
                   	</div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
             	<img class="zoom" src="<?php echo e(asset('/public/admin/clip-one/assets/pages/featured_image/original')); ?>/<?php echo e($about_us->featured_image); ?>">
         	</div>
         	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
             	<p class="abt-caption">About Us</p>
             	<div class="row">
                 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <?php echo $about_us->description; ?>

                 	</div>
                 	<div class="col-12 right-align"><a href="<?php echo e(route('about_us')); ?>" class="link">Read More..</a></div>
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
                                
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $description = app\Helpers\AdminHelper::removeHtmlTags($value->description);
                                ?>
                                <div class="item">
                                    <div class="service-icon">
                             			<a href="<?php echo e(route('services',$value->id)); ?>"><img class="zoom1" src="<?php echo e(asset('/public/admin/clip-one/assets/services/featured_image/original')); ?>/<?php echo e($value->featured_image); ?>" class="img-fluid"></a>
                   					</div>
                   					<a href="<?php echo e(route('services',$value->id)); ?>"><span class="service-title"><?php echo e($value->title); ?></span> <i class="fa fa-chevron-circle-right chev"></i>
                   						<p class="service-text"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($description), 150, $end='...')); ?></p>
                   					</a>
                        	    </div>
                        	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        	
                            </div>
                        </div>
                        <!-- partial -->
    			</div>

        	</div>
		</div>
   </div>
</section>


<!-- ******************************************************gallery*********************** -->


<section>
      <div class="container-fluid">
        <div class="row">
          <div class="home-about services-panel full-width">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 mb-4">
                  <div class="services-hdng">
                    <h2>Products Overview</h2>
                    <p>Leading suppliers of top quality </p>
					  
                  </div>
                 </div>
               <?php  //echo '<pre>';print_r($results);die; ?>
                 <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php 
               //   echo $value->id;die;
           
               ?>
                <div class="col-lg-4 col-md-6">
                  <div class="services-wrapper">
                    <div class="services-icon">
                   
                      <img src=" <?php echo e(url('/public/admin/clip-one/assets/category/original')); ?>/<?php echo e($value->image); ?>" alt="" class="img-fluid zoom2"  style="height: 320px;">
                    </div>

                    <div class="services-text">
                      <h3><?php echo e($value->title); ?></h3>
						
                      <a href="<?php echo e(url('products/'.$value->id)); ?>">View Category</a>
                    </div>
                  </div>
                </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
   
                
                

                <div class="col-lg-12 text-center">
                  <a href="<?php echo e(url('products')); ?>" class="service-btn">View Shop <i class="icofont-simple-right"></i></a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ******************************************************************************************** -->


    



<!-- ******************************************************galleryend*********************** -->


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


<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <section class="position-relative <?php if($key == '0'){echo "project-content";}else{echo "project-content2";} ?>" style="background: url('<?php echo e(url('/public/admin/clip-one/assets/categories/original')); ?>/<?php echo e($value->image); ?>') center no-repeat;">
     	<wrapper></wrapper>
       	<div class="project-pos">
         	<span class="project-title"><?php echo e($value->name); ?></span>
       		<p class="project-subtext project-pos-sub"><?php echo e($value->description); ?></p>
       		<a href="<?php echo e(route('projects',$value->id)); ?>" class="project-btn">View All <i class="fa fa-play"></i></a>
     		</div>
   </section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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

                 <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-4 col-md-6">
                  <div class="services-wrapper">
                    <div class="services-icon">
                      <img src="<?php echo e(url('/public/admin/clip-one/assets/category/original')); ?>/<?php echo e($result->image); ?>" alt="" class="img-fluid">
                    </div>

                    <div class="services-text">
                      <h3><?php echo e($result->title); ?></h3>
                      <a href="<?php echo e(route('products',$result->id)); ?>">View Category</a>
                    </div>
                  </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                


              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
	<form action="calculator" method="post">
<?php echo csrf_field(); ?>
<section>
<div class="product-calculator">
				<h3>Product Calculator</h3>
				<select name="product" class="form-control" aria-label="Default select example">
					  <option selected>Select Product</option>
					  <option value="Louvred Roof Technic wall mounted">Louvred Roof Technic wall mounted</option>
					  <option value="Louvred Roof Technic Freestanding">Louvred Roof Technic Freestanding</option>
					  <option value="Elegancy retractable roof wall mounted">Elegancy retractable roof wall mounted</option>
					  <option value="Elegancy retractable roof Freestanding">Elegancy retractable roof Freestanding</option>
					  <option value="Essential Plus Glass roof veranda">Essential Plus Glass roof veranda</option>
					  <option value="Essential Plus GPolycarbonate roof veranda">Essential Plus GPolycarbonate roof veranda</option>
				</select>
				<div class="technical-Freestanding">
					<label>Length:</label>
					<select name="length" class="form-control" aria-label="Default select example">						<option>--Select Length--</option>
						  <option value="3m">3m</option>
						  <option value="4m">4m</option>
						  <option value="5m">5m</option>
						  <option value="6m">6m</option>
					</select>
					<label>Width:</label>
					<select name="width" class="form-control" aria-label="Default select example">							<option>--Select Width--</option>
						   <option value="3m">3m</option>
						  <option value="4m">4m</option>
						  <option value="5m">5m</option>
						  <option value="6m">6m</option>
					</select>
				</div>
				
				<div class="price-section">
					<label>Title:</label>
					<span>€0+13.5% Vat</span>
					<!-- <a href="javascript:void(0)" id="cartUrl" onclick="add2cart();" class="btn-green">Enquire Now</a> -->
					<button class="btn-green" type="submit">Enquire Now</button>

				</div>
</form>
			</div>
</section>
<section id="testim" class="testim testi-content">
   <div class="web-content text-center">
     	<h3 class="testi-head">Testimonials</h3>
   </div>
  	<div class="wrap">
    	<span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
      <span id="left-arrow" class="arrow left fa fa-chevron-left "></span> 
      <ul id="testim-dots" class="dots">
         <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="dot <?php if($key == '0'){echo 'active';} ?>"></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <div id="testim-content" class="cont">
         
         <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="<?php if($key == '0'){echo 'active';} ?>">
           	<p class="testi-text"><?php echo e($value->description); ?></p>                  
           	<h2 class="testi-name">-- <?php echo e($value->name); ?> --</h2>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
  	</div>
  	<div class="row">
    	<div class="offset-md-2 col-md-8 col-sm-12">
      	<div class="mail-content">
        		<div class="mail-content-head">Join our mailing list
          		<p class="mail-content-subhead">Outdoor Structures</p>
        		</div>
        		<div class="mail-box">
               <form id="quickForm" action="<?php echo e(route('mailing_list.save')); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>

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

<script>
	function add2cart() {
		debugger
             $.ajax({

                 url: "<?php echo e(url('save_cart')); ?>",

                 type: "POST",

                 data: {
					"_token": "<?php echo e(csrf_token()); ?>",
                     "price": jQuery('.price-section span').html(),

                     "qty": 1,

                     "length": jQuery('select[name="length"]').val(),

                     "width" : jQuery('select[name="width"]').val(),

                 },

                 success: function(data) {
                    window.location.href = "<?php echo e(url('view-cart')); ?>";
                 }

             });


     }
	jQuery(document).on('change', 'select[name="length"]', function(){
		let _len = jQuery(this).val();
		let _wdth = jQuery('select[name="width"]').val();
		if(_len == '3m' && _wdth == '3m') {
			jQuery('.price-section span').html('€11,652')
			
		} else if(_len == '4m' && _wdth == '3m') {
			jQuery('.price-section span').html('€13,169')
		}else if(_len == '5m' && _wdth == '3m') {
			jQuery('.price-section span').html('€14,718')
		}else if(_len == '5m' && _wdth == '4m') {
			jQuery('.price-section span').html('€15,983')
		}else if (_len == '6m' && _wdth == '4m'){
			alert()
			jQuery('.price-section span').html('€17,772')
		} else {
			jQuery('.price-section span').html('0')
		}
	})
	jQuery(document).on('change', 'select[name="width"]', function(){
		let _len = jQuery('select[name="length"]').val();
		let _wdth = jQuery(this).val();
		if(_len == '3m' && _wdth == '3m') {
			jQuery('.price-section span').html('€11,652')
			
		} else if(_len == '4m' && _wdth == '3m') {
			jQuery('.price-section span').html('€13,169')
		}else if(_len == '5m' && _wdth == '3m') {
			jQuery('.price-section span').html('€14,718')
		}else if(_len == '5m' && _wdth == '4m') {
			jQuery('.price-section span').html('€15,983')
		}else if (_len == '6m' && _wdth == '4m'){
			jQuery('.price-section span').html('€17,772')
		} else {
			jQuery('.price-section span').html('0')
		}
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor_june\resources\views/front/home/index.blade.php ENDPATH**/ ?>