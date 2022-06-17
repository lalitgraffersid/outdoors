
<?php $__env->startSection('content'); ?>

<style>
  #color_span, #size_span, #price_span{
    font-size: initial;
    top: auto;
  }
  #price_span, .price, .price span{
    font-size: 30px;
    top: auto;
  }
  label.cus-price {
    font-weight: 600;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    font-size: 25px;
}
.add-cart {
    background-color: #ff1616;
    display: inline-block;
    padding: 10px 30px;
    color: #fff !important;
    outline: none;
    border-radius: 5px;
    font-size: 17px;
    letter-spacing: 1px;
    margin-top: 20px;
}
</style>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title"><?php echo e($result->title); ?></span>
  	</div>
</section>



  <section class="top-space">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="product-details">
            <div class="product-icon">
              <img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($images[0]->image); ?>" alt="" class="img-fluid">
            </div>

            <div class="owl-carousel owl-theme">
              <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <a href="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($image->image); ?>" data-lightbox="gallery">
                  <img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($image->image); ?>" alt="">
                  </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="details-box">
            <h2><?php echo e($result->title); ?></h2>
             <?php if($result->variants == '1'): ?>
            <div class="flex-box">
              <label><span>Color &amp; Size</span>
                <select name="variant_option" id="variant_option">

                  <option>-- Select Color &amp; Size --</option>
                   <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value); ?>" data-id="<?php echo e($key); ?>" ><?php echo e($value); ?> - <?php echo e($colors[$key]); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </label>
            </div>
            
            <div class="color-variant">
                <div class="color-left">Color:</div>
                <div class="color-right"><span id="color_span"></span></div>
            </div>

            <div class="color-variant">
                <div class="color-left">Size:</div>
                <div class="color-right"><span id="size_span"></span></div>
            </div>

           

            <label class="cus-price">
              Price: <span id="price_span"></span> <span>/ Including VAT:<?php echo e($result->vat); ?> %</span>
            </label>

              <input type="hidden" name="size" id="size_input" >
              <input type="hidden" name="color" id="color_input" >
              <input type="hidden" name="price" id="price_input" >

               <?php else: ?>
              <label class="cus-price">
                  Price: <span id="price_span">€<?php echo e($result->price); ?></span>  <span>/ Including VAT:<?php echo e($result->vat); ?> %</span>
              </label>
              <input type="hidden" name="size" id="size_input" value="">
              <input type="hidden" name="color" id="color_input" value="">
              <input type="hidden" name="price" id="price_input" value="<?php echo e($result->price); ?>">
              <?php endif; ?>              
<br>
               <a class="add2Cart add-cart" href="<?php echo e(route('add-to-cart', [$result->id])); ?>">Add to cart</a>

               <div class="content mt-3">
                <p><?php echo e($result->description); ?></p>
              </div>
           

          </div>
        </div>

       <?php if(count($related_products)>0): ?> 
        <div class="col-lg-12 mt-5">
          <div class="row">
            <div class="col-lg-12">
              <h3>Related Products</h3>
            </div>
              <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php 
              $productImages = DB::table('product_images')->where('product_id',$result->id)->get();
               ?>
              <div class="col-lg-3 col-md-6">
                <div class="services-wrapper">
                  <div class="services-icon related-icon">
                    <img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($productImages[0]->image); ?>" alt="" class="img-fluid">
                  </div>

                  <div class="services-text">
                    <h3><?php echo e($product->title); ?></h3>
                    <a href="<?php echo e(route('productDetails',$product->id)); ?>">View Details</a>
                  </div>
                  <div class="card-footer">
                                <a
                                    href="<?php echo e(route('add-to-cart', [$product->id])); ?>"
                                    class="btn btn-success btn-block"
                                >Add To Cart</a>
                            </div>

                </div>
              </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
          </div>
        </div>
       <?php endif; ?>

      </div>
    </div>
  </section>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<script type="text/javascript">
    $('#variant_option').on('change',function(){
        var sizes_key = $( "#variant_option option:selected" ).data('id');
        var product_id = "<?php echo $result->id; ?>"

        $.ajax({
          url: "<?php echo e(url('product/getPrice')); ?>",
          method: "patch",
          data: {_token: '<?php echo e(csrf_token()); ?>', id: product_id, sizes_key: sizes_key},
          success: function (response) {
            if (response.msg == 'success') {
                $('#size_span').text(response.size);
                $('#color_span').text(response.color);
                $('#price_span').text(response.price);

                $('#size_input').val(response.size);
                $('#color_input').val(response.color);
                $('#price_input').val(response.price);
              }
          }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.add2Cart').on('click',function(){
          var variant_option = $( "#variant_option option:selected" ).val();
          if (variant_option == '' ) {
            toastr.error('Please select variant.', 'error');
            $('#variant_option').focus();
            return false;
          }

            var id = $(this).data('id');
            var size = $('#size_input').val();
            var color = $('#color_input').val();
            var price = $('#price_input').val();
            var qty = 1 ;

            $.ajax({
                url: "<?php echo e(url('add2Cart')); ?>",
                method: "post",
                data: {_token: '<?php echo e(csrf_token()); ?>', id: id, qty: qty, size: size, color: color, price: price},
                success: function (response) {
                    if(response.status == 'success'){
                        toastr.success('Product added to cart successfully');
                        setTimeout(function(){
                            location.reload(); 
                        }, 1000);
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor\resources\views/front/products/productDetails.blade.php ENDPATH**/ ?>