@extends('front.layout.master')
@section('content')
<style>
		@media only screen and (max-width: 600px) {
 a.btn.btn-success {
    padding: 0px;
}

}


</style>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">Cart</span>
  	</div>
</section>
    <div class="container">
        <h1 class="text-center"></h1>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50%">Product</th>
                    <th width="10%">Price</th>
                    <th width="8%">Quantity</th>
                    <th width="22%">Sub Total</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $product)
                        @php
                            $sub_total = $product['price'] * $product['quantity'];
                            $total += $sub_total;
                        @endphp
                        <tr>
                            <td>
                               
                                <img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$productImages[0]->image}}" alt="" class="img-fluid">

                                <span>{{$product['title']}}</span>
                            </td>
                            <td>€{{$product['price']}}</td>
                            <td>
                                <form action="{{route('change-qty', $id)}}" class="d-flex">
                                    <button
                                        type="submit"
                                        value="down"
                                        name="change_to"
                                        class="btn btn-danger"
                                    >
                                        @if($product['quantity'] === 1) x @else - @endif
                                    </button>
                                    <input style="width: 60px;
    margin: 0px 10px;"
                                        type="number"
                                        value="{{$product['quantity']}}"
                                        disabled>
                                    <button
                                        type="submit"
                                        value="up"
                                        name="change_to"
                                        class="btn btn-success"
                                    >
                                        +
                                    </button>
                                </form>
                            </td>
                            <td>€{{$sub_total}}.00</td>
                            <td>
                            <a href="{{route('remove', [$id])}}" class="btn btn-danger btn-sm">X</a>
                            </td>
                        </tr>
                    @endforeach
                @endif 
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <a href="{{route('products')}}"
                           class="btn btn-warning"
                        >Continue Shopping</a>
                        

                    </td>
                    <td>
                    <td class="total_price"><strong>Total €{{$total}}.00</strong></td>
                </tr>
                <tr>
                    <td>
                <form action="" method="post">
                            @csrf
                            <input type="hidden" name="amount" value="{{$total}}">
                           
                            <a href="{{ url('checkout') }}" class="btn btn-success">Proceed to Checkout <i class="fa fa-angle-double-right"></i></a>
                        </form>
</tr></td>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
