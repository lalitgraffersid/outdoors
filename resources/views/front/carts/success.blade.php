@extends('front.layout.master' , ['title' => isset($title)? $title: ''])
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Inner Section Start-->
<div class="inner-pages">
    <!--Products Start-->
    <div class="our-products product-details">
        <!--cart wrapper start-->
        <div class="container">
            <div class="row">
			<h3 style="text-align:left;margin: 11px 0px;">Cart</h3>
                <div class="col-md-12">
                    <div class="cart_wrapper">
                         @include('partials.errors')

                    @include('partials.success')

                    
                        
                    </div>
                </div>
            </div>
        </div>
        <!--cart wrapper end-->
    </div>
    <!--Products End-->
</div>
<!--Inner Section End-->


<style>
.table th, .table td {
    padding: 5px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
</style>



@endsection