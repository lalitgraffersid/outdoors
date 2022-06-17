
<?php $__env->startSection('content'); ?>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Cart</span>
  	</div>
</section>
    <div class="container">
        <h1 class="text-center"></h1>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50%">Product</th>
                    <th width="10%">Price</th>
                    <th width="8%">Quantity</th>
                    <th width="22%">Sub Total</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                <?php $total = 0; ?>
                <?php if(session('cart')): ?>
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $sub_total = $product['price'] * $product['quantity'];
                            $total += $sub_total;
                        ?>
                        <tr>
                            <td>
                               
                                <img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($productImages[0]->image); ?>" alt="" class="img-fluid">

                                <span><?php echo e($product['title']); ?></span>
                            </td>
                            <td>₹<?php echo e($product['price']); ?></td>
                            <td>
                                <form action="<?php echo e(route('change-qty', $id)); ?>" class="d-flex">
                                    <button
                                        type="submit"
                                        value="down"
                                        name="change_to"
                                        class="btn btn-danger"
                                    >
                                        <?php if($product['quantity'] === 1): ?> x <?php else: ?> - <?php endif; ?>
                                    </button>
                                    <input style="width: 60px;
    margin: 0px 10px;"
                                        type="number"
                                        value="<?php echo e($product['quantity']); ?>"
                                        disabled>
                                    <button
                                        type="submit"
                                        value="up"
                                        name="change_to"
                                        class="btn btn-success"
                                    >
                                        +
                                    </button>
                                </form>
                            </td>
                            <td>₹<?php echo e($sub_total); ?></td>
                            <td>
                            <a href="<?php echo e(route('remove', [$id])); ?>" class="btn btn-danger btn-sm">X</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?> 
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <a href="<?php echo e(route('allcategory')); ?>"
                           class="btn btn-warning"
                        >Continue Shopping</a>
                        

                    </td>
                    <td>
                    <td colspan="2"></td>
                    <td><strong>Total ₹<?php echo e($total); ?></strong></td>
                </tr>
                <tr>
                    <td>
                <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="amount" value="<?php echo e($total); ?>">
                           
                            <a href="<?php echo e(url('checkout')); ?>" class="btn btn-success">Proceed to Checkout <i class="fa fa-angle-double-right"></i></a>
                        </form>
</tr></td>
                </tfoot>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor\resources\views/front/products/cart.blade.php ENDPATH**/ ?>