@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Order Item Details</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Order view</li>
                  
               </ol>
            </div>
            </div>
         </div>
      </div>
    <!-- start: MAIN CONTAINER -->

        <div class="container">
          <!-- start: PAGE HEADER -->
          
          <div class="row">
            <div class="col-sm-12">
              <!-- start: STYLE SELECTOR BOX -->
              <!-- end: STYLE SELECTOR BOX -->
              <!-- start: PAGE TITLE & BREADCRUMB -->
             
              
              <!-- end: PAGE TITLE & BREADCRUMB -->
              <!-- Display all errors -->
              

              <!-- ############ -- >
            </div>
          </div>
          <!-- end: PAGE HEADER -->
          <!-- start: PAGE CONTENT -->
          <div class="row">
            <div class="col-sm-12">
              <!-- start: TEXT FIELDS PANEL -->
              <div class="panel panel-default">
                <div class="panel-body">
                  <p>Billing Name: {{ $orderDetails->billing_first_name }} {{ $orderDetails->billing_last_name }}</p>
                  <p>Billing Phone: {{ $orderDetails->billing_phone }}</p>
                  <p>Billing Email: {{ $orderDetails->billing_email }}</p>
                  <p>Billing Country: {{ $orderDetails->billing_country }} Ireland</p>
                  <p>Billing City: {{ $orderDetails->billing_city }}</p>
                  <p>Billing Address: {{ $orderDetails->billing_address }}</p>
                  <p><strong>Billing Amount (Including vat €8): €{{ $billamout }}</strong></p>
                  <p>Billing Charge Id: {{ $orderDetails->charge_id }}</p>
                  <p>Billing Order Id: {{ $orderDetails->order_id }}</p>
                  <p>Billing Transaction Id: {{ $orderDetails->transaction_id }}</p>
                  
                  
                <hr>
                 @foreach ($itemsDetail as $item)
                    <p>Product Name: {{ $item->item_name }}</p>
                    <p>Product Price: €{{ $item->item_price }}</p>
                    <p>Quantity: {{ $item->quantity }}</p>
                    <hr>
                   @endforeach
                
              </div>
              <!-- end: TEXT FIELDS PANEL -->
              <a class="btn btn-green" href="{{ url('admin/order/index') }}">Back To Listing</a>
            </div>

           

          </div>
          <!-- end: PAGE CONTENT-->
        </div>
      </div>
    <!-- end: MAIN CONTAINER -->
  
@endsection

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@section('script')
  <script src="{{ asset("/admin/clip-one/assets/plugins/ckeditor/ckeditor.js") }}"></script>
  <!--    #################  cms form validation ##################### -->
   <script src="{{ asset("/admin/clip-one/assets/js/gallery.js") }}"></script>
  <!--    #################  cms form validation ##################### -->
<script type="text/javascript">
        var editor = CKEDITOR.replace( 'description', {

                             filebrowserBrowseUrl : '{{url('')}}/admin/clip-one/assets/plugins/ckfinder/ckfinder.html',

                             filebrowserImageBrowseUrl : '{{url('')}}/admin/clip-one/assets/plugins/ckfinder/ckfinder.html?type=Images',

                             filebrowserFlashBrowseUrl : '{{url('')}}/admin/clip-one/assets/plugins/ckfinder/ckfinder.html?type=Flash',

                             filebrowserUploadUrl : '{{url('')}}/admin/clip-one/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                             filebrowserImageUploadUrl : '{{url('')}}/admin/clip-one/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                             filebrowserFlashUploadUrl : '{{url('')}}/admin/clip-one/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

                             }); 
  </script>

@endsection
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

