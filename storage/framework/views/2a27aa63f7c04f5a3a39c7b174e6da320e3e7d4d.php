<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Order Item Details</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Order view</li>
                  
               </ol>
            </div>
            </div>
         </div>
      </div>
    <!-- start: MAIN CONTAINER -->

        <div class="container">
          <!-- start: PAGE HEADER -->
          
          <div class="row">
            <div class="col-sm-12">
              <!-- start: STYLE SELECTOR BOX -->
              <!-- end: STYLE SELECTOR BOX -->
              <!-- start: PAGE TITLE & BREADCRUMB -->
             
              
              <!-- end: PAGE TITLE & BREADCRUMB -->
              <!-- Display all errors -->
              

              <!-- ############ -- >
            </div>
          </div>
          <!-- end: PAGE HEADER -->
          <!-- start: PAGE CONTENT -->
          <div class="row">
            <div class="col-sm-12">
              <!-- start: TEXT FIELDS PANEL -->
              <div class="panel panel-default">
                <div class="panel-body">
                  <p>Billing Name: <?php echo e($orderDetails->billing_first_name); ?> <?php echo e($orderDetails->billing_last_name); ?></p>
                  <p>Billing Phone: <?php echo e($orderDetails->billing_phone); ?></p>
                  <p>Billing Email: <?php echo e($orderDetails->billing_email); ?></p>
                  <p>Billing Country: <?php echo e($orderDetails->billing_country); ?> Ireland</p>
                  <p>Billing City: <?php echo e($orderDetails->billing_city); ?></p>
                  <p>Billing Address: <?php echo e($orderDetails->billing_address); ?></p>
                  <p><strong>Billing Amount (Including vat €8): €<?php echo e($billamout); ?></strong></p>
                  <p>Billing Charge Id: <?php echo e($orderDetails->charge_id); ?></p>
                  <p>Billing Order Id: <?php echo e($orderDetails->order_id); ?></p>
                  <p>Billing Transaction Id: <?php echo e($orderDetails->transaction_id); ?></p>
                  
                  
                <hr>
                 <?php $__currentLoopData = $itemsDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>Product Name: <?php echo e($item->item_name); ?></p>
                    <p>Product Price: €<?php echo e($item->item_price); ?></p>
                    <p>Quantity: <?php echo e($item->quantity); ?></p>
                    <hr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </div>
              <!-- end: TEXT FIELDS PANEL -->
              <a class="btn btn-green" href="<?php echo e(url('admin/order/index')); ?>">Back To Listing</a>
            </div>

           

          </div>
          <!-- end: PAGE CONTENT-->
        </div>
      </div>
    <!-- end: MAIN CONTAINER -->
  
<?php $__env->stopSection(); ?>

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset("/admin/clip-one/assets/plugins/ckeditor/ckeditor.js")); ?>"></script>
  <!--    #################  cms form validation ##################### -->
   <script src="<?php echo e(asset("/admin/clip-one/assets/js/gallery.js")); ?>"></script>
  <!--    #################  cms form validation ##################### -->
<script type="text/javascript">
        var editor = CKEDITOR.replace( 'description', {

                             filebrowserBrowseUrl : '<?php echo e(url('')); ?>/admin/clip-one/assets/plugins/ckfinder/ckfinder.html',

                             filebrowserImageBrowseUrl : '<?php echo e(url('')); ?>/admin/clip-one/assets/plugins/ckfinder/ckfinder.html?type=Images',

                             filebrowserFlashBrowseUrl : '<?php echo e(url('')); ?>/admin/clip-one/assets/plugins/ckfinder/ckfinder.html?type=Flash',

                             filebrowserUploadUrl : '<?php echo e(url('')); ?>/admin/clip-one/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                             filebrowserImageUploadUrl : '<?php echo e(url('')); ?>/admin/clip-one/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                             filebrowserFlashUploadUrl : '<?php echo e(url('')); ?>/admin/clip-one/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

                             }); 
  </script>

<?php $__env->stopSection(); ?>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/admin/order/view.blade.php ENDPATH**/ ?>