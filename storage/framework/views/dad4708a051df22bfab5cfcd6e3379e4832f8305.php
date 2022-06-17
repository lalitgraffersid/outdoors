<?php $__env->startSection('content'); ?>


<style>
    .table-bordered {
    border: 1px solid #dee2e6;
}

.stripe-box span:before {
    content: "";
    display: block;
    width: 6px;
    height: 6px;
    background-color: #13aff0;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.stripe-box span {
    display: inline-block;
    width: 16px;
    height: 16px;
    border: solid #13aff0 1px;
    border-radius: 50%;
    position: relative;
    top: 2px;
    margin: 0 6px 0 0;
}
.stripe-box h6 {
    float: left;padding-top: 12px;
}
ul.card-list {
    text-align: right;
}
ul.card-list li img {
    width: 40px;
}
ul.card-list li {
    display: inline-block;
    margin: 0 4px 0 0;
}
h6.c_title {
    margin-top: 25px;
    font-weight: 600;
}
label.card-info {
    font-size: 14px;
      width: 100%;
}
.card-info span{
    font-size: inherit;
    top: auto;
    display: inline-block;
}
input.card-number.required {
    width: 100%;
}
.w1, input.card-number.required {
    width: 100%;
    height: 35px;
    border-radius: 5px;
    border: 1px solid #bfaeae;
    padding: 0 10px;
    font-size: 14px;
}
p.card-text.c_hk {
    font-size: 14px;
}
.checkout__input p {
    color: #1c1c1c;
    margin-bottom: 5px;
}
    .C_ard{
        position:relative;
    }
    .C_ard i {
    position: absolute;
    right: 6px;
    font-size: 20px;
}
.headin_g h4.mt-4 {
    float: left;
    border-bottom: none;
    clear: both;
    margin-bottom:0px;
}
.headin_g {
    border-bottom: 1px solid #eee;
}

.headin_g input {
    float: right;
    padding-top: 26px;
    display: inline-block;
    margin-top: 20px;
}

label.bill-name {
    width: 100%;
}
.bill-name textarea {
    width: 100%;
}
p.M_taxt {
    font-size: 14px;
    margin: 25px 0;
}
.shipping{
    display:none;
}

.hide{
	display: none;
}
.headeing_image span, .cart-proce-color{
    font-size: inherit;
    top: auto;
}
.checkout__input span{
	font-size: inherit;
    top: auto;
    display: inline-block;
}

.delivery-box{
    background-color: #f5f5f5;
    padding: 30px;
    overflow: auto;
}
.delivery-box label{
    width: 100%;
    margin: 0 0 20px 0;
}
.delivery-box input, select, textarea{
    width: 100%;
    min-height: 40px;
    border: solid #ccc 1px;
    outline: none;
    padding: 0 0 0 10px;
}
.delivery-box span{
    font-size: 15px;
    font-family: 'five';
    margin: 0 0 -2px 0;
    cursor: pointer;
}
.detail-table tr th{
    font-weight: normal;
    font-family: 'sec';
    font-size: 18px;
    letter-spacing: .3px;
    border: 1px solid #dee2e6;
}
.detail-table tr:first-child{
    background-color: #01c4c3;
    color: #fff;
}
.detail-table tr td{
    border: 1px solid #dee2e6;
}
.stripe-box {
    background-color: #f5f5f5;
    cursor: pointer;
    padding: 20px;
}
.stripe-box h2 {
    float: left;
    margin: 0;
    font-size: 24px;
}
.stripe-box span {
    display: inline-block;
    width: 16px;
    height: 16px;
    border: solid #13aff0 1px;
    border-radius: 50%;
    position: relative;
    top: 2px;
    margin: 0 6px 0 0;
}
.stripe-box span:before {
    content: "";
    display: block;
    width: 6px;
    height: 6px;
    background-color: #13aff0;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
ul.card-list {
    text-align: right;
    margin: 0;
}
ul.card-list li {
    display: inline-block;
    margin: 0 4px 0 0;
}
ul.card-list li img {
    width: 40px;
}
.payment-box{
    margin: 30px 0 0 0;
    border: solid #e8e8e8 3px;
    padding: 20px;
}
.payment-box h3{
    font-size: 16px;
    margin: 0 0 20px 0;
}
.payment-box span{
    font-size: 16px;
    color: #636363;
}
.card-flex, .card-date{
    display: flex;
}
.payment-box label, input{
    width: 100%;
}
.payment-box input{
    min-height: 42px;
    border: solid #ccc 1px;
    padding: 0 0 0 10px;
    outline: none;
}
.payment-box i{
    font-size: 25px;
    margin: 0px 0 0 -42px;
}
.card-date{
    margin: 12px 0 0 0;
}
.card-date label{
    margin: 0 20px 0 0;
}
.card-date label:last-child{
    margin: 0 0 0 0;
}
.order-btn{
    background-color: #ffbc00;
    display: block;
    text-align: center;
    color: #000 !important;
    padding: 15px 10px;
    font-size: 18px;
    margin-top: 30px;
    border-radius: 50px;
}
.parts-cart li a{
    font-family: 'sec';
    letter-spacing: .5px;
    background-color: black;
    display: inline-block;
    padding: 8px 20px;
    border-radius: 40px;
    margin: 0 0 0 10px;
}
.proceed-btn {
    background-color: #0138e5;
    color: #fff !important;
    display: block;
    border: none;
    font-size: 15px;
    width: 100%;
    text-align: center;
    padding: 14px 0;
    letter-spacing: 1px;
}
.order_details table th {
    background: #ff1616;
    font-weight: 900;
    color: #fff;
    padding: 10px 20px;
}
.order_details table {
    width: 100%;
}
.order_details table th:nth-child(2), .order_details table td:nth-child(2) {
    text-align: right;
}
.order_details table tr {
    border: 1px solid #ddd;
    padding: 10px;
}
.order_details table th, .order_details table td {
    padding: 10px;
    font: 16px/24px 'Lato', sans-serif;
    font-weight: 400;
}
p.total {
    border: 1px solid;
    padding: 10px;
    font-weight: bold;
}
#noCharge p span.amount, #addCharge p span.amount {
    float: right;
}
.check_txt {
    padding-bottom: 15px;
    overflow: hidden;
}
.stripbtn {
    background: #ff1616;
    color: #fff;
    border: 1px solid transparent;
    padding: 1rem 3.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    font-weight: 600;
    margin-bottom: 14px;
}

