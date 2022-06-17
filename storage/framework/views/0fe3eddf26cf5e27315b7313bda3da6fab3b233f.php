
<?php $__env->startSection('content'); ?>

<style>
   .captcha_span img{
      width: auto !important;
   }
</style>

<section class="position-relative contact-header">
</section>

<section class="about-content">
   <div class="container">
      <div class="about-content">   
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3 centered"><h2><u>Contact Us</u></h2></div>
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 ">
               <div>
                  <h4>Address:</h4>
                  <p class="offset-1"><i class="fa fa-building"></i> <?php echo e($settings->address); ?></p>
               </div>
               <div class="mt-3">
                  <h4>Call:</h4>
                  <p class="offset-1"><i class="fa fa-phone"></i> <?php echo e($settings->name_1); ?>: <a href="callto:<?php echo e($settings->phone_1); ?>"><?php echo e($settings->phone_1); ?></a></p>
                  <p class="offset-1"><i class="fa fa-phone"></i> <?php echo e($settings->name_2); ?>: <a href="callto:<?php echo e($settings->phone_2); ?>"><?php echo e($settings->phone_2); ?></a></p>
               </div>
               <div class="mt-3"></div>
               <h4>Email:</h4>
               <p class="offset-1"><i class="fa fa-globe"></i> <a href="mailto:sales@outdoorkitchen.ie">sales@outdoorkitchen.ie</a></p>
               <hr>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19164.573336390862!2d-6.196933442655707!3d53.09992723286127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4867a4f622e3e7c9%3A0xf183d4f8946cd03e!2sDrumbawn%2C%20Kilmurray%2C%20Co.%20Wicklow%2C%20Ireland!5e0!3m2!1sen!2sin!4v1627901741234!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
                
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
               <div class="contact-form">
                  <form id="quickForm" action="<?php echo e(route('contact.save')); ?>" method="POST">
                     <?php echo e(csrf_field()); ?>

                     <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" placeholder="Name" required="">
                     <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Email" required="">
                     <input type="number" name="contact_no" value="<?php echo e(old('contact_no')); ?>" class="form-control" placeholder="Contact" required="">
                     <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="form-control" placeholder="Subject" required="">
                     <textarea rows="6" name="message" value="<?php echo e(old('message')); ?>" class="form-control" placeholder="Message"></textarea>
                     <span class="captcha_span"><?php echo captcha_img('flat'); ?></span>
                     <button type="button" class="btn btn-info btn-refresh"><i class="fa fa-repeat"></i></button>

                     <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" autocomplete="off">

                     <?php if($errors->has('captcha')): ?>
                        <span class="help-block" style="color: red;">
                           <strong>Entered captcha value is wrong! Try Again.</strong>
                        </span><br>
                     <?php endif; ?>

                     <input type="submit" id="valid" name="submit" value="Submit" class="submit-btn">
                  </form>
               </div> 
            </div>
         </div>
      </div>
   </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>

<script>
$(function () {
      $('#quickForm').validate({
         rules: {
            name: {
               required: true
            },
            email: {
               required: true
            },
            subject: {
               required: true
            },
            subject: {
               required: true
            },
            contact_no: {
               required: true
            },
            message: {
               required: true
            },
            captcha: {
               required: true
            },
         },
         messages: {
         name: {
               required: "Please enter Name",
            },
            email: {
               required: "Please enter email",
            },
            subject: {
               required: "Please enter subject",
            },
            contact_no: {
               required: "Please enter contact number",
            },
            message: {
               required: "Please enter message",
            },
            captcha: {
               required: "Please enter captcha",
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

<script type="text/javascript">
   $(".btn-refresh").click(function(){
      $.ajax({
         type:'GET',
         url:'<?php echo e(url("refresh_captcha")); ?>',
         success:function(data){
            $(".captcha_span").html(data.captcha);
         },
           error: function(data) {
             alert('Try Again.');
           }
      });
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/outdoorstructuresireland.com/httpdocs/resources/views/front/contact_us.blade.php ENDPATH**/ ?>