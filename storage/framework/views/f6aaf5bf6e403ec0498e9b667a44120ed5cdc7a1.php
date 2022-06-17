<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Edit Order Status</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Order Status
Edit</li>
                  
               </ol>
            </div>
            </div>
         </div>
      </div>
    <!-- start: MAIN CONTAINER -->

        <div class="container" ng-controller="cmsController">
          <!-- start: PAGE HEADER -->
          
          <div class="row">
            <div class="col-sm-12">
              <!-- start: STYLE SELECTOR BOX -->
              <!-- end: STYLE SELECTOR BOX -->
              <!-- start: PAGE TITLE & BREADCRUMB -->
             
              
              <!-- end: PAGE TITLE & BREADCRUMB -->
              <!-- Display all errors -->
              <?php if(count($errors) > 0): ?>
              <div class="alert alert-danger val-error-list">
                <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
              <?php endif; ?>

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
                  <div class="alert-mesg" flash-message="{{statusMesg}}"></div>

           <?php echo Form::open(array('route' => 'order.update','method'=>'POST', 'class' => 'form-horizontal', 'id' => 'orderEdit', 'name' => 'orderEdit', 'files' => true, 'enctype' => 'multipart/form-data')); ?> 

                    

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="order_status">
                        Order Status
                      </label>
                      <div class="col-sm-6">
                        <select name="order_status" id="order_status" required>
                          
                          <option value="1" <?php echo e($orderDetail->order_status == 1 ? 'selected=selected' : ''); ?>>Ordered</option>
                          <option value="2" <?php echo e($orderDetail->order_status == 2 ? 'selected=selected' : ''); ?>>Processing</option>
						  <option value="3" <?php echo e($orderDetail->order_status == 3 ? 'selected=selected' : ''); ?>>Completed</option>
                          
                        </select>
                      </div>
           
                    </div>
                    
                    
                    <input type="hidden" class="form-control" name="order_id" id="order_id" value="<?php echo e($orderDetail->id); ?>">
                     
                    <div class="form-group">
                      <label class="col-sm-2 control-label">
                       
                      </label>
                      <div class="col-sm-9">

                       
                        <input type="submit" id="save" name="save" class="btn btn-primary" value="Update"/>
                        <a class="btn btn-green" href="<?php echo e(url('admin/order/index')); ?>">Back</a>
                      </div>
                    </div>

                 <!--  <?php echo Form::close(); ?>  -->
                </div>
              </div>
              <!-- end: TEXT FIELDS PANEL -->
            </div>
          </div>
          <!-- end: PAGE CONTENT-->
        </div>
</div>
    <!-- end: MAIN CONTAINER -->
  
<?php $__env->stopSection(); ?>

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset("/public/admin/clip-one/assets/plugins/ckeditor/ckeditor.js")); ?>"></script>
  <!--    #################  cms form validation ##################### -->
   <script src="<?php echo e(asset("/public/admin/clip-one/assets/js/gallery.js")); ?>"></script>
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


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/admin/order/edit.blade.php ENDPATH**/ ?>