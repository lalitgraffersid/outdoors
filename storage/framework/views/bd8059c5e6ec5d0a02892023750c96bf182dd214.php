
<?php $__env->startSection('content'); ?>

<section class="position-relative page-header abt-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   		<span class="main-title"><?php echo e($result->title); ?></span>
  	</div>
</section>

<section class="about-content">
  	<div class="container">
  		<div class="about-content">
         <div>
            <h2><?php echo e($result->title); ?></h2>
         </div>
        	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                <div class="abt-text abt-margin">
                   
               <?php echo $result->description; ?>

               
            </div>
            </div>
        	</div>
    	</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/outdoorstructuresireland.com/httpdocs/resources/views/front/privacy_policy.blade.php ENDPATH**/ ?>