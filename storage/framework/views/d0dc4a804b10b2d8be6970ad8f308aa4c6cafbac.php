
<?php $__env->startSection('content'); ?>

<?php 
   $current_route = \Request::route()->getName();
   $routeArr = explode('.', $current_route);
   $section = $routeArr[0];
   $action = $routeArr[1];

   $data = App\Helpers\AdminHelper::checkAddButtonPermission($section,Auth::user()->id);
?>
 
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Mailing Lists</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Mailing Lists List</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
        <div class="row">
           
           <div class="col-lg-12">
              <div class="card">
                  <div class="card-header float-right">
                     <a href="<?php echo e(route('mailing_list.add')); ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i> <?php echo e($data['actionData']->action_title); ?> </a>
                     <a href="#" class="btn btn-secondary float-right mr-2" data-toggle="modal" data-target="#modal-default"><i class="fas fa-envelope"></i> Send Mail </a>
                  </div>

                  <!-- Add more modal -->
                  <div class="modal fade" id="modal-default">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Send Bulk Mail</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                              </button>
                           </div>

                           <form id="quickForm" action="<?php echo e(route('mailing_list.send_mail')); ?>" method="POST" enctype="multipart/form-data" >
                              <?php echo e(csrf_field()); ?>

                              <div class="modal-body">
                                 <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                                 </div>
                                 <div class="form-group">
                                    <label for="content">Mail Body</label>
                                    <textarea name="content" class="form-control" rows="5" ></textarea>
                                 </div>
                              </div>
                              <div class="modal-footer ">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                 <button type="submit" class="btn btn-primary">Send</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- Add more modal -->

                  <div class="card-body">
                     <?php echo $dataTable->table(['class'=>'table dataTable no-footer']); ?>

                  </div>
               </div>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php echo $dataTable->scripts(); ?>


<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>

<script>
$(function () {
   $('#quickForm').validate({
      rules: {
         subject: {
            required: true
         },
         content: {
            required: true
         },
      },
      messages: {
         subject: {
            required: "",
         },
         content: {
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

<?php $__env->stopSection(); ?>
  



<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/outdoorstructuresireland.com/httpdocs/resources/views/admin/mailing_list/index.blade.php ENDPATH**/ ?>