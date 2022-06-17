
<?php $__env->startSection('content'); ?>

<section class="position-relative page-header abt-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	
		  	<!-- <span class="main-title">About Us</span> -->
  	</div>
</section>

<section class="about-content">
  	<div class="container">
  		<div class="about-content">
        	<div class="row">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 ">
             	<img src="<?php echo e(asset('/public/admin/clip-one/assets/pages/featured_image/original')); ?>/<?php echo e($result->featured_image); ?>">
          	</div>
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 ">
               <?php echo $result->description; ?>

            </div>
        	</div>
    	</div>
	</div>
</section>

<?php if(count(images)>0): ?>
	<section  class="about-content">
	 	<div class="container">
	     	<div class="row">
	        	
	        	<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
		          	<div class="abt-img">
		             	<img src="<?php echo e(url('/public/admin/clip-one/assets/pages/additional_images/original')); ?>/<?php echo e($value->image); ?>" class="abt-img-responsive">
		           	</div> 
		       	</div>
		      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	    	</div>
	   </div>
	</section>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/outdoorstructuresireland.com/httpdocs/resources/views/front/about_us.blade.php ENDPATH**/ ?>