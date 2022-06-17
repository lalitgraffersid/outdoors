<?php 
$services = DB::table('services')->where('status','1')->get();
$categories = DB::table('categories')->where('status','1')->get();
$current_route = \Request::route()->getName();


?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="LmfS5onPI7AqbLmLC_k8sGz9qlWjL1HIxSLjpaffhNQ" />
  <title>Outdoor Structures</title>

<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/gallery.css')); ?>">
<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/navstyle.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/testi.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/toastr/toastr.min.css')); ?>">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>


</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="top-bar full-width">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('assets/front/images/logo.png')); ?>" class="img-fluid logo-img"></a>
                            </div>

                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <nav class="navbar navbar-expand-md navbar-light">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto py-4 py-md-0 top-call">
                                            <li class="nav-item pl-4 pl-md-0 ml-0 <?php echo e($current_route == 'home' ? 'active' : ''); ?>">
                                                <a class="nav-link" href="<?php echo e(route('home')); ?>">HOME</a>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 <?php echo e($current_route == 'about_us' ? 'active' : ''); ?>">
                                                <a class="nav-link" href="<?php echo e(route('about_us')); ?>">ABOUT US</a>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 <?php echo e($current_route == 'services' ? 'active' : ''); ?>">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">SERVICES<span class="has-sub"></span></a>
                                                <div class="dropdown-menu">
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('services',$value->id)); ?>"><?php echo e($value->title); ?></a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 <?php if($current_route == 'projects' || $current_route == 'projectDetails'){echo "active";} ?>">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">PROJECTS<span class="has-sub"></span></a>
                                                <div class="dropdown-menu">
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('projects',$value->id)); ?>"><?php echo e($value->name); ?></a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </li>
                                            <li class="contact-li">
                                                <a class="contact-btn" href="<?php echo e(route('contact_us')); ?>">CONTACT US</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><?php /**PATH /home/aobhfo788oyt/public_html/resources/views/front/includes/head.blade.php ENDPATH**/ ?>