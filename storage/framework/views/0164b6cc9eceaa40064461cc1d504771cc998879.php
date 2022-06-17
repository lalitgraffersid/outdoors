
<?php $__env->startSection('content'); ?>
  <tr>
    <td align="left" valign="top" style="background:#f4f4f4; border-top: 1px solid #ccc; padding:0 20px;"><table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:'Arial Black', Gadget, sans-serif; font-size:15px; font-weight:600; color:#000; padding-top:10px;">Hello,</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:'Arial Black', Gadget, sans-serif; font-size:15px; line-height:24px; font-weight:300; color:#000;">
          <p>New Product Enquire form submission given below:</p>
            <p>Name : <?php echo e($name); ?></p>
            <p>Product Name : <?php echo e($product); ?></p>
            <p>Email : <?php echo e($email); ?></p>
            <p>Phone : <?php echo e($contact_no); ?></p>
            <p>Subject : <?php echo e($subject); ?></p>
            <p>Message : <?php echo e($email_message); ?></p>
            </td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="border-top: 1px solid #737373;">&nbsp;</td>
        </tr>
        
      </table></td>
  </tr>
  <tr>
    
  </tr>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('front.emails.emailMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/outdoorstructuresireland.com/httpdocs/resources/views/front/emails/emailEnquire.blade.php ENDPATH**/ ?>