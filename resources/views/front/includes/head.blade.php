<?php 
$services = DB::table('services')->where('status','1')->get();
$categories = DB::table('categories')->where('status','1')->get();
$current_route = \Request::route()->getName();
$carts = DB::table('carts')->where('session_id',$session_id)->get();
$cartSubtotal = DB::table('carts')->where('session_id',$session_id)->sum('sub_total');
$pcategories=DB::table('pcategories')->where('status',1)->get();

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="LmfS5onPI7AqbLmLC_k8sGz9qlWjL1HIxSLjpaffhNQ" />
  <title>Outdoor Structures</title>

<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/gallery.css')}}">
<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('assets/front/css/navstyle.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/testi.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/cookieconsent.min.css')}}">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
<style>
   	.linkselct {
    color: #000 !important;
    font-weight: 800;
    transition: all 200ms linear;
}
.selected_btn {
    background: #eeeeee !important;
    height: fit-content;
    border-radius: 10px;
}
 </style>

</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="top-bar full-width">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <a href="{{route('home')}}"><img src="{{asset('assets/front/images/logo.png')}}" class="img-fluid logo-img"></a>
                            </div>

                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                <nav class="navbar navbar-expand-md navbar-light">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                
                                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto py-4 py-md-0 top-call " >
											     <!-- new div --> <div class="contact-btn1">     
                                            <li class="nav-item pl-4 pl-md-0 ml-0 {{$current_route == 'home' ? 'selected_btn' : ''}}">
                                                <a class="{{$current_route == 'home' ? 'linkselct' : 'nav-link'}}" href="{{route('home')}}">HOME</a>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 {{$current_route == 'about_us' ? 'selected_btn' : ''}}">
                                                <a class="{{$current_route == 'about_us' ? 'linkselct' : 'nav-link'}}" href="{{route('about_us')}}">ABOUT US</a>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 {{$current_route == 'services' ? 'selected_btn' : ''}}">
                                                <a class="{{$current_route == 'services' ? 'linkselct' : 'nav-link'}} dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">SERVICES<span class="has-sub"></span></a>
                                                <div class="dropdown-menu">
                                                    @foreach($services as $value)
                                                        <a class="dropdown-item" href="{{route('services',$value->id)}}">{{$value->title}}</a>
                                                    @endforeach
                                                </div>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 <?php if($current_route == 'projects' || $current_route == 'projectDetails'){echo "selected_btn";} ?>">
                                                <a class="<?php if($current_route == 'projects' || $current_route == 'projectDetails'){echo "linkselct";}else{echo 'nav-link';} ?> dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">PROJECTS<span class="has-sub"></span></a>
                                                <div class="dropdown-menu">
                                                    @foreach($categories as $value)
                                                        <a class="dropdown-item" href="{{route('projects',$value->id)}}">{{$value->name}}</a>
                                                    @endforeach
                                                </div>
                                            </li>
 <li class="nav-item pl-4 pl-md-0 ml-0 <?php if($current_route == 'products'){echo "selected_btn";} ?>">
    <a class="<?php if($current_route == 'products'){echo "linkselct";}else{echo 'nav-link';} ?> dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">SHOP<span class="has-sub"></span></a>
    <div class="dropdown-menu">
        @foreach($pcategories as $value)
            <a class="dropdown-item" href="{{route('products',$value->id)}}">{{$value->title}}</a>
        @endforeach
    </div>
</li>
											</div>	
    <div style="margin-top: 4px;">											
      <li class="contact-li">
                                                <a class="contact-btn" href="{{route('contact_us')}}">CONTACT US</a>
                                            </li>
                                            <li class="cart">
                                            @include('front/includes/cart')                                          

</li>
		</div>
                                        </ul>

                                    </div>
                                </nav>           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>