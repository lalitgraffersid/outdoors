<?php $__env->startSection('content'); ?>
<style>
   .product h6 {
    padding: 10px 0px;
    font-weight: 600 !important;
    text-transform: capitalize;
    padding-bottom: 5px;
    font: 18px/24px 'Lato', sans-serif;
}
.price {
    color: #ff1616;
    font-size: 18px;
    font-weight: 600;
}
.product a.info {
    text-transform: uppercase;
    padding: 7px;
    font-size: 13px;
    color: #fff;
    width: 120px;
    float: left;
    text-align: center;
    background: #ff9030;
}
.product a.cart {
   text-transform: uppercase;
    padding: 7px;
    font-size: 13px;
    color: #fff;
    width: 120px;
    float: right;
    text-align: center;
    background: #222;
}
.pic img.img-fluid {
    width: 100%;
    border: 1px solid #9d9d9d;
    height: 210px;
    object-fit: cover;
}
.pic {
    padding-bottom: 15px;
}
.col-md-3.wow.product {
   margin: 20px 5px;
    border: 1px solid;
    padding: 10px;
    max-width: 24%;
}

</style>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Product List</span>
  	</div>
</section>

<main id="main">

    <div class="container">
        <div class="row">
            


        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
               $images = DB::table('product_images')->where('product_id',$product->id)->get();
               ?>
                  <div class="col-md-3 wow product">
                     <div class="pic">
                     <img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($images[0]->image); ?>" alt="" class="img-fluid">
                     </div>
                     <h6><?php echo e($product->title); ?></h6>
                     
                     <div class="price">€ <?php echo e($product->price); ?></div>
                     <div class="cart_btn">
                        <a href="<?php echo e(URL::to('/')); ?>/product/<?php echo e($product->id); ?>" class="info">More info</a>
                        
                        <?php if($product->sold === '1'): ?>
                          <p class="cart">Sold Out</p>
                        <?php else: ?>
                          <a href="<?php echo e(url('add-to-cart/'.$product->id)); ?>" class="cart">Add To Cart</a>
                        <?php endif; ?>
                        
                     </div>
                  </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
            </div>
          
          
        </div>
    </div>

    <section>
        <div class="container-fluid">
            <div class="section-title" style="padding-bottom: 0px;"></div>
        </div>
    </section>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/front/products.blade.php ENDPATH**/ ?>