@extends('front.emails.emailMaster')
@section('content')


<table width="650" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; border-collapse:collapse;">

  <!-- <tr>
    <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; line-height: 20px; text-align: center; border: 1px solid #ccc; padding: 10px;">
      <img src="https://www.kilmoreseafresh.com/frontend/images/logo.png" alt="">
    </td>    
  </tr> -->

  <tr>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">Order id   
    </td>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">{{ $orderDetail->order_id }}   
    </td>
  </tr>

  <tr>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">
    <strong>Billed To:</strong><br>
              {{ $orderDetail->billing_first_name }} {{ $orderDetail->billing_last_name }}<br>
              {{ $orderDetail->billing_phone }}<br>
              {{ $orderDetail->billing_city }}<br>
              {{ $orderDetail->billing_address }}<br>
              {{ $orderDetail->billing_country }}  
    </td>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">
    <strong>Shipped To:</strong><br>
              {{ $orderDetail->billing_first_name }} {{ $orderDetail->billing_last_name }}<br>
              {{ $orderDetail->billing_phone }}<br>
              {{ $orderDetail->billing_city }}<br>
              {{ $orderDetail->billing_address }}<br>
              {{ $orderDetail->billing_country }}   
    </td>
  </tr>

    <tr>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">
    <strong>Email:</strong><br>
              {{ $orderDetail->billing_email }}
    </td>
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px; width: 50%;">
     <strong>Order Date:</strong><br>
      {{ date('d-m-Y', strtotime($orderDetail->created_at))}}
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

                  @if(session('cart'))
                      @foreach(session('cart') as $id => $details)

                          <?php $total += $details['price'] * $details['quantity'] ?>
<?php
if ($total < 375) {
    $shiping = 10;
  } else {
     $shiping = 0;
  }
  ?>
                          <tr>
                              <td data-th="Product" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">{{ $details['title'] }}</td>
                              <td data-th="Quantity" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">{{ $details['quantity'] }}</td>
                              <td data-th="Price" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">€{{ $details['price'] * $details['quantity'] }}</td>
                          </tr>
                      @endforeach
                  @endif

                  </tbody>

                  <tr>
                  <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><strong>Click and Collect</strong></td>
                  <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">
                    @if ($orderDetail->collect == 1)
                    Yes
                    @else
                    No
                    @endif
                    
                  </td>
                  </tr>
                  

                  <tr>
                  <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><strong>Shipping charge </strong></td>
                  <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;">€ {{ $shiping }}</td>
                  </tr>
                  <tr>
                    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><strong>Total</strong></td>
                    <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 20px; text-align: left; border: 1px solid #ccc; padding: 10px;"><strong>€{{ $total + $shiping }}</strong></td>
                  </tr>
                </table>

  @stop