
<?php $__env->startSection('content'); ?>

<style>
    .mul{
		height: 200px!important;
		width: 400px!important;
    right: 0!important;
    left: auto!important;
    width: 290px;
    transform: none!important;
    top: 35px!important;
}
	.linkselct {
    color: #000 !important;
    font-weight: 800;
    transition: all 200ms linear;
}
.selected_btn {
    background: #eeeeee !important;
    height: fit-content;
    border-radius: 10px;
	

}
.btn-green {
    background: #40a798;
    color: #fff;
    font-size: 16px;
    padding: 7px 10px;
    border: 1px solid #fff;
    width: 110px;
    display: block;
    text-align: center;
    cursor: pointer;
    transition: ease-in-out 0.5s;
	}
	.about-content {
    margin: 5px 0;
}
  #color_span, #size_span, #price_span{
    font-size: initial;
    top: auto;
  }
  #price_span, .price, .price span{
    font-size: 30px;
    top: auto;
  }
	.price-section{
		padding-top: 20px;
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

.product-calculator {
    width: 1140px;
    margin: 50px auto;
    padding: 0px 15px;
}
.product-calculator h3 {
    margin-bottom: 20px;
    font-weight: 700;
    color: #000;
    letter-spacing: 1px;
}
.product-calculator select {
    margin-bottom: 20px;
    height: 45px;
    border: navajowhite;
    box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
    padding: 0px 10px;
    border-radius: 10px;
}
	a#cartUrl {
    margin-top: 10px;
    width: 100%;
    height: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
}
	.product-calculator label {
    color: #000;
    font-weight: 500;
    text-transform: capitalize;
    font-size: 16px;
}
	a#cartUrl:hover {
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
		color: #fff;
	}
	@media(max-width:1024px){
		.product-calculator {
			width: 100%;
		}
	}
</style>

<section class="position-relative page-header service-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title"></span>
  	</div>
</section>
   <?php //echo '<pre>';print_r($result->description);die; ?>
<section class="about-content">
  	<div class="container">
  		<div class="about-content">
        	<div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              		<h2><?php echo e($result->title); ?></h2>
              		<div class="abt-text abt-margin">
              			<?php echo $result->description; ?>

						  
        			</div>
            	</div>
        	</div>
    	</div>
	</div>
	<?php if($result->id == 5): ?>
	<div class="product-calculator">
				<h3>Product Calculator</h3>
				<select class="form-control" aria-label="Default select example">
					  <option selected>Select Product</option>
					  <option value="1">Louvred Roof Technic wall mounted</option>
					  <option value="2">Louvred Roof Technic Freestanding</option>
					  <option value="3">Elegancy retractable roof wall mounted</option>
					  <option value="4">Elegancy retractable roof Freestanding</option>
					  <option value="5">Essential Plus Glass roof veranda</option>
					  <option value="6">Essential Plus GPolycarbonate roof veranda</option>
				</select>
				<div class="technical-Freestanding">
					<label>Length:</label>
					<select name="length" class="form-control" aria-label="Default select example">						<option>--Select Length--</option>
						  <option value="3m">3m</option>
						  <option value="4m">4m</option>
						  <option value="5m">5m</option>
						  <option value="6m">6m</option>
					</select>
					<label>Width:</label>
					<select name="width" class="form-control" aria-label="Default select example">							<option>--Select Width--</option>
						   <option value="3m">3m</option>
						  <option value="4m">4m</option>
						  <option value="5m">5m</option>
						  <option value="6m">6m</option>
					</select>
				</div>
				<div class="retractable-roof" style="display:none">
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
				</div>
				<div class="retractable-roof-freestanding" style="display:none">
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
				</div>
				<div class="polycarbonate-roof" style="display:none">
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
					<select class="form-select" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
				</div>
				<div class="technical-wall" style="display:none">
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
				</div>
				<div class="technical-wall" style="display:none">
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
					<select class="form-control" aria-label="Default select example">
						  <option selected>Select Product</option>
						  <option value="1">Louvred Roof Technic wall mounted</option>
						  <option value="2">Louvred Roof Technic Freestanding</option>
						  <option value="4">Elegancy retractable roof wall mounted</option>
						  <option value="5">Elegancy retractable roof Freestanding</option>
						  <option value="6">Essential Plus Glass roof veranda</option>
						  <option value="7">Essential Plus GPolycarbonate roof veranda</option>
					</select>
				</div>
				<div class="price-section">
					<label>Title:</label>
					<span>€0+13.5% Vat</span>
					<a href="javascript:void(0)" id="cartUrl" onclick="add2cart();" class="btn-green">Add to Cart</a>
				</div>
			</div>
<?php endif; ?>

</section>

<?php if(count(images)>0): ?>
	<section  class="about-content">
	 	<div class="container">
	     	<div class="row">
	        	
	        	<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
		          	<div class="abt-img">
		             	<img src="<?php echo e(url('/public/admin/clip-one/assets/services/additional_images/original')); ?>/<?php echo e($value->image); ?>" class="abt-img-responsive zoom1">
		           	</div> 
		       	</div>
		      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	    	</div>
	   </div>
	</section>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
	function add2cart() {
		debugger
             $.ajax({

                 url: "<?php echo e(url('save_cart')); ?>",

                 type: "POST",

                 data: {
					"_token": "<?php echo e(csrf_token()); ?>",
                     "price": jQuery('.price-section span').html(),

                     "qty": 1,

                     "length": jQuery('select[name="length"]').val(),

                     "width" : jQuery('select[name="width"]').val(),

                 },

                 success: function(data) {
                    window.location.href = "<?php echo e(url('view-cart')); ?>";
                 }

             });


     }
	jQuery(document).on('change', 'select[name="length"]', function(){
		let _len = jQuery(this).val();
		let _wdth = jQuery('select[name="width"]').val();
		if(_len == '3m' && _wdth == '3m') {
			jQuery('.price-section span').html('€11,652')
			
		} else if(_len == '4m' && _wdth == '3m') {
			jQuery('.price-section span').html('€13,169')
		}else if(_len == '5m' && _wdth == '3m') {
			jQuery('.price-section span').html('€14,718')
		}else if(_len == '5m' && _wdth == '4m') {
			jQuery('.price-section span').html('€15,983')
		}else if (_len == '6m' && _wdth == '4m'){
			alert()
			jQuery('.price-section span').html('€17,772')
		} else {
			jQuery('.price-section span').html('0')
		}
	})
	jQuery(document).on('change', 'select[name="width"]', function(){
		let _len = jQuery('select[name="length"]').val();
		let _wdth = jQuery(this).val();
		if(_len == '3m' && _wdth == '3m') {
			jQuery('.price-section span').html('€11,652')
			
		} else if(_len == '4m' && _wdth == '3m') {
			jQuery('.price-section span').html('€13,169')
		}else if(_len == '5m' && _wdth == '3m') {
			jQuery('.price-section span').html('€14,718')
		}else if(_len == '5m' && _wdth == '4m') {
			jQuery('.price-section span').html('€15,983')
		}else if (_len == '6m' && _wdth == '4m'){
			jQuery('.price-section span').html('€17,772')
		} else {
			jQuery('.price-section span').html('0')
		}
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor_june\resources\views/front/services.blade.php ENDPATH**/ ?>