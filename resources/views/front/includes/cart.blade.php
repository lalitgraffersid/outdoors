<!-- cart -->
<style>
    .cart .dropdown-menu {
    padding: 15px;
    right: 0!important;
    left: auto!important;
    width: 290px;
    transform: none!important;
    top: 35px!important;
}
</style>
            <div class="cart">
            <div class="dropdown">
                <button type="button" class="cart-btn" data-toggle="dropdown">
                    <?php

                    //print_r(session('cart')); die;
                    ?>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                </button>
                <div class="dropdown-menu cartmenu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                        </div>

                        <?php $total = 0 ?>
                        @if(!empty(session('cart')))
                        @foreach(session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach
                        @endif

                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">€ {{ $total }}</span></p>
                        </div>
                    </div>

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        <?php 
               $images = DB::table('product_images')->where('product_id',$product->id)->get();
               ?>
                            <div class="row cart-detail">
                               
                                <div class="col-lg-12 col-sm-12 col-12 cart-detail-product">
                                    <table class="table table-hover">
                                        <tr>
                                        <td><span class="heading">{{ $details['title'] }}</span></td>
                                        <td><span class="price text-info"> €{{ $details['price'] }}</span></td>
                                        <td><span class="count"> Qty:{{ $details['quantity'] }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if(session('cart'))
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

  <!-- cart end -->