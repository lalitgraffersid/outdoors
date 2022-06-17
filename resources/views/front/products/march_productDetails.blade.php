@extends('front.layout.master')
@section('content')

<style>
  #color_span, #size_span, #price_span{
    font-size: initial;
    top: auto;
  }
  #price_span, .price, .price span{
    font-size: 30px;
    top: auto;
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
.pic img.img-fluid {
    width: 100%;
    border: 1px solid #9d9d9d;
    height: 210px;
    object-fit: cover;
}
.pic {
    padding-bottom: 15px;
}
.col-md-3.wow.product {
   margin: 20px 5px;
    border: 1px solid;
    padding: 10px;
    max-width: 24%;
}
span.vatt {
    font-size: 13px;
    letter-spacing: .5px;
    font-family: 'sec';
    color: #656565;
}
@media only screen and (max-width: 767px) {
    .col-md-3.wow.product {
        margin: 20px 45px;
    max-width: 100%;
    }
    }
</style>
<section class="position-relative page-header project-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   	<span class="main-title">{{$result->title}}</span>
  	</div>
</section>



  <section class="top-space">
    <div class="container" style="margin-top: 5%;">
      <div class="row">
        <div class="col-lg-6">
          <div class="product-details">
            <div class="product-icon">
              <img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$images[0]->image}}" alt="" class="img-fluid">
            </div>

            <div class="owl-carousel owl-theme">
              @foreach($images as $image)
                <div class="item">
                  <a href="{{url('/public/admin/clip-one/assets/products/original')}}/{{$image->image}}" data-lightbox="gallery">
                  <img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$image->image}}" alt="">
                  </a>
                </div>
                @endforeach    
                </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="details-box">
            <h2>{{$result->title}}</h2>
             @if($result->variants == '1')
            <div class="flex-box">
              <label><span>Color &amp; Size</span>
                <select name="variant_option" id="variant_option">

                  <option>-- Select Color &amp; Size --</option>
                   @foreach ($sizes as $key => $value)
                  <option value="{{$value}}" data-id="{{$key}}" >{{$value}} - {{$colors[$key]}}</option>
                   @endforeach
                </select>
              </label>
            </div>
            
            <div class="color-variant">
                <div class="color-left">Color:</div>
                <div class="color-right"><span id="color_span"></span></div>
            </div>

            <div class="color-variant">
                <div class="color-left">Size:</div>
                <div class="color-right"><span id="size_span"></span></div>
            </div>

           

            <label class="cus-price">
              Price: <span id="price_span"></span> 
            </label>

              <input type="hidden" name="size" id="size_input" >
              <input type="hidden" name="color" id="color_input" >
              <input type="hidden" name="price" id="price_input" >

               @else
              <label class="cus-price">
                  Price: <span id="price_span">€{{$result->price}}</span> / <span class="vatt">Including VAT:{{$result->vat}} %</span>
				  
              </label>
              <input type="hidden" name="size" id="size_input" value="">
              <input type="hidden" name="color" id="color_input" value="">
              <input type="hidden" name="price" id="price_input" value="{{$result->price}}">
              @endif              
<br>
                <?php
  $hide=" "; // default visible
   if ($result->price == 0) : 
      $hide="hide";
 ?>
<a class="<?= $hide ?> add2Cart add-cart" href="../enquire">Enquire Now </a>


<?php endif ?>
<?php
  $hide=" "; // default visible
   if ($result->price > 1) : 
      $hide="hide";
 ?>
<a class="<?= $hide ?> add2Cart add-cart" href="{{route('add-to-cart', [$result->id])}}">Add to cart</a>
<?php endif ?>
               <div class="content mt-3">
               <h5>Description</h5>

                <p>{!!$result->description!!}</p>
              </div>
           

          </div>
        </div>

             
           

          </div>
        </div>



       <!-- related products -->
       @if(count($related_products)>0) 
      <div class="product_list_wrapper related_products">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h2>Related products</h2>
                  </div>

                  @foreach($related_products as $product)
                  <?php 
               $images = DB::table('product_images')->where('product_id',$product->id)->get();
               ?>
                  <div class="col-md-3 wow product">
                  <div class="pic">
                     <img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$images[0]->image}}" alt="" class="img-fluid">
                     </div>
                     <h6>{{$product->title}}</h6>
                     <div class="price">€ {{$product->price}}</div>
                     <div class="cart_btn">
                     <a href="{{ URL::to('/') }}/product/{{ $product->id }}" class="info">More info</a>

                        @if ($relproduct->sold === '1')
                          <p class="cart">Sold Out</p>
                        @else
                        <a href="{{ url('add-to-cart/'.$product->id) }}" class="cart">Add To Cart</a>
                        @endif
                  
                     </div>
                  </div>
                   @endforeach
               </div>
            </div>
         </div>
         @endif

      </div>
    </div>
  </section>





@endsection
@section('script')


<script type="text/javascript">
    $('#variant_option').on('change',function(){
        var sizes_key = $( "#variant_option option:selected" ).data('id');
        var product_id = "<?php echo $result->id; ?>"

        $.ajax({
          url: "{{ url('product/getPrice') }}",
          method: "patch",
          data: {_token: '{{ csrf_token() }}', id: product_id, sizes_key: sizes_key},
          success: function (response) {
            if (response.msg == 'success') {
                $('#size_span').text(response.size);
                $('#color_span').text(response.color);
                $('#price_span').text(response.price);

                $('#size_input').val(response.size);
                $('#color_input').val(response.color);
                $('#price_input').val(response.price);
              }
          }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.add2Cart').on('click',function(){
          var variant_option = $( "#variant_option option:selected" ).val();
          if (variant_option == '' ) {
            toastr.error('Please select variant.', 'error');
            $('#variant_option').focus();
            return false;
          }

            var id = $(this).data('id');
            var size = $('#size_input').val();
            var color = $('#color_input').val();
            var price = $('#price_input').val();
            var qty = 1 ;

            $.ajax({
                url: "{{ url('add2Cart') }}",
                method: "post",
                data: {_token: '{{ csrf_token() }}', id: id, qty: qty, size: size, color: color, price: price},
                success: function (response) {
                    if(response.status == 'success'){
                        toastr.success('Product added to cart successfully');
                        setTimeout(function(){
                            location.reload(); 
                        }, 1000);
                    }
                }
            });
        });
    });
</script>
@endsection