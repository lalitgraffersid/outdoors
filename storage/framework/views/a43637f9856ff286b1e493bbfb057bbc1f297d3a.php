<?php 
    $settings = DB::table('settings')->first();

    $categories = DB::table('categories')->where('status','1')->get();
    $settings = DB::table('settings')->first();
    $services = DB::table('services')->where('status','1')->get();
?>


<footer>
    <div class="footer-panel">
        <div class="container-fluid">
            <div class="row">
                <div class="container-xxl container-xl container-md container-sm">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="ftr-box">
                                <div class="ftr-logo">
                                    <a href="index.html">
                                        <img src="<?php echo e(asset('assets/front/images/logo.png')); ?>" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <p class="ftr-logo-text">Outdoor structures was established in 2015 by directors Michael Dermody and Patrick O'Malley.</p>
                                <ul class="ftr-socials text-center">
                                    <li class="fb"><a href="<?php echo e($settings->facebook_link); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li class="linkedin"><a href="<?php echo e($settings->linkedin_link); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="twitter"><a href="<?php echo e($settings->twitter_link); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                            <div class="ftr-box">
                                <h6>Useful Links</h6>
                                <ul class="ftr-links">
                                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                    <li><a href="<?php echo e(route('about_us')); ?>">About Us</a></li>
                                    <li><a href="<?php echo e(route('privacy_policy')); ?>">Privacy Policy</a></li>
                                    <li><a href="<?php echo e(route('contact_us')); ?>">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                            <div class="ftr-box">
                                <h6>Services</h6>
                                <ul class="ftr-links">
                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('services',$value->id)); ?>"><?php echo e($value->title); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="ftr-box">
                                <h6>Projects</h6>
                                <ul class="ftr-links">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('projects',$value->id)); ?>"><?php echo e($value->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                   
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="ftr-box">
                                <h6>Contact Us</h6>
                                <ul class="ftr-links">
                                    <li><strong class="ftr-con">Address:</strong><br>
                                        <span class="ftr-links"><?php echo e($settings->address); ?></span>
                                    </li>
                                    <li><strong class="ftr-con">Email:</strong><br>
                                        <span class="ftr-links"><a href="mailto:<?php echo e($settings->email); ?>"><?php echo e($settings->email); ?></a></span>
                                    </li>
                                    <li><strong class="ftr-con">Call:</strong><br>
                                        <span class="ftr-links"><?php echo e($settings->name_1); ?>: <?php echo e($settings->phone_1); ?><br>
                                        <?php echo e($settings->name_2); ?>: <?php echo e($settings->phone_2); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-panel">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4>Copyright  <?php echo date('Y'); ?> | Template Designed by <a href="https://dmcconsultancy.com/" target="_blank" class="link">DMC Consultancy</a></h4>
            </div>
        </div>
    </div>
</footer>



<script src="<?php echo e(asset('assets/front/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/testi.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/toastr/toastr.min.js')); ?>"></script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src="<?php echo e(asset('assets/front/js/services.js')); ?>"></script>



<script type="text/javascript">
    <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
        switch(type){
            case 'info':
                toastr.info("<?php echo e(Session::get('message')); ?>");
                break;

            case 'warning':
                toastr.warning("<?php echo e(Session::get('message')); ?>");
                break;

            case 'success':
                toastr.success("<?php echo e(Session::get('message')); ?>");
                break;
                
            case 'error':
                toastr.error("<?php echo e(Session::get('message')); ?>");
                break;
        }
   <?php endif; ?>
</script> 

</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js'></script>
<script src="<?php echo e(asset('assets/front/js/gallery.js')); ?>"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js'></script>
<script>
    $('.removeCart').on('click',function(){
        var id = $(this).data('id');

        $.ajax({
            url: "<?php echo e(url('removeCart')); ?>/"+id,
            method: "GET",
            success: function (response) {
                if(response.status == 'success'){
                    toastr.success('Product removed from cart');
                    setTimeout(function(){
                        location.reload(); 
                    }, 1000);
                }
            }
        });
    });
</script>


<script>
   $(document).ready (function(){
      $("#CartClick").click(function(){
         $(".add-item-panel").slideToggle();
      });
   });
</script>
</html><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>