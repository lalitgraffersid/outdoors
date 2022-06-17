@extends('front.layout.master' , ['title' => isset($title)? $title: ''])
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.about-content {
    margin: 213px 0;
}
</style>
<!--Inner Section Start-->
<section class="about-content">
  	<div class="container">
  		<div class="about-content">
        <!--cart wrapper start-->
        <div class="container">
            <div class="row">
			<h3 style="text-align:left;margin: 11px 0px;">Cart</h3>
                <div class="col-md-12">
                    <div class="cart_wrapper">
                        @if(session('type'))
                        
                        {{session('success')}}
                        
                        
                    
                         @else
                             <div class="table-responsive">
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:40%">Measurement</th>
                                        <th style="width:10%">Amount</th>
                                        <th style="width:10%" class="text-center">VAT</th>
                                        <th style="width:22%" class="text-center">Subtotal</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
									 <tr>
                                        <td style="width:40%">3mX3m</td>
                                        <td style="width:10%">€1500</td>
                                        <td style="width:10%" class="text-center">10%</td>
                                       <td style="width:22%" class="text-center">€1650</td>
                                        <td style="width:10%"></th>
                                    </tr>
                                     <?php  ?>
                                    
                                    @php
                                    $runningTotal=0;
                                    @endphp
                                    @if(isset($cart->details) && $cart->details->count()>0)

                                    @foreach($cart->details as $item)
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-8 hidden-xs"> {{$item->product->product_name}} <?php //if(isset( $item->product->pruduct_name)){echo  $item->product->pruduct_name;}else{echo '';} ?></div>
                                                <div class="col-sm-9">
                                                  
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">&euro;{{$item->base_price}}
                                            @if($item->product->product_type=='D')
                                            per m<sup>2</sup>
                                            @endif
                                        </td>
                                        <td data-th="Quantity" class="text-center">
                                            &euro;{{$item->vat_amount}} <p><small>({{$item->vat_p}}%)</small></p>
                                        </td>
                                        <td data-th="Subtotal" class="text-center">&euro;{{$item->total_amount}}</td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-info btn-sm update-cart" data-id="1" onClick="updateItem('{{$item->id}}','{{$item->product->product_type}}')">
											<i  class="fa fa-refresh"></i></button>
                                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="1"
                                                onClick="removeItem('{{$item->id}}')"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @php
                                    $runningTotal=$runningTotal+$item->total_amount;
                                    @endphp
                                    @endforeach
                                    @else
                                    <tr>

                                        <td colspan="6" class="hidden-xs">Your cart is empty!</td>

                                    </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        @if($runningTotal>0)

                                        <td><a href="{{url('categorys')}}/3" class="btn btn-primary"><i
                                                    class="fa fa-angle-double-left"></i> Continue Shopping</a></td>
                                        <td colspan="3" class="hidden-xs"></td>
                                        <td class="hidden-xs text-center"><strong>Total
                                                &euro;{{number_format($runningTotal,2)}}</strong></td>
                                        <td><a href="{{URL::to('/checkout')}}" class="btn btn-success">Checkout <i
                                                    class="fa fa-angle-double-right"></i></a></td>
                                        @else
                                        <td><a href="{{URL::to('/')}}" class="btn btn-primary"><i
                                                    class="fa fa-angle-double-left"></i> Continue Shopping</a></td>
                                        <td colspan="5" class="hidden-xs"></td>

                                        @endif
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                        @endif
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!--cart wrapper end-->
    </div>
    <!--Products End-->
</div>
</section>
<!--Inner Section End-->


<style>
.table th, .table td {
    padding: 5px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
</style>

@endsection
@section('pagescript')
<script>
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
          // alert(status);
        }
    });

}
</script>
@endsection