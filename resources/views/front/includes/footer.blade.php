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
                                        <img src="{{asset('assets/front/images/logo.png')}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <p class="ftr-logo-text">Outdoor structures was established in 2015 by directors Michael Dermody and Pedro.</p>
                                <ul class="ftr-socials text-center">
                                    <li class="fb"><a href="{{$settings->facebook_link}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li class="linkedin"><a href="{{$settings->linkedin_link}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="twitter"><a href="{{$settings->twitter_link}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                            <div class="ftr-box">
                                <h6>Useful Links</h6>
                                <ul class="ftr-links">
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('about_us')}}">About Us</a></li>
                                    <li><a href="{{route('privacy_policy')}}">Privacy Policy</a></li>
                                    <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                            <div class="ftr-box">
                                <h6>Services</h6>
                                <ul class="ftr-links">
                                    @foreach($services as $value)
                                        <li><a href="{{route('services',$value->id)}}">{{$value->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="ftr-box">
                                <h6>Projects</h6>
                                <ul class="ftr-links">
                                    @foreach($categories as $value)
                                        <li><a href="{{route('projects',$value->id)}}">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                   
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="ftr-box">
                                <h6>Contact Us</h6>
                                <ul class="ftr-links">
                                    <li><strong class="ftr-con">Address:</strong><br>
                                        <span class="ftr-links">{{$settings->address}}</span>
                                    </li>
                                    <li><strong class="ftr-con">Email:</strong><br>
                                        <span class="ftr-links"><a href="mailto:{{$settings->email}}">{{$settings->email}}</a></span>
                                    </li>
                                    <li><strong class="ftr-con">Call:</strong><br>
                                        <span class="ftr-links">{{$settings->name_1}}: {{$settings->phone_1}}<br>
                                        {{$settings->name_2}}: {{$settings->phone_2}}</span>
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



<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/script.js')}}"></script>
<script src="{{asset('assets/front/js/testi.js')}}"></script>
<script src="{{asset('assets/admin/plugins/toastr/toastr.min.js')}}"></script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src="{{asset('assets/front/js/services.js')}}"></script>



<script type="text/javascript">
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
                
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
   @endif
</script> 

</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js'></script>
<script src="{{asset('assets/front/js/gallery.js')}}"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js'></script>
<!-- Cookie Open -->
  <script src="{{asset('assets/front/js/cookieconsent.min.js')}}"></script>

  <script type="text/javascript" >
         window.addEventListener("load", function(){
             window.cookieconsent.initialise({
               "palette": {
                 "popup": {
                   "background": "#000"
                 },
                 "button": {
                   "background": "#008ee2"
                 }
               },
               "theme": "classic",
               "position": "bottom-right",
               "type": "opt-out",
               "content": {
                 "message": "This website uses cookies to ensure you get the best experience on our website. For details, read our <a href='/privacy-policy.pdf' style='color:#008ee2;' class='policy'>Privacy Policy</a>",
                 "allow": "I Accept",
                 "link": "",
                 "href": ""
                }
             })
         });
      </script>
      <!-- Cookie Close -->  
<script>
    $('.removeCart').on('click',function(){
        var id = $(this).data('id');

        $.ajax({
            url: "{{ url('removeCart') }}/"+id,
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
</html>