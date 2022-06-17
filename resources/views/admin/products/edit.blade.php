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

<style>
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
               <h1 class="m-0 text-dark">Product</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Product Edit</li>
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
                     <h3 class="card-title">Edit <small>Product</small></h3>
                  </div>
                  @if (count($errors) > 0)       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        @foreach ($errors->all() as $error)
                           <span>{{ $error }}</span><br/>
                        @endforeach    
                     </div>         
                  @endif
                  <form id="quickForm" action="{{route('products.update')}}" method="POST" enctype="multipart/form-data" >
                     {{csrf_field()}}
                     <input type="hidden" name="id" value="{{ $result->id }}">

                     <div class="card-body">

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="brand_id">Brand</label>
                                 <select name="brand_id" class="brand_id select12 form-control" id="brand_id" data-placeholder="Select a brand" style="width: 100%;" required >
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $value)
                                       <option value="{{$value->id}}" <?php if($value->id == $result->brand_id){echo "selected";} ?>>{{$value->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="category_id">Select Category</label>
                                 <select name="category_id" class="category_id select12 form-control" id="category_id" data-placeholder="Select a Category" style="width: 100%;" required >
                                    <option value="">Select Category</option>
                                 </select>
                              </div>   
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" name="title" value="{{ $result->title }}" class="form-control" id="title" placeholder="Title">
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea name="description" id="description" class="form-control" rows="4">{{ $result->description }}</textarea>
                        </div>

                        <div class="form-group">
                           <label for="variants">Variants</label>
                           <input type="checkbox" name="variants" value="1" id="variants" {{ $result->variants == '1' ? 'checked' : '' }}>
                        </div>

                        <?php if ($result->variants == '1') { ?>
                           <div id="variants_data">
                              @foreach ($sizes as $key => $size)
                                 <div class="row" id="removeDataDiv">

                                    <div class="col-sm-3">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                             <input type="text" name="sizes[]" value="{{$size}}" id="sizes" placeholder="Size"  class="form-control" autocomplete="off" required>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-sm-3">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                             <input type="text" name="colors[]" value="{{$colors[$key]}}" id="colors" placeholder="Color"  class="form-control" autocomplete="off" required>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-sm-3">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                             <input type="number" name="prices[]" value="{{$prices[$key]}}" id="prices" placeholder="Price" step="any" class="form-control" min="1" autocomplete="off" required>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-sm-2">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                             <button type="button" class="btn btn-danger removeRow"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                    </div>

                                 </div>
                              @endforeach
                           </div>
                        <?php } ?>

                        <div id="addDiv">
                           <div class="row">

                              <div class="col-sm-2">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <button type="button" class="btn btn-primary addCF"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                 </div>
                              </div>

                           </div>
                       </div>

                        <div class="col-md-12" id="price_div">
                           <div class="form-group">
                              <label for="price">Price</label>
                              <input type="number" name="price" value="{{ $result->price }}" class="form-control" id="price" placeholder="Price" step="any" autocomplete="off">
                           </div>
                        </div>

                        <div class="col-md-12" id="price_div">
                           <div class="form-group">
                              <label for="weight">VAT</label>
                              <input type="number" name="vat" value="{{ $result->vat }}" class="form-control" id="vat" placeholder="vat"  autocomplete="off">
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="image">Product Image</label>
                                 <input type="file" name="image[]" class="form-control" id="image" accept="image/*" multiple>
                              </div>
                              @if (count($images)>0)
                                <br>
                                @foreach($images as $productImage)
                                 <div class="custom_close">
                                    <img src="{{ asset('/public/admin/clip-one/assets/products/thumbnail')}}/{{ $productImage->image }}" alt="" class="product-edit-img"> 
                                      <button type="button" class="btn btn-danger product-edit-btn" id="delete_img" data-id="{{$productImage->id}}"><i class="far fa-trash-alt"></i></button>
                                 </div>
                                @endforeach
                              @endif
                           </div>

                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="{{route('products.index')}}" class="btn btn-default btn-secondary">Back</a>
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
         name: {
            required: true
         },
         description: {
            required: true
         },
      },
      messages: {
         name: {
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

$('.select12').select2({
   theme: 'bootstrap4',
   minimumResultsForSearch: Infinity
});
<script>

$('.select12').select2({
   theme: 'bootstrap4',
   minimumResultsForSearch: Infinity
});

$(function () {
   $('#quickForm').validate({
      rules: {
         title: {
            required: true
         },
         price: {
            required: true
         }
      },
      messages: {
         title: {
            required: "Please enter title",
         },
         price: {
            required: "Please enter price",
         }
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
   var brand_id = $('#brand_id').val();

   $.ajax({
      url: "{{ url('admin/getCategory') }}",
      method: "post",
      data: {_token: '{{ csrf_token() }}', brand_id: brand_id},
      success: function (response) {
         if(response.status == 'success'){
            $('#category_id').html(response.data)
         }
      }
   });

   $('#brand_id').on('change',function(){
      var brand_id = $(this).val();

      $.ajax({
         url: "{{ url('admin/getCategory') }}",
         method: "post",
         data: {_token: '{{ csrf_token() }}', brand_id: brand_id},
         success: function (response) {
            if(response.status == 'success'){
               $('#category_id').html(response.data)
            }
         }
     });
   });
</script>

<script type="text/javascript">
   if ($('input[name="variants"]:checked').length > 0) {
      $('#addDiv').show();
      $('#price_div').hide();
      $('#variants_data').show();
   }else{
      $('#addDiv').hide();
      $('#price_div').show();
      $('#variants_data').hide();
   }
   $('#variants').on('click',function(){
      if ($('input[name="variants"]:checked').length > 0) {
         $('#addDiv').show();
         $('#price_div').hide();
         $('#variants_data').show();
      }else{
         $('#addDiv').hide();
         $('#price_div').show();
         $('#variants_data').hide();
      }
   });

   $(".addCF").click(function(){
      $("#addDiv").append('<div class="row" id="removeDiv"><div class="col-sm-3"><div class="form-group" ><div class="col-sm-12"><input type="text" name="sizes[]" id="sizes" placeholder="Size"  class="form-control" autocomplete="off" required></div></div></div><div class="col-sm-3"><div class="form-group" ><div class="col-sm-12"><input type="text" name="colors[]" id="colors" placeholder="Color"  class="form-control" autocomplete="off" required></div></div></div><div class="col-sm-3"><div class="form-group" ><div class="col-sm-12"><input type="number" name="prices[]" id="prices" placeholder="Price" step="any" class="form-control" min="1" autocomplete="off" required></div></div></div><div class="col-sm-2"><div class="form-group" ><div class="col-sm-12"><button type="button" class="btn btn-danger removeCF" id="removeCF"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div></div></div>');
   });

   $("#addDiv").on('click','.removeCF',function(){
      $(this).closest('div #removeDiv').remove();
   });

   $(".removeRow").on('click',function(){
      $(this).closest('div #removeDataDiv').remove();
   });
</script>

<script>
   $(document).ready(function(){
     $('.product-edit-btn').on('click',function(){
         var id = $(this).data('id');
         
         $.ajax({
             url: "{{ url('admin/products/image/delete') }}/"+id,
             method: "get",
             success: function (response) {
                if(response.msg == 'success'){
                    toastr.success('Image deleted successfully.', 'Success');
                     setTimeout(function(){ 
                        location.reload();
                     }, 2000);
                }
             }
         });
     });
   });
</script>

@endsection
  


