@extends('front.layout.master' , ['title' => isset($title)? $title: ''])
@section('content')


<!--payment wrapper start-->
<STYLE>
a#chk_card {
    DISPLAY: inline-block;
    MARGIN: 12PX 0;
    BACKGROUND: #4f2258;
    BORDER: NONE;
    PADDING: 9PX 40PX;
}
</STYLE>
<div class="payment_wrapper">
    <div class="row">
        <div class="col-md-12">
            <h1>True Self Care : Stripe Payment Gateway</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="heading">
                <h3 class="title">Payment Details</h3>
                <div class="pic">
                    <img class="img-responsive pull-right" src="https://i76.imgup.net/accepted_c22e0.png">
                </div>
            </div>

            {!! Form::open(array('method'=>'POST', 'id' => 'mybooking', 'name' => 'booking', 'files' =>
            true, 'enctype' => 'multipart/form-data')) !!}
            <div class="form-row">
                <div class="col-md-12">
                    <label class="control-label">Name on Card</label>
                    <input type="text" class="form-control" id="card_name" name="card_name"
                        value="{{ old('card_name') }}" maxlength="250" placeholder="Name on Card" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label class="control-label">Card Number</label>
                    <input type="text" class="form-control" id="card_number" name="card_number"
                        value="{{ old('card_number') }}" onkeydown="checkCardFormat(event)" maxlength="16"
                        placeholder="Card Number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label class="control-label">CVC</label> <input class="form-control" placeholder="ex. 311"
                        type="password" required>
                    <div id="errorCvv_number" class="error" style="display:none;">
                        Please enter CVV number.
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="control-label">Expiration Month</label>
                    <select class="form-control" id="exp_month" name="exp_month" required>
                        <option value="">Select Month</option>
                        <option value="01">01 - January</option>
                        <option value="02">02 - February</option>
                        <option value="03">03 - March</option>
                        <option value="04">04 - April</option>
                        <option value="05">05 - May</option>
                        <option value="06">06 - June</option>
                        <option value="07">07 - July</option>
                        <option value="08">08 - August</option>
                        <option value="09">09 - September</option>
                        <option value="10">10 - October</option>
                        <option value="11">11 - November</option>
                        <option value="12">12 - December</option>
                    </select>

                </div>
                <div class="col-md-4">
                    <label class="control-label">Expiration Year</label>
                    <select class="form-control" id="exp_year" name="exp_year" required>
                        <option value="">Select Year</option>
                        @foreach ($card_years as $card_year)
                        <option value="{{$card_year}}">{{$card_year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- <div class="form-row">
                    <div class="col-md-12">
                        <div class="alert-danger alert">Please correct the errors and try
                            again.
                        </div>
                    </div>
                </div> -->
            <div class="form-row row">
                <div class="col-md-12">
                    <!-- <button class="btn btn-primary" type="submit">Pay Now €(5.5)</button> -->
                    <a href="#" class="btn btn-primary" id="chk_card"
                        onclick="nxtBtnCard(event);">Pay Now</a>
                </div>
            </div>

            <div class="loading_section text-center" style="display:none;">
                <img src="{{ asset('/frontend/images/AjaxLoader.gif')}}">
            </div>
            <div class="asynError" style="color:red;font-weight:700;display:none;"></div>

            <div class="amount_area" style="display:none;">
                <div class="row" style="margin-top:25px;">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table width="100%" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="50%">Amount</td>
                                        <td class="text-right">
                                            &euro;
                                            <label id="amount_label"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Processing Fee</td>
                                        <td class="text-right">&euro;
                                            <label id="pro_label"></label>
                                        </td>
                                    </tr>
                                    <tr class="total_amount">
                                        <td width="50%" style="font-weight:700; color:#ef363c;">Total
                                            Amount</td>
                                        <td class="text-right" style="font-weight:700; color:#ef363c;">&euro;
                                            <label id="tot_label"></label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="transaction_id" id="transaction_id">
                             <div class="form-group"><button type="submit" id="payment_final" class="btn btn-primary">Confirm Pay</button></div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
             <div class="form-group text-center"><img src="{{ asset('/frontend/img/payment_option.png')}}" alt="Payment Options"/></div>
        </div>
    </div>
</div>

<style>
.amount_area .table td, .amount_area .table th {
    font-size: 18px;
    background-color: #f6f6f6;
}
</style>
<!--payment wrapper end-->
@endsection
@section('pagescript')
<script>
var myVar="";
var interval ="";
var clientSecret = "";

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
   // startTime();
   // timer();
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

function nxtBtnCard(e) {

    if ($("#card_number").val() == "" || $("#exp_month").val() == "" || $("#exp_year").val() == "" || $("#cvv_number")
        .val() == "") {
        //alert("---");
        return false;
        e.preventDefault();
        alert('hello');
    } else {
        //return false;
        e.preventDefault();
        $(".loading_section").show();
        $("#card_number").attr('readonly', true);
        $("#exp_month").attr('readonly', true);
        $("#exp_year").attr('readonly', true);
        $("#cvv_number").attr('readonly', true);
        $("#chk_card").attr('disabled', true);
        $('.asynError').html('');
        $('.asynError').hide();

        // alert('ajay');
        $.ajax({
            url: './payment-price-cart',
			
            method: 'POST',
            cache: false,
            data: {
                card_number: $("#card_number").val(),
                exp_month: $("#exp_month").val(),
                exp_year: $("#exp_year").val(),
                cvv_number: $("#cvv_number").val(),
            },
            success: function(data) {
                var fees_obj = $.parseJSON(data);
                if (parseInt(fees_obj.success) == 1) {
                    $("#amount_label").html(parseFloat(fees_obj.amount));
                    $("#pro_label").html(parseFloat(fees_obj.processingFee));
                    $("#tot_label").html(parseFloat(fees_obj.total));

                    $("#is_european_card").val(fees_obj.isEuropeanCard);
                    $("#transaction_id").val(fees_obj.transaction_id);
                    $("#chargable_amount").val(parseFloat(fees_obj.total));
                    $("#processing_fees").val(parseFloat(fees_obj.processingFee));

                    $("#processing_fees_percent").val(parseFloat(fees_obj.processingFeePercent));
                    $(".loading_section").hide();
                    $('.amount_area').fadeIn('slow');
                    clientSecret = fees_obj.client_secret;
                } else {
                    $("#card_number").removeAttr('readonly');
                    $("#exp_month").removeAttr('readonly');
                    $("#exp_year").removeAttr('readonly');
                    $("#cvv_number").removeAttr('readonly');
                    $("#chk_card").removeAttr('disabled');
                    $(".loading_section").hide();
                    $('.asynError').html(fees_obj.error);
                    $('.asynError').show();
                    //alert(fees_obj.error);
                }

                console.log(data);
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                console.log('xhr::' + xhr);
                console.log('error::' + error);
            }
        });
        return false;
    }

}
</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{config('services.stripe.key')}}');
    function finalPay(ev) {
        
        ev.preventDefault();
        stripe.confirmCardPayment(clientSecret).then(function(result) {
            if (result.error) {
            // Show error to your customer (e.g., insufficient funds)
            console.log(result.error.message);
            } else {
            // The payment has been processed!
            if (result.paymentIntent.status === 'succeeded') {
                $("#mybooking").submit();
                // Show a success message to your customer
                // There's a risk of the customer closing the window before callback
                // execution. Set up a webhook or plugin to listen for the
                // payment_intent.succeeded event that handles any business critical
                // post-payment actions.
            }
            }
        });
    }
</script>
@endsection