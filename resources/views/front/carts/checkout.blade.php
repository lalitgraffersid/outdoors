@extends('front.layout.master' , ['title' => isset($title)? $title: ''])
<?php /*?>@php
$arrSettings = \Helpers::getSiteSettingsData();
@endphp<?php */?>
@section('content')
<style>
button.btn.btn-success.float-right {
    background: #523458;
}
.order_details table th, .order_details table td {
    padding: 10px;
    border: 1px solid #ddd;
}.order_details table th {
    background: #523458;
    font-weight: 900;
    color: #fff;
}.btn.btn-success.float-right {
    display: block;
    margin: 14px 3px;
}
</style>
<!--Inner Section Start-->

<div class="inner-pages">
    <!--Products Start-->
    <div class="our-products product-details">
        <!--cart wrapper start-->
        <div class="container">

            <!-- billing -->

            <div class="row">
                <div class="col-md-6 wow fadeInUp">
                    <p class="rvw_txt">Review Your Cart Before Buying</p>
                    <h2>Billing <span>Details</span></h2>
                </div>
                <div class="col-md-6 wow fadeInUp">
                    <!-- <h5>Your Order</h5> -->
                    <p class="rvw_txt">&nbsp;</p>
                    <h2>Your <span>Order</span></h2>
                </div>
            </div>
            
            {!! Form::open(array('route' => 'front_checkout_save','method'=>'POST', 'class' => 'contact-form','id' =>
            'contact', 'name' => 'contact', 'files' => true, 'enctype' =>'multipart/form-data')) !!}
            <div class="row">
                <div class="col-md-6 wow fadeInUp">
                    @php
                    $first_name = old('first_name');
                    if($cart->first_name != '') $first_name = $cart->first_name;

                    $last_name = old('last_name');
                    if($cart->last_name != '') $last_name = $cart->last_name;

                    $email = old('email');
                    if($cart->email != '') $email = $cart->email;

                    $phone = old('phone');
                    if($cart->phone != '') $phone = $cart->phone;

                    $country = old('country');
                    if($cart->country != '') $country = $cart->country;

                    $city = old('city');
                    if($cart->city != '') $city = $cart->city;

                    $address = old('address');
                    if($cart->address != '') $address = $cart->address;

                    $postcode = old('postcode');
                    if($cart->postcode != '') $postcode = $cart->postcode;

                    $collect = old('collect');
                    if($cart->self_pickup != '') $collect = ($cart->self_pickup=='Y')?1:0;

                    @endphp
                    <div class="form-row">
                        <div class="col-md-6">
                            <label class="control-label">First Name <span>*</span></label>
                            <input class="form-control" type="text" name="first_name" id="first_name" required=""
                                value="{{ $first_name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Last Name <span>*</span></label>
                            <input class="form-control" type="text" name="last_name" id="last_name" required=""
                                value="{{ $last_name }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label class="control-label">Email <span>*</span></label>
                            <input class="form-control" type="email" name="email" id="email" required=""
                                value="{{ $email }}">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Phone <span>*</span></label>
                            <input class="form-control" type="text" name="phone" id="phone" required=""
                                value="{{ $phone }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label class="control-label">Address <span>*</span></label>
                            <input class="form-control" type="text" name="address" id="address" required=""
                                value="{{ $address }}">
                        </div>

                        <div class="col-md-6">
                            <label class="control-label">Town / City <span>*</span></label>
                            <input class="form-control" type="text" name="city" id="city" required="" value="{{$city}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label class="control-label">Country <span>*</span></label>
                            <select class="form-control" name="country" id="country" required="">
                                <option value="">Select Country</option>
                                <option value="Ireland" @if($country=="Ireland" ) selected="selected" @endif>Ireland
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Post Code <span>*</span></label>
                            <input class="form-control" type="text" name="postcode" id="postcode" required=""
                                value="{{ $postcode }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <!--<p style="font-weight:600;padding-top:10px;"> <input type="checkbox" id="collect" value="1"-->
                                    <!--name="collect" @if($collect=="1" ) checked=true @endif>-->
                                <!--<label for="collect">I will pickup my order.</label></p>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp">

                    <!-- order details start -->
                    <div class="order_details">

                        <div class="table-responsive">
                            @php
                            $runningTotal=0;
                            @endphp
                            @if(isset($cart->details) && $cart->details->count()>0)
                            <table id="cart" style="width:100%;">
                                <tbody>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    @foreach($cart->details as $item)
                                    <tr>
                                        <td data-th="Product">
                                            {{$item->product->product_name}}
                                           
                                        </td>
                                        <td data-th="qty">{{$item->qty}}</td>
                                        <td data-th="Price" class="text-right">€{{$item->total_amount}}</td>
                                    </tr>
                                    @php
                                    $runningTotal=$runningTotal+$item->total_amount;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="3"><strong>VAT Included.</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Sub Total</strong></td>
                                        <td>€{{number_format($runningTotal,2)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Delivery Charges</strong></td>
                                        <td>
<?php 
$fixed_delivery_charge =0;		

//$arrSettings->fixed_delivery_charge	

?>
	<?php /*?><input type="hidden" name="productid" value="<?php echo $productid;?>" />										
	<input type="hidden" name="catid" value="<?php echo $cat;?>" />	
	<input type="hidden" name="image" value="<?php echo $image;?>" />	<?php */?>
										
										
										
                                            <div id="withDC" @if($collect=="1" ) style="display:none;" @else
                                                style="display:block;" @endif>€{{$fixed_delivery_charge}}
                                            </div>
                                            <div id="withoutDC" @if($collect=="1" ) style="display:block;" @else
                                                style="display:none;" @endif>€0</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Total</strong></td>
                                        <td><strong>
                                                <div id="withDCTotal" @if($collect=="1" ) style="display:none;" @else
                                                    style="display:block;" @endif>
                                                    €{{number_format($runningTotal+$fixed_delivery_charge,2)}}
                                                </div>
                                                <div id="withoutDCTotal" @if($collect=="1" ) style="display:block;"
                                                    @else style="display:none;" @endif>
                                                    €{{number_format($runningTotal,2)}}</div>

                                            </strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>


                        <div class="paypal">
                            <button class="btn btn-success float-right" type="submit">Proceed To Pay <i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>


                    </div>
                    <!-- order details end -->
                </div>
            </div>



            {!! Form::close() !!}
        </div>
        <!--checkout wrapper end-->
    </div>
    <!--Products section end-->
</div>
<!--inner section end-->


@endsection
@section('pagescript')
<script>
var myVar="";
var interval ="";
function startTime() {
    $.ajax({
        url: "{{route('insert_cart_session')}}",
        type: "POST",
        data: {
            "id": "{{session()->getId()}}",
        },
        async:true,
        success: function(data) {
            var json = $.parseJSON(data);
            var arrResponse = [];
            $(json).each(function(i, val) {
                $.each(val, function(k, v) {
                    arrResponse[k] = v;
                });
            });

            console.log(arrResponse);
            if(arrResponse['status']==3){
                // myStopFunction();
                clearInterval(interval);
                alert("Session has been removed. Please try again!");
                 //window.location.href="https://maireadsholistictherapies.com/";
				  window.location.href="https://jennytrueselfcare.com/";
				 
            }else{
                startTime();
                return false;
            }
            //alert(status);
        }
    });
    // myVar= setInterval(function(){ startTime() }, 5000);
}

function timer(){
    $.ajax({
        url: "{{route('check_timer')}}",
        type: "POST",
        data: {
            "id": "{{session()->getId()}}",
        },
        async:true,
        success: function(data) {
            var json = $.parseJSON(data);
            var arrResponse = [];
            $(json).each(function(i, val) {
                $.each(val, function(k, v) {
                    arrResponse[k] = v;
                });
            });

            console.log(arrResponse);
            if(arrResponse['status']!=1){
                timer();
            }else{
                var timer2= arrResponse['success'];
                if(timer2==0){
                    $(".countdown").html(0);
                }else{
                    interval = setInterval(function() {
                        var timer = timer2.split(':');
                        //by parsing integer, I avoid all extra string processing
                        var minutes = parseInt(timer[0], 10);
                        var seconds = parseInt(timer[1], 10);
                        --seconds;
                        minutes = (seconds < 0) ? --minutes : minutes;
                        if (minutes < 0) clearInterval(interval);
                        seconds = (seconds < 0) ? 59 : seconds;
                        seconds = (seconds < 10) ? '0' + seconds : seconds;
                        //minutes = (minutes < 10) ?  minutes : minutes;
                        if(parseInt(minutes)>0 || parseInt(seconds)>0){
                            $('.countdown').html(minutes + ':' + seconds);
                            timer2 = minutes + ':' + seconds;
                        }else{
                            $('.countdown').html('');
                            timer();
                        } 
                    }, 1000);
                }
                
            }
            //alert(status);
        }
    });
    
}


$(document).ready(function(){
   
});
$('#collect').click(function() {
    if ($(this).is(':checked')) {
        $('#withDC').hide();
        $('#withDCTotal').hide();
        $('#withoutDC').show();
        $('#withoutDCTotal').show();
    } else {
        $('#withDC').show();
        $('#withDCTotal').show();
        $('#withoutDC').hide();
        $('#withoutDCTotal').hide();

    }
});

function removeItem(id) {
    var r = confirm("Do you want to remove the item from cart?");
    if (r == true) {
        $.ajax({
            url: "{{route('front_del_cart_item')}}",
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
        url: "{{route('front_update_cart_item')}}",
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
            //alert(status);
        }
    });

}
</script>
@endsection