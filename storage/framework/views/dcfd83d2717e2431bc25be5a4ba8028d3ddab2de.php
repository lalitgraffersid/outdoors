
<?php $__env->startSection('content'); ?>

<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Project Detail</span>
  	</div>
</section>

<section class="about-content">
  	<div class="container">
  		<div class="about-content">
        	<div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              		<h2><?php echo e($result->title); ?></h2>
              		<div class="abt-text abt-margin">
              			<?php echo $result->long_description; ?>

        			</div>
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
		             	<img src="<?php echo e(url('/public/admin/clip-one/assets/projects/additional_images/original')); ?>/<?php echo e($value->image); ?>" class="abt-img-responsive">
		           	</div> 
		       	</div>
		      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	    	</div>
	   </div>
	</section>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor\resources\views/front/projectDetails.blade.php ENDPATH**/ ?>