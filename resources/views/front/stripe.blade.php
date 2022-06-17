@extends('front.layout.master')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Stripe Payment Gateway</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link href="{{ asset('/public/frontend/css/custom.css') }}" rel="stylesheet">    
    <link href="{{ asset('/public/frontend/css/custom_responsive.css') }}" rel="stylesheet">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .billing_details input, .billing_details select, .billing_details textarea {
    border: 1px solid #ddd;
    height: 40px;
    padding: 5px 10px;
    width: 100%;
    margin-bottom: 15px;
}
		ul.top-call li {
    display: inline-block;
    color: #fff;
    font-family: sec!important;
    font-size: 16px;
    margin: 0 10px 10px 5px;
    padding: 0 10px 0 0;
    line-height: 1;
    letter-spacing: 1px;
    font-family: 'first';
}
		.page-header {
    padding-bottom: 9px;
    margin: 0px 0 20px;
    border-bottom: 1px solid #eee;
}
    </style>
</head>
<body>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Outdoor Structures Ireland</span>
  	</div>
</section>
<div class="container">
  
  
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <!-- <img class="img-responsive pull-right" src="https://i76.imgup.net/accepted_c22e0.png"> -->
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form role="form" action="{{ route('payment.post') }}" method="post" class="require-validation" data-cc-on-file="false" id="payment-form">
                        
								{{ csrf_field() }}
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text' id="name_on_card">
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Details</label>
                                <div id="card-element" class="form-control">
                                  <!-- Elements will create input elements here -->
                                </div>
                              
                                <!-- We'll put the error messages in this element -->
                                <div id="card-errors" role="alert"></div> 
                            </div>
                        </div>
  

                       

                        <!-- billing details start -->
            <div class="billing_details wow fadeInUp">         
       
              <div class="row">
                <div class="col-md-6">
                  <label>First Name <span>*</span></label>
                  <input type="text" name="first_name" id="first_name" required>
                </div>
                <div class="col-md-6">
                  <label>Last Name <span>*</span></label>
                  <input type="text" name="last_name" id="last_name" required>
                </div>
                                  
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Email <span>*</span></label>
                  <input type="email" name="email" id="email" required>
                </div>
                <div class="col-md-6">
                  <label>Phone <span>*</span></label>
                  <input type="text" name="phone" id="phone" required>
                </div>
                                  
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Country <span>*</span></label>
                  <select name="country" id="Country" required>
                    <option value="0">Select Country</option>
                    <option value="+353">Ireland</option>
                    
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Town / City <span>*</span></label>
                  <input type="text" name="city" id="city" required>
                </div>
                                  
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label>Address <span>*</span></label>
                  <input type="text" name="address" id="address" required>
                </div>
                                  
              </div>                
               <input type="hidden" id="collect" name="collect" value="{{$collect}}" readonly="readonly">
               

          </div>

          <!-- billing details end -->

                        

                        <!-- end -->
  
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
  
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now €({{ $subtotal }})</button>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
      
</div>
  
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
  
<script type="text/javascript">
var stripe = Stripe('{{env('STRIPE_KEY')}}');
var elements = stripe.elements();
var style = {
  base: {
    color: "#32325d",
  }
};

var card = elements.create("card", { style: style });
card.mount("#card-element");
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 
                         'input[type=text]',
                          'input[type=file]',
                         'textarea'].join(', '),
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

      stripe.confirmCardPayment('{{ $client_secret }}', {
        payment_method: {
          card: card,
          billing_details: {
            name: $("#name_on_card").val()
          }
        }
      }).then(function(result) {
        if (result.error) {
          // Show error to your customer (e.g., insufficient funds)
          console.log(result.error.message);
          $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(result.error.message);
        } else {
          // The payment has been processed!
          if (result.paymentIntent.status === 'succeeded') {
            console.log(result.paymentIntent);
              var token = result.paymentIntent['id'];
              // insert the token into the form so it gets submitted to the server
              $form.find('input[type=text]').empty();
              $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
              $form.get(0).submit();
          }
        }
      });
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
	
</html>
@endsection