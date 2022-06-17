@extends('front.layout.master')
@section('content')

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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3 centered"><h2><u>Product Enquires</u></h2></div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
</div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
            @if(Session::has('msg'))
                  <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('msg')}}</p>
               @endif
               <div class="contact-form">
                  <form id="quickForm" action="{{route('calculator.save')}}" method="POST">
                     {{csrf_field()}}
                     <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required="">
                     <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required="">
                     <input type="number" name="contact_no" value="{{ old('contact_no') }}" class="form-control" placeholder="Contact" required="">
                     <input type="text" name="product" value="{{$data['product']}}" class="form-control" placeholder="Product Name" required="">
                     <input type="text" name="length" value="{{$data['length']}}" class="form-control" placeholder="Length" required="">
                     <input type="text" name="width" value="{{$data['width']}}" class="form-control" placeholder="Width" required="">
                     <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Subject" required="">
                     <textarea rows="6" name="message" value="{{ old('message') }}" class="form-control" placeholder="Message"></textarea>
                     <span class="captcha_span">{!! captcha_img('flat') !!}</span>
                     <button type="button" class="btn btn-info btn-refresh"><i class="fa fa-repeat"></i></button>

                     <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" autocomplete="off">

                     @if ($errors->has('captcha'))
                        <span class="help-block" style="color: red;">
                           <strong>Entered captcha value is wrong! Try Again.</strong>
                        </span><br>
                     @endif

                     <input type="submit" id="valid" name="submit" value="Submit" class="submit-btn">
                  </form>
               </div> 
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
</div>
         </div>
      </div>
   </div>
</section>

@endsection

@section('script')

<script src="{{asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>

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
         url:'{{url("refresh_captcha")}}',
         success:function(data){
            $(".captcha_span").html(data.captcha);
         },
           error: function(data) {
             alert('Try Again.');
           }
      });
   });
</script>
@endsection