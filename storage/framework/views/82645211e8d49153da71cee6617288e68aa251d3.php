
<?php $__env->startSection('content'); ?>
 
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
               <h1 class="m-0 text-dark">Product</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                  <li class="breadcrumb-item active">Product Add</li>
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
                     <h3 class="card-title">Add <small>Product</small></h3>
                  </div>
                  <?php if(count($errors) > 0): ?>       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <span><?php echo e($error); ?></span><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                     </div>         
                  <?php endif; ?>
                  <form id="quickForm" action="<?php echo e(route('products.save')); ?>" method="POST" enctype="multipart/form-data" >
                    <?php echo e(csrf_field()); ?>

                     <div class="card-body">

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="brand_id">Brand</label>
                                 <select name="brand_id" class="select12 form-control"  data-placeholder="Select a brand" style="width: 100%;" required >
                                    <option value="">Select Brand</option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="category_id">Select Category</label>
                                 <select name="category_id" class="category_id select12 form-control" id="category_id" data-placeholder="Select a Category" style="width: 100%;" required >
                                   <option value="">Select Category</option>
                                   <?php $__currentLoopData = $pcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?></option> 
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                 </select>
                              </div>   
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="title">Title</label>
                           <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control" id="title" placeholder="Title">
                        </div>

                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea name="description" id="description" class="form-control" rows="4"><?php echo e(old('description')); ?></textarea>
                        </div>

                        <div class="form-group">
                           <label for="variants">Add Variants</label>
                           <input type="checkbox" name="variants" value="1" id="variants">
                        </div>

                        <div id="addDiv">
                           <div class="row">

                              <div class="col-sm-3">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <input type="text" name="sizes[]" id="sizes" placeholder="Size"  class="form-control" autocomplete="off" required>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-sm-3">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <input type="text" name="colors[]" id="colors" placeholder="Color"  class="form-control" autocomplete="off" required>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-sm-3">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <input type="number" name="prices[]" id="prices" placeholder="Price" step="any" class="form-control" min="1" autocomplete="off" required>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-sm-2">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <button type="button" class="btn btn-primary addCF"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                 </div>
                              </div>

                           </div>
                       </div>

                        <div class="form-group" id="price_div">
                           <label for="price">Price (<span class="text-primary">€</span>)</label>
                           <input type="number" name="price" value="<?php echo e(old('price')); ?>" class="form-control" id="price" placeholder="Price" step="any" autocomplete="off">
                        </div>
                        
                        <div class="form-group">
                           <label for="">VAT(%)</label>
                           <input type="number" name="vat" value="<?php echo e(old('vat')); ?>" class="form-control" id="vat" placeholder="vat"  autocomplete="off">
                        </div>

                        <div class="form-group">
                           <label for="image">Product Image</label>
                           <input type="file" name="image[]" class="form-control" id="image" accept="image/*" multiple>
                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="<?php echo e(route('products.index')); ?>" class="btn btn-default btn-secondary">Back</a>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>
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

// $('#description').summernote({
//    height: 300,
//   toolbar: [
//     ['font', ['bold', 'italic', 'underline', 'clear']],
//     ['fontname', ['fontname']],
//     ['color', ['color']],
//     ['para', ['ul', 'ol', 'paragraph']],
//     ['height', ['height']],
//     ['table', ['table']],
//     ['insert', ['link', 'picture', 'hr']],
//     ['view', ['fullscreen', 'codeview']],
//     ['help', ['help']]
//   ],
// });

$(function () {
   $('#quickForm').validate({
      rules: {
         title: {
            required: true
         },
         price: {
            required: false
         },
         image: {
            required: true
         },
      },
      messages: {
         title: {
            required: "Please enter title",
         },
         price: {
            required: "Please enter price",
         },
         image: {
            required: "Please upload an image",
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
   $('#brand_id').on('change',function(){
      var brand_id = $(this).val();

      $.ajax({
         url: "<?php echo e(url('admin/getCategory')); ?>",
         method: "post",
         data: {_token: '<?php echo e(csrf_token()); ?>', brand_id: brand_id},
         success: function (response) {
            if(response.status == 'success'){
               $('#category_id').html(response.data)
            }
         }
     });
   });
</script>

<script type="text/javascript">
   $('#addDiv').hide();
   $('#variants').on('click',function(){
      if ($('input[name="variants"]:checked').length > 0) {
         $('#addDiv').show();
         $('#price_div').hide();
      }else{
         $('#addDiv').hide();
         $('#price_div').show();
      }
   });

   $(".addCF").click(function(){
      $("#addDiv").append('<div class="row" id="removeDiv"><div class="col-sm-3"><div class="form-group" ><div class="col-sm-12"><input type="text" name="sizes[]" id="sizes" placeholder="Size"  class="form-control" autocomplete="off" required></div></div></div><div class="col-sm-3"><div class="form-group" ><div class="col-sm-12"><input type="text" name="colors[]" id="colors" placeholder="Color"  class="form-control" autocomplete="off" required></div></div></div><div class="col-sm-3"><div class="form-group" ><div class="col-sm-12"><input type="number" name="prices[]" id="prices" placeholder="Price" step="any" class="form-control" min="1" autocomplete="off" required></div></div></div><div class="col-sm-2"><div class="form-group" ><div class="col-sm-12"><button type="button" class="btn btn-danger removeCF" id="removeCF"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div></div></div>');
   });

   $("#addDiv").on('click','.removeCF',function(){
      $(this).closest('div #removeDiv').remove();
   });
</script>


<?php $__env->stopSection(); ?>
  



<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/outdoorstructuresireland.com/httpdocs/resources/views/admin/products/add.blade.php ENDPATH**/ ?>