</style>

<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Checkout</span>
  	</div>
</section>

<?php if(session('success')): ?>

<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>

<?php endif; ?>


<!--inner wrapper start--> 
<div class="inner_wrapper">
      <div class="checkout_wrapper">
      <div class="container">

      <div class="row">              
        <div class="col-md-12 wow fadeInUp">
          <p class="rvw_txt">Review Your Cart Before Buying</p>
        <h2>Billing <span>Details</span></h2>
        </div>
      </div>

    <!-- order details start -->

    <div class="order_details">
      
      <h5>Your order</h5>

      <div class="table-responsive">
        <table id="cart">
          <tr>
            <th>Product</th>
            <th>Amount</th>
            
          </tr>
          
          <tbody>

            <?php $total = 0 ?>

            <?php if(session('cart')): ?>
                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php $total += $details['price'] * $details['quantity'] ?>

                    <tr>
                        <td data-th="Product">
                            <?php echo e($details['title']); ?>

                            
                        </td>
                        <td data-th="Price">€<?php echo e($details['price'] * $details['quantity']); ?></td>
                        
                        
                        
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            </tbody>
          </table>
      </div>
      <div id="noCharge">
         <p class="total">Total : <span class="amount">€<?php echo e($total); ?></span></p>
      </div>

      <div id="addCharge" style="display: none">
         <p class="total"> Total : <span class="amount"><?php echo e($total); ?></span></p>
      </div>


      <div class="paypal">

        <form class="" method="POST" id="payment-form" action="<?php echo URL::to('make/payment'); ?>">
            <div class="check_txt">
            <?php echo e(csrf_field()); ?>

            <input type="checkbox" id="collect" value="1" name="collect" style="float: left; margin-right: 5px; margin-top: 5px; width: auto; height: auto;">
            <label for="collect" style="float: left;">Click and Collect (Delivery charge : €0)</label>
            </div>
            <div class="btn_stripe">
            <button type="submit" class="btn btn-primary stripbtn">PAY WITH STRIPE</button>
            </div>
         </form>
     
    </div>

<!-- billing -->

    </div>

    <!-- order details end -->

</div>
</div>
      
</div>


<!--inner wrapper end--> 


<script src="<?php echo e(asset('/frontend/js/jquery-3.4.1.min.js')); ?>" type="text/javascript"></script> 
<script type="text/javascript">
$(function () {
   $("#collect").click(function () {
       if ($(this).is(":checked")) {
           $("#addCharge").show();
           $("#noCharge").hide();
       } else {
           $("#addCharge").hide();
           $("#noCharge").show();
       }
   });

  $('input:checkbox').prop('checked', false);
});
</script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdor2\resources\views/front/products/checkout.blade.php ENDPATH**/ ?>