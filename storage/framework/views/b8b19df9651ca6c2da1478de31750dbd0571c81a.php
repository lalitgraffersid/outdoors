

<?php $__env->startSection('content'); ?>

<style>
	.contentbox {
    padding: 15px;
}


</style>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   
		  	<!-- <span class="main-title">Product List</span> -->
  	</div>
</section>

  <section class="about-content">
  	<div class="container">
  		<div class="row">
  			
      <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php 
               $images = DB::table('product_images')->where('product_id',$result->id)->get();
               ?>
	  			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
	      		<div class="project-box">
	          		<div class="project-icon">
                <img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($images[0]->image); ?>" alt="" class="img-fluid">
	          		</div>
					<div class="contentbox">
	          		<div class="project-title-inner"><a href="<?php echo e(route('productDetails',$result->id)); ?>"><?php echo e($result->title); ?></a></div>                
	       			<p><?php echo e($result->short_description); ?></p>
               <?php if($result->variants == '1'): ?>
                              <?php
                                 $yourArr = explode(",", $result->prices);
                                 $max = max($yourArr);
                                 $min = min($yourArr);
                              ?>
                      <h4>Price: €<?php echo e($min); ?> - €<?php echo e($max); ?></h4>
                        <?php else: ?>
                       <?php endif; ?> 


					   <?php
  $hide=" "; // default visible
   if ($result->price == 0) : 
      $hide="hide";
 ?>
  <label class="<?= $hide ?> cus-price">
				  
              </label>


<?php endif ?>
<?php
  $hide=" "; // default visible
   if ($result->price > 1) : 
      $hide="hide";
 ?>
 <label class="<?= $hide ?>">
                  Price: <span id="price_span">€<?php echo e($result->price); ?></span>
				  
              </label>
<?php endif ?>
	       			<div class="pr-btn"><a href="<?php echo e(route('productDetails',$result->id)); ?>" class="project-btn">View Detail</a></div>
	      		</div>
						      		</div>

	      	</div>
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     	</div>
	</div>
</section>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor_june\resources\views/front/products/products.blade.php ENDPATH**/ ?>