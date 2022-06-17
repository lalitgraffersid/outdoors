@extends('admin.layout.master')
@section('content')
 
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
</style>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Setting</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Setting Edit</li>
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
                     <h3 class="card-title">Edit <small>Setting</small></h3>
                  </div>
                  @if (count($errors) > 0)       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        @foreach ($errors->all() as $error)
                           <span>{{ $error }}</span><br/>
                        @endforeach    
                     </div>         
                  @endif
                  <form id="quickForm" action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data" >
                     {{csrf_field()}}
                     <input type="hidden" name="id" value="{{ $result->id }}">

                     <div class="card-body">

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="facebook_link">Facebook Link</label>
                                 <input type="text" name="facebook_link" value="{{ $result->facebook_link }}" class="form-control" id="facebook_link" >
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="instagram_link">Instagram Link</label>
                                 <input type="text" name="instagram_link" value="{{ $result->instagram_link }}" class="form-control" id="instagram_link" >
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="twitter_link">Twitter Link</label>
                                 <input type="text" name="twitter_link" value="{{ $result->twitter_link }}" class="form-control" id="twitter_link" >
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="linkedin_link">Linkedin Link</label>
                                 <input type="text" name="linkedin_link" value="{{ $result->linkedin_link }}" class="form-control" id="linkedin_link" >
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="name_1">Name</label>
                                 <input type="text" name="name_1" value="{{ $result->name_1 }}" class="form-control" id="name_1" >
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="phone_1">Phone</label>
                                 <input type="text" name="phone_1" value="{{ $result->phone_1 }}" class="form-control" id="phone_1" >
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="name_2">Name</label>
                                 <input type="text" name="name_2" value="{{ $result->name_2 }}" class="form-control" id="name_2" >
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="phone_2">Phone</label>
                                 <input type="text" name="phone_2" value="{{ $result->phone_2 }}" class="form-control" id="phone_2" >
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="text" name="email" value="{{ $result->email }}" class="form-control" id="email" >
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="address">Address</label>
                              <input type="text" name="address" value="{{ $result->address }}" class="form-control" id="address" >
                           </div>
                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="{{route('setting.index')}}" class="btn btn-default btn-secondary">Back</a>
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
@endsection

@section('script')
<script src="{{asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
$(function () {
   $('#quickForm').validate({
      rules: {
         facebook_link: {
            required: true
         },
         instagram_link: {
            required: true
         },
         twitter_link: {
            required: true
         },
         linkedin_link: {
            required: true
         },
         email: {
            required: true
         },
         phone: {
            required: true
         },
         address: {
            required: true
         },
      },
      messages: {
         facebook_link: {
            required: "",
         },
         instagram_link: {
            required: "",
         },
         twitter_link: {
            required: "",
         },
         linkedin_link: {
            required: "",
         },
         email: {
            required: "",
         },
         phone: {
            required: "",
         },
         address: {
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

@endsection
  


