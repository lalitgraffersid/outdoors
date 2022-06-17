<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.about-content {
    margin: 213px 0;
}
</style>
<!--Inner Section Start-->
<section class="about-content">
  	<div class="container">
  		<div class="about-content">
        <!--cart wrapper start-->
        <div class="container">
            <div class="row">
			<h3 style="text-align:left;margin: 11px 0px;">Cart</h3>
                <div class="col-md-12">
                    <div class="cart_wrapper">
                        <?php if(session('type')): ?>
                        
                        <?php echo e(session('success')); ?>

                        
                        
                    
                         <?php else: ?>
                             <div class="table-responsive">
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:40%">Measurement</th>
                                        <th style="width:10%">Amount</th>
                                        <th style="width:10%" class="text-center">VAT</th>
                                        <th style="width:22%" class="text-center">Subtotal</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
									 <tr>
                                        <td style="width:40%">3mX3m</td>
                                        <td style="width:10%">€1500</td>
                                        <td style="width:10%" class="text-center">10%</td>
                                       <td style="width:22%" class="text-center">€1650</td>
                                        <td style="width:10%"></th>
                                    </tr>
                                     <?php  ?>
                                    
                                    <?php
                                    $runningTotal=0;
                                    ?>
                                    <?php if(isset($cart->details) && $cart->details->count()>0): ?>

                                    <?php $__currentLoopData = $cart->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-8 hidden-xs"> <?php echo e($item->product->product_name); ?> <?php //if(isset( $item->product->pruduct_name)){echo  $item->product->pruduct_name;}else{echo '';} ?></div>
                                                <div class="col-sm-9">
                                                  
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">&euro;<?php echo e($item->base_price); ?>

                                            <?php if($item->product->product_type=='D'): ?>
                                            per m<sup>2</sup>
                                            <?php endif; ?>
                                        </td>
                                        <td data-th="Quantity" class="text-center">
                                            &euro;<?php echo e($item->vat_amount); ?> <p><small>(<?php echo e($item->vat_p); ?>%)</small></p>
                                        </td>
                                        <td data-th="Subtotal" class="text-center">&euro;<?php echo e($item->total_amount); ?></td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-info btn-sm update-cart" data-id="1" onClick="updateItem('<?php echo e($item->id); ?>','<?php echo e($item->product->product_type); ?>')">
											<i  class="fa fa-refresh"></i></button>
                                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="1"
                                                onClick="removeItem('<?php echo e($item->id); ?>')"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                    $runningTotal=$runningTotal+$item->total_amount;
                                    ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tr>

                                        <td colspan="6" class="hidden-xs">Your cart is empty!</td>

                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <?php if($runningTotal>0): ?>

                                        <td><a href="<?php echo e(url('categorys')); ?>/3" class="btn btn-primary"><i
                                                    class="fa fa-angle-double-left"></i> Continue Shopping</a></td>
                                        <td colspan="3" class="hidden-xs"></td>
                                        <td class="hidden-xs text-center"><strong>Total
                                                &euro;<?php echo e(number_format($runningTotal,2)); ?></strong></td>
                                        <td><a href="<?php echo e(URL::to('/checkout')); ?>" class="btn btn-success">Checkout <i
                                                    class="fa fa-angle-double-right"></i></a></td>
                                        <?php else: ?>
                                        <td><a href="<?php echo e(URL::to('/')); ?>" class="btn btn-primary"><i
                                                    class="fa fa-angle-double-left"></i> Continue Shopping</a></td>
                                        <td colspan="5" class="hidden-xs"></td>

                                        <?php endif; ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                        <?php endif; ?>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!--cart wrapper end-->
    </div>
    <!--Products End-->
</div>
</section>
<!--Inner Section End-->


<style>
.table th, .table td {
    padding: 5px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescript'); ?>
<script>
function removeItem(id) {
    var r = confirm("Do you want to remove the item from cart?");
    if (r == true) {
        $.ajax({
            url: "<?php echo e(route('front_del_cart_item')); ?>",
            type: "POST",
            data: {
                "id": id,
            },
            success: function(data) {
                var json = $.parseJSON(data);
                var arrResponse = [];
                $(json).each(function(i, val) {
                    $.each(val, function(k, v) {
                        arrResponse[k] = v;
                    });
                });

                var status = arrResponse['status'];
                if (status == 1) {
                    window.location.href = window.location.href;
                } else {
                    alert('Error: ' + arrResponse['error']);
                }
                //alert(status);
            }
        });

    }

}

function updateItem(id, type) {
    qty = $('#qty_' + id).val();
    $.ajax({
        url: "<?php echo e(route('front_update_cart_item')); ?>",
        type: "POST",
        data: {
            "id": id,
            "qty": qty,
            "product_type": type,
        },
        success: function(data) {
            var json = $.parseJSON(data);
            var arrResponse = [];
            $(json).each(function(i, val) {
                $.each(val, function(k, v) {
                    arrResponse[k] = v;
                });
            });

            var status = arrResponse['status'];
            if (status == 1) {
                window.location.href = window.location.href;
            } else {
						
                alert('Error: ' + arrResponse['error']);
            }
          // alert(status);
        }
    });

}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master' , ['title' => isset($title)? $title: ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/outdoorstructuresireland.com/httpdocs/resources/views/front/carts/index.blade.php ENDPATH**/ ?>