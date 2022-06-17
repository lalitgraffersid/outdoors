
<?php $__env->startSection('content'); ?>

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
             	<img src="<?php echo e(asset('/public/admin/clip-one/assets/pages/featured_image/original')); ?>/<?php echo e($about_us->featured_image); ?>">
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
                             			<a href="<?php echo e(route('services',$value->id)); ?>"><img src="<?php echo e(asset('/public/admin/clip-one/assets/services/featured_image/original')); ?>/<?php echo e($value->featured_image); ?>" class="img-fluid"></a>
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
        		
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 image">
   	          	<div class="img-wrapper">
   	            	<a href="<?php echo e(url('/public/admin/clip-one/assets/gallery/image').'/'.$value->image); ?>"><img src="<?php echo e(url('/public/admin/clip-one/assets/gallery/image').'/'.$value->image); ?>" class="img-responsive"></a>
   	            	<div class="img-overlay">
   	              		<i class="fa fa-plus-circle" aria-hidden="true"></i>
   	            	</div>
   	          	</div>
           		</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        		<div class="col-12 pt-2 right-align"><a href="<?php echo e(route('gallery')); ?>" class="link">View All..</a></div>
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
          	<p class="contact-text2"><i class="fa fa-phone cont-icon"></i> <?php echo e($settings->name_1); ?>: <a href="calto:<?php echo e($settings->phone_1); ?>" class="link"><?php echo e($settings->phone_1); ?></a></p>
          	<p class="contact-text2"><i class="fa fa-phone cont-icon"></i> <?php echo e($settings->name_2); ?>: <a href="calto:<?php echo e($settings->phone_2); ?>" class="link"><?php echo e($settings->phone_2); ?></a></p>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/front/home/index.blade.php ENDPATH**/ ?>