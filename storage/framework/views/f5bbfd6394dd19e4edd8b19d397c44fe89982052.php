
<?php $__env->startSection('content'); ?>
 
<style type="text/css">
   .select12:invalid + .select2 .select2-selection{
      border-color: #dc3545!important;
   }
   .select12:valid + .select2 .select2-selection{
      border-color: #28a745!important;
   }
   *:focus{
      outline:0px;
   }
   .custom_close{
      position: relative;
      display: inline-block;
   }
   .custom_close button{
      position: absolute;
      right: 0;
      width: 25px;
      height: 25px;
      line-height: 0;
      text-align: center;
      padding: 0;
      font-size: 10px !important;
   }
</style>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Banner</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                  <li class="breadcrumb-item active">Banner Edit</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Edit <small>Banner</small></h3>
                  </div>
                  <?php if(count($errors) > 0): ?>       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <span><?php echo e($error); ?></span><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                     </div>         
                  <?php endif; ?>
                  <form id="quickForm" action="<?php echo e(route('banners.update')); ?>" method="POST" enctype="multipart/form-data" >
                     <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="id" value="<?php echo e($result->id); ?>">
                     <div class="card-body">

                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea name="description" id="description" class="form-control" rows="3"><?php echo e($result->description); ?></textarea>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="file">File</label>
                                 <input type="file" name="file" class="form-control" id="file">
                              </div>
                              <?php if(!empty($result->file)): ?>
                                 <br>
                                 <div class="custom_close">
                                    <?php if($result->file_type == 'Image'): ?>
                                       <img src="<?php echo e(asset('/public/admin/clip-one/assets/banners/thumbnail')); ?>/<?php echo e($result->file); ?>" alt="" class="product-edit-img">
                                    <?php else: ?>
                                       <video src="<?php echo e(asset('/public/admin/clip-one/assets/banners/videos')); ?>/<?php echo e($result->file); ?>" height="100px" autoplay="autoplay"></video>
                                    <?php endif; ?>
                                 </div>
                              <?php endif; ?>
                           </div>
                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="<?php echo e(route('banners.index')); ?>" class="btn btn-default btn-secondary">Back</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-6"></div>
         </div>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>

<script>
$(function () {
   $('#quickForm').validate({
      rules: {
         description: {
            required: true
         },
      },
      messages: {
         description: {
            required: "",
         },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
         error.addClass('invalid-feedback');
         element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
         $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
         $(element).removeClass('is-invalid');
      }
   });
});
</script>

<script>
   $(document).ready(function(){
     $('.product-edit-btn').on('click',function(){
         var id = $(this).data('id');
         
         $.ajax({
             url: "<?php echo e(url('admin/services/image/delete')); ?>/"+id,
             method: "get",
             success: function (response) {
                if(response.msg == 'success'){
                    alert('Image deleted successfully!');
                    location.reload();
                }
             }
         });
     });
   });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aobhfo788oyt/public_html/resources/views/admin/banners/edit.blade.php ENDPATH**/ ?>