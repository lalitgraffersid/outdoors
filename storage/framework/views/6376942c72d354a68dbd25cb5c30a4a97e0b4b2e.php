
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
               <h1 class="m-0 text-dark">Service</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                  <li class="breadcrumb-item active">Service Edit</li>
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
                     <h3 class="card-title">Edit <small>Service</small></h3>
                  </div>
                  <?php if(count($errors) > 0): ?>       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <span><?php echo e($error); ?></span><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                     </div>         
                  <?php endif; ?>
                  <form id="quickForm" action="<?php echo e(route('services.update')); ?>" method="POST" enctype="multipart/form-data" >
                     <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="id" value="<?php echo e($result->id); ?>">
                     <div class="card-body">

                        <div class="form-group">
                           <label for="title">Title</label>
                           <input type="text" name="title" value="<?php echo e($result->title); ?>" class="form-control" id="title" placeholder="Title">
                        </div>

                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea name="description" id="description"><?php echo e($result->description); ?></textarea>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="featured_image">Featured Image</label>
                                 <input type="file" name="featured_image" class="form-control" id="featured_image" accept="image/*" >
                              </div>
                              <?php if(!empty($result->featured_image)): ?>
                                 <br>
                                 <div class="custom_close">
                                    <img src="<?php echo e(asset('/public/admin/clip-one/assets/services/featured_image/thumbnail')); ?>/<?php echo e($result->featured_image); ?>" alt="" class="product-edit-img">
                                 </div>
                              <?php endif; ?>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="additional_images">Additional Images</label>
                                 <input type="file" name="additional_images[]" class="form-control" id="additional_images" accept="image/*" multiple>
                              </div>
                              <?php if(count($additionalImages)>0): ?>
                                 <br>
                                 <?php $__currentLoopData = $additionalImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom_close">
                                       <img src="<?php echo e(asset('/public/admin/clip-one/assets/services/additional_images/thumbnail')); ?>/<?php echo e($value->image); ?>" alt="" class="product-edit-img"> 
                                       <button type="button" class="btn btn-danger product-edit-btn" id="delete_img" data-id="<?php echo e($value->id); ?>" ><i class="far fa-trash-alt"></i></button>
                                    </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                           </div>
                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="<?php echo e(route('services.index')); ?>" class="btn btn-default btn-secondary">Back</a>
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
$('#description').summernote({
   height: 150,
   toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'hr']],
      ['view', ['fullscreen', 'codeview']],
      ['help', ['help']]
   ],
});

$(function () {
   $('#quickForm').validate({
      rules: {
         title: {
            required: true
         },
         description: {
            required: true
         },
      },
      messages: {
         title: {
            required: "",
         },
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aobhfo788oyt/public_html/resources/views/admin/services/edit.blade.php ENDPATH**/ ?>