<?php echo $__env->make('admin/includes/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin/includes/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin/includes/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     

<?php echo $__env->yieldContent('content'); ?>        

<?php echo $__env->make('admin/includes/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('script'); ?><?php /**PATH /home/aobhfo788oyt/public_html/resources/views/admin/layout/master.blade.php ENDPATH**/ ?>