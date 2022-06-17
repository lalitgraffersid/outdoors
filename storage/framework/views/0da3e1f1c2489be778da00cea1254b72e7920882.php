<?php $__env->startSection('content'); ?>


<table width="650" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; border-collapse:collapse;">

  <!-- <tr>
    <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; line-height: 20px; text-align: center; border: 1px solid #ccc; padding: 10px;">
      <img src="https://www.kilmoreseafresh.com/frontend/images/logo.png" alt="">
    </td>    
  </tr> -->

  <tr>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">Order id   
    </td>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;"><?php echo e($orderDetail->order_id); ?>   
    </td>
  </tr>

  <tr>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">
    <strong>Billed To:</strong><br>
              <?php echo e($orderDetail->billing_first_name); ?> <?php echo e($orderDetail->billing_last_name); ?><br>
              <?php echo e($orderDetail->billing_phone); ?><br>
              <?php echo e($orderDetail->billing_city); ?><br>
              <?php echo e($orderDetail->billing_address); ?><br>
              <?php echo e($orderDetail->billing_country); ?>  
    </td>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">
    <strong>Shipped To:</strong><br>
              <?php echo e($orderDetail->billing_first_name); ?> <?php echo e($orderDetail->billing_last_name); ?><br>
              <?php echo e($orderDetail->billing_phone); ?><br>
              <?php echo e($orderDetail->billing_city); ?><br>
              <?php echo e($orderDetail->billing_address); ?><br>
              <?php echo e($orderDetail->billing_country); ?>   
    </td>
  </tr>

    <tr>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">
    <strong>Email:</strong><br>
              <?php echo e($orderDetail->billing_email); ?>

    </td>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">
     <strong>Order Date:</strong><br>
      <?php echo e(date('d-m-Y', strtotime($orderDetail->created_at))); ?>

    </td>
  </tr>
   <tr>
    <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">
      Order summary
    </td>    
  </tr>

</table>

<table id="cart" width="650" border="0" cellspacing="0" cellpadding="0" style="margin: 15px auto; border-collapse:collapse;">
                <tr>
                  <th style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">Product</th>
                  <th style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">Quantity</th>
                  <th style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">Amount</th>                  
                </tr>
                
                <tbody>
                  <?php

                    $total = 0;

                    $collect = $orderDetail->collect;
                    if($collect == 1){

                        $vat = 0;

                    } else {

                        $vat = 0;


                    }

                    
                    
                  ?>

                  <?php if(session('cart')): ?>
                      <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <?php $total += $details['price'] * $details['quantity'] ?>

                          <tr>
                              <td data-th="Product" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><?php echo e($details['title']); ?></td>
                              <td data-th="Quantity" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><?php echo e($details['quantity']); ?></td>
                              <td data-th="Price" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">€<?php echo e($details['price'] * $details['quantity']); ?></td>
                          </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>

                  </tbody>

                  <tr>
                  <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><strong>Click and Collect</strong></td>
                  <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">
                    <?php if($orderDetail->collect == 1): ?>
                    Yes
                    <?php else: ?>
                    No
                    <?php endif; ?>
                    
                  </td>
                  </tr>
                  

                  <tr>
                  <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><strong>Delivery charge (VAT Included)</strong></td>
                  <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">€<?php echo e($vat); ?></td>
                  </tr>
                  <tr>
                    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><strong>Total</strong></td>
                    <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><strong>€<?php echo e($total + $vat); ?></strong></td>
                  </tr>
                </table>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('front.emails.emailMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/front/emails/emailPaypal.blade.php ENDPATH**/ ?>