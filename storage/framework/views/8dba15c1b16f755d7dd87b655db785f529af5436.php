
<?php $__env->startSection('content'); ?>

<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title"><?php echo e($category->name); ?></span>
  	</div>
</section>

<section class="about-content">
  	<div class="container">
  		<div class="row">
  			
  			<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
	      		<div class="project-box">
	          		<div class="project-icon">
	              		<img src="<?php echo e(url('/public/admin/clip-one/assets/projects/featured_image/original')); ?>/<?php echo e($value->featured_image); ?>" class="img-fluid">
	          		</div>
	          		<div class="project-title-inner"><?php echo e($value->title); ?></div>                
	       			<p><?php echo e($value->short_description); ?></p>
	       			<div class="pr-btn"><a href="<?php echo e(route('projectDetails',$value->id)); ?>" class="project-btn">Read More</a></div>
	      		</div>
	      	</div>
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     	</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/front/projects.blade.php ENDPATH**/ ?>