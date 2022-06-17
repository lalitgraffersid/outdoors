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
               <h1 class="m-0 text-dark">Project</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Project Add</li>
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
                     <h3 class="card-title">Add <small>Project</small></h3>
                  </div>
                  @if (count($errors) > 0)       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        @foreach ($errors->all() as $error)
                           <span>{{ $error }}</span><br/>
                        @endforeach    
                     </div>         
                  @endif
                  <form id="quickForm" action="{{route('projects.save')}}" method="POST" enctype="multipart/form-data" >
                     {{csrf_field()}}
                     <div class="card-body">

                        <div class="form-group">
                           <label for="title">Category</label>
                           <select name="category_id" class="form-control">
                              <option value="">Select Category</option>
                              @foreach($categories as $value)
                                 <option value="{{$value->id}}">{{$value->name}}</option>
                              @endforeach
                           </select>
                        </div>

                        <div class="form-group">
                           <label for="title">Title</label>
                           <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Title">
                        </div>

                        <div class="form-group">
                           <label for="short_description">Short Description</label>
                           <textarea name="short_description" id="short_description" class="form-control" rows="3">{{ old('short_description') }}</textarea>
                        </div>

                        <div class="form-group">
                           <label for="long_description">Long Description</label>
                           <textarea name="long_description" id="long_description" >{{ old('long_description') }}</textarea>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="featured_image">Featured Image</label>
                                 <input type="file" name="featured_image" class="form-control" id="featured_image" accept="image/*" >
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="additional_images">Additional Images</label>
                                 <input type="file" name="additional_images[]" class="form-control" id="additional_images" accept="image/*" multiple>
                              </div>
                           </div>
                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="{{route('projects.index')}}" class="btn btn-default btn-secondary">Back</a>
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
$('#long_description').summernote({
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

@endsection
  


