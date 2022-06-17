<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Order</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Order List</li>
                  
               </ol>
            </div>
            </div>
         </div>
      </div>
    <!-- start: MAIN CONTAINER -->
    <div class="container">
          <!-- start: PAGE HEADER -->
          <div class="row">
            <div class="col-sm-12">
             
              
               <?php if(Session::has('message')): ?>
                <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?>
              <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
          </div>
          <!-- end: PAGE HEADER -->
          <!-- start: PAGE CONTENT -->
          <div class="row">
            <div class="col-md-12">
              <!-- start: DYNAMIC TABLE PANEL -->
             
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="table-responsive" style="overflow-x: auto;">
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                        
                        <th>Name </th>
						            <th>Email </th>
						            <th>Phone </th>
                        <!-- <th>Charge id </th>
                        <th>Transaction id </th>
						            <th>Order id </th> -->
                        <th>Payment_status </th>
						            <th>Order status  </th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <?php if(count($orderDetails) > 0): ?>
                    <tbody>
                      
                        <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                      <tr>
                     
                        <td><?php echo e($order->billing_first_name); ?> <?php echo e($order->billing_last_name); ?></td>
            						<td><?php echo e($order->billing_email); ?></td>
            						<td><?php echo e($order->billing_phone); ?></td>
            						<!-- <td><?php echo e($order->charge_id); ?></td>
            						<td><?php echo e($order->transaction_id); ?></td>
            						<td><?php echo e($order->order_id); ?></td> -->
                        <td><?php echo e($order->payment_status); ?></td>
            						<td>
						
              							<?php if($order->order_status == 1): ?>
              								Ordered
              							<?php elseif($order->order_status == 2): ?>
              								Processing
              							<?php else: ?>
              								Completed
              							<?php endif; ?>
            						</td>
                        
                        <td>
                          <a href="<?php echo URL::route('order.view',$order->id); ?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Order Details"><i class="fa fa-eye"></i></a>
                          <a href="<?php echo URL::route('order.edit',$order->id); ?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Change Order Status"><i class="fa fa-edit"></i></a>
                         
                        </td>
                        
                      </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    </tbody>
                     <?php endif; ?>
 
                  </table>
                  </div>
                </div>
              </div>
             
              
            </div>

              <!-- end: DYNAMIC TABLE PANEL -->
            </div>
          </div>
          
          <!-- end: PAGE CONTENT-->
        </div>
    <!-- end: MAIN CONTAINER -->
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<!--########## Java Script Start ##########-->

    <script type="text/javascript" src="<?php echo e(asset("/public/admin/clip-one/assets/plugins/DataTables/media/js/jquery.dataTables.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("/public/admin/clip-one/assets/plugins/DataTables/media/js/DT_bootstrap.js")); ?>"></script>
    <script src="<?php echo e(asset("/public/admin/clip-one/assets/js/table-data.js")); ?>"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
      jQuery(document).ready(function() {
        TableData.init();
      });
    </script>
 
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/admin/order/index.blade.php ENDPATH**/ ?>