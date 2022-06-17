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


</style>

<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Checkout</span>
  	</div>
</section>

<section class="hes_derimg mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headeing_image">
                    <p><strong><a href="<?php echo e(route('home')); ?>">Home ></a></strong> <span>Checkout</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product_section layout_padding">
  	<div class="container">
  		<div class="row"></div>
  		<form role="form" action="<?php echo e(route('stripe.post')); ?>" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>" >
		<div class="checkout__form">
	   		<?php echo e(csrf_field()); ?>

	   		<?php if(count($errors) > 0): ?>       
             	<div class='alert alert-danger text-white alert-dismissable' style="background-color: #e2401c;">
                	<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   		<span><?php echo e($error); ?></span><br/>
                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
             	</div>         
          	<?php endif; ?> 	
	      	<div class="row">
	         	<div class="col-lg-6 col-md-6">
	         		<h4>Billing Details</h4>
	         		
	         		<div class="delivery-box">
	         		    <div class="row">
	               		<div class="col-lg-6">
	                  		<div class="checkout__input mb-3">
	                     		<p>Fist Name<span style="color: red;">*</span></p>
	                     		<input type="text" name="first_name" required>
	                  		</div>
	               		</div>
		               	<div class="col-lg-6">
		                  	<div class="checkout__input mb-3">
		                     	<p>Last Name<span style="color: red;">*</span></p>
		                     	<input type="text" name="last_name" required>
		                  	</div>
		               	</div>
		            </div>
		            <div class="checkout__input mb-3">
		               	<p>Country<span style="color: red;">*</span></p>
		               	<select name="country">
		               		<option value="Ireland">Ireland</option>
		               	</select>
		            </div>
		            <div class="checkout__input mb-3">
		               	<p>Street address<span style="color: red;">*</span></p>
		               	<input type="text" name="street_address" placeholder="House number and street name" required>
		            </div>
		            <div class="checkout__input mb-3">
		               	<input type="text" name="appartment" placeholder="Apartment, suite, unit, etc. (optional)">
		            </div>
		            <div class="checkout__input mb-3">
		            	<p>Town / City<span style="color: red;">*</span></p>
		               	<input type="text" name="town_city" required>
		            </div>
		           
		            <div class="checkout__input mb-3">
		            	<p>Eircode (optional)</p>
		               	<input type="text" name="eircode">
		            </div>
		            <div class="checkout__input mb-3">
		            	<p>Phone <span style="color: red;">*</span></p>
		               	<input type="tel" name="phone" required>
		            </div>
		            <div class="checkout__input mb-3">
		            	<p>Email address <span style="color: red;">*</span></p>
		               	<input type="email" name="email" required>
		            </div>
	            
	              	
		            <div class="row">  
		             	<div class="col-lg-12">
		                 	<p class="M_taxt">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our</p>
		                </div>
		             	<div class="col-lg-12">
		                 	<label class="bill-name">Order notes (optional) <textarea name="notes" rows="6" placeholder="Notes about your order, e.g. special notes for delivery."></textarea></label>
		                </div>
		            </div>
	         		</div>
            	</div>
	         
	         <!-----leftside----->
	           <div class="col-lg-6 col-md-6">
	            	<div class="checkout__order">
	        			<div class="checkout-form-panel">
							<h3 class="biling-hdng">YOUR ORDER</h3>

							<table class="table table-bordered">
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
                      <tr>
                            <td><b>Total</b></td>
                            <td>€<?php echo e($total); ?></td>
                          </tr>
                  <?php endif; ?>

                  </tbody>
                </table>
              
							<div class="stripe-box">
								<h6><span></span>Stripe</h6>
								<ul class="card-list">
									<li><img src="<?php echo e(asset('assets/front/images/mastercard.svg')); ?>" alt=""></li>
									<li><img src="<?php echo e(asset('assets/front/images/amex.svg')); ?>" alt=""></li>
									<li><img src="<?php echo e(asset('assets/front/images/visa.svg')); ?>" alt=""></li>
								</ul>
							</div>

							<div class="payment-box">
							    <div class="card-details">
								<h6 class="c_title" style="margin: 0 0 9px 0; font-weight: normal;">Pay with your credit card via Stripe.</h6>

								<label class="card-info">Card Number <span style="color: red;">*</span>
									<div style="display: flex;" class="C_ard">
									    <i class="fa fa-credit-card"></i>
									    <input type="" name="card_number" placeholder="1234 1234 1234 1234" maxlength="16" class=" card-number required" onkeydown="checkCardFormat(event)" autocomplete="off" size="20" required=""><i class="icofont-credit-card"></i></div></label>
							</div>

							<div class="row">
								<div class="col-lg-4">
									<label class="card-info">Expiry Month <span style="color: red;">*</span>
									<div style="display: flex;"><input type="text" name="expiry_month" id="expiry_month" placeholder="MM" class=" w1 card-icon card-expiry-month required" size="2" data-inputmask-alias="expiry_month" data-inputmask-inputformat="MM" data-mask="" required="" inputmode="text"></div></label>
								</div>

								<div class="col-lg-4">
									<label class="card-info">Expiry Year <span style="color: red;">*</span>
									<div style="display: flex;"><input type="text" name="expiry_year" id="expiry_year" placeholder="YYYY" class=" w1 card-icon card-expiry-year required" size="2" data-inputmask-alias="expiry_year" data-inputmask-inputformat="YYYY" data-mask="" required="" inputmode="text"></div></label>
								</div>

								<div class="col-lg-4">
									<label class="card-info">Card Code (CVC) <span style="color: red;">*</span>
									<div style="display: flex;"><input type="text" name="cvv" id="cvv" placeholder="CVC" maxlength="16" class=" w1 card-icon card-cvc required" autocomplete="off" size="4" required="" inputmode="text"></div></label>
									<div id="errorCvv_number " class="error" style="display:none;">
	                                   Please enter CVV number.
	                               </div>
								</div>

		                        <div class='col-md-12 error form-group hide'>
		                            <div class='alert-danger alert'>Please correct the errors and try
		                                again.</div>
		                        </div>

		                        <input type="hidden" name="total_amount" value="<?php echo e(number_format($grand_total,2)); ?>">

								<div class="col-lg-12 mt-3 ">
										<p class="card-text c_hk">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.</p>

										<button class="proceed-btn placeorder site-btn">PLACE ORDER</button>
								</div>
							</div>
							</div>

						</div>
		            </div>
		         </div>
		      </div>
		   </form>
   
   
   
</div>
</div>
</section>

	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
<script>
$(document).ready(function(){
  $("#vehicle1").click(function(){
   $(".shipping").toggle('slow');
  });
});
</script>


<script>
    var num;

$(".button-count:first-child").click(function () {
  num = parseInt($("input:text").val());
  if (num > 1) {
    $("input:text").val(num - 1);
  }
  if (num == 2) {
    $(".button-count:first-child").prop("disabled", true);
  }
  if (num == 10) {
    $(".button-count:last-child").prop("disabled", false);
  }
});

$(".button-count:last-child").click(function () {
  num = parseInt($("input:text").val());
  if (num < 10) {
    $("input:text").val(num + 1);
  }
  if (num > 0) {
    $(".button-count:first-child").prop("disabled", false);
  }
  if (num == 9) {
    $(".button-count:last-child").prop("disabled", true);
  }
});

</script>

<script>
	$(document).ready(function(){
		$('#expiry_month').inputmask('99', { 'placeholder': 'MM' });
		$('#expiry_year').inputmask('9999', { 'placeholder': 'YYYY' });
		$('#cvv').inputmask('999', { 'placeholder': 'CVC' });

		$('.select12').select2({
		   	theme: 'bootstrap4',
		   	//minimumResultsForSearch: Infinity
		});

		$('.DifferPanel').on('click', function(){
			$('.dif-add').slideToggle();
		});

		// $("#ClickCoupon").on('click', function(){
		// 	$(".coupon-panel").slideToggle();
		// });
	});
</script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  	function checkCardFormat(e) {
     	// Allow: backspace, delete, tab, escape, enter and .
     	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
   	}

  	$(function() {
      	var $form         = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
          	var $form         = $(".require-validation"),
              	inputSelector = ['input[type=email]', 'input[type=password]',
                               'input[type=text]', 'input[type=file]',
                               'textarea','select'].join(', '),
              	$inputs       = $form.find('.required').find(inputSelector),
              	$errorMessage = $form.find('div.error'),
              	valid         = true;
              	$errorMessage.addClass('hide');
              	$('.has-error').removeClass('has-error');
          	$inputs.each(function(i, el) {
	            var $input = $(el);
	            if ($input.val() === '') {
	              	$input.parent().addClass('has-error');
	              	$errorMessage.removeClass('hide');
	              	e.preventDefault();
	            }
          	});

          	if (!$form.data('cc-on-file')) {
            	e.preventDefault();
            	Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            	Stripe.createToken({
	              	number: $('.card-number').val(),
	              	cvc: $('.card-cvc').val(),
	              	exp_month: $('.card-expiry-month').val(),
	              	exp_year: $('.card-expiry-year').val()
            	}, stripeResponseHandler);
          	}
        });

        function stripeResponseHandler(status, response) {
          	if (response.error) {
              	$('.error')
                  	.removeClass('hide')
                  	.find('.alert')
                  	.text(response.error.message);
          	} else {
          		// token contains id, last4, and card type
              	var token = response['id'];
              	// insert the token into the form so it gets submitted to the server
              	$form.find('input[type=text]').empty();
              	$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
              	$form.get(0).submit();
       		}
      	}
  	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor\resources\views/front/products/checkout.blade.php ENDPATH**/ ?>