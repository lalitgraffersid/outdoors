
<?php $__env->startSection('content'); ?>

<section class="position-relative page-header gallery-page-header">
	<wrapper></wapper>    
 		<div class="page-head">
      	<span class="main-title">Gallery</span>
  		</div>
</section>

<section id="gallery" class="mb-4">
  	<div class="container">
    	<div id="image-gallery">
      	<div class="row pt-4">
         	
         	<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        		<div class="col-lg-4 col-md-4 col-sm-6 image">
	             	<div class="img-wrapper">
	               	<a href="<?php echo e(url('/public/admin/clip-one/assets/gallery/image').'/'.$value->image); ?>"><img src="<?php echo e(url('/public/admin/clip-one/assets/gallery/image').'/'.$value->image); ?>" class="img-responsive"></a>
	               	<div class="img-overlay">
	                 		<i class="fa fa-plus-circle" aria-hidden="true"></i>
	               	</div>
	             	</div>
	           	</div>
          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      	</div><!-- End row -->
 		</div><!-- End image gallery -->
	</div><!-- End container --> 
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/outdoorstructuresireland.com/httpdocs/resources/views/front/gallery.blade.php ENDPATH**/ ?>