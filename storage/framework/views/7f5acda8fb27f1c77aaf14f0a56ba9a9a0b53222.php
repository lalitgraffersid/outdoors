
<?php $__env->startSection('content'); ?>

<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Product Category</span>
  	</div>
</section>

	<section class="about-content">
  	<div class="container">
  		<div class="row">
  			
		  <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
	      		<div class="project-box">
	          		<div class="project-icon">
					  <img src="<?php echo e(url('/public/admin/clip-one/assets/category/original')); ?>/<?php echo e($result->image); ?>" alt="" class="img-fluid">
	          		</div>
	          		<div class="project-title-inner"><?php echo e($result->title); ?></div>                
	       			<p><?php echo e($value->short_description); ?></p>
	       			<div class="pr-btn"><a href="<?php echo e(route('products',$result->id)); ?>" class="project-btn">View Products</a></div>
	      		</div>
	      	</div>
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     	</div>
	</div>
</section>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor\resources\views/front/brand/index.blade.php ENDPATH**/ ?>