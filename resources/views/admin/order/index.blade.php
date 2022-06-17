@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Order</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Order List</li>
                  
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
             
              
               @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message')}}</p>
              @endif
              <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
          </div>
          <!-- end: PAGE HEADER -->
          <!-- start: PAGE CONTENT -->
          <div class="row">
            <div class="col-md-12">
              <!-- start: DYNAMIC TABLE PANEL -->
             
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="table-responsive" style="overflow-x: auto;">
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                        
                        <th>Name </th>
						            <th>Email </th>
						            <th>Phone </th>
                        <!-- <th>Charge id </th>
                        <th>Transaction id </th>
						            <th>Order id </th> -->
                        <th>Payment_status </th>
						            <th>Order status  </th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    @if (count($orderDetails) > 0)
                    <tbody>
                      {{--*/ $i=0; /*--}}
                        @foreach ($orderDetails as $order)
                      {{--*/ $i++; /*--}}
                      <tr>
                     
                        <td>{{ $order->billing_first_name }} {{ $order->billing_last_name }}</td>
            						<td>{{ $order->billing_email }}</td>
            						<td>{{ $order->billing_phone }}</td>
            						<!-- <td>{{ $order->charge_id }}</td>
            						<td>{{ $order->transaction_id }}</td>
            						<td>{{ $order->order_id }}</td> -->
                        <td>{{ $order->payment_status }}</td>
            						<td>
						
              							@if ($order->order_status == 1)
              								Ordered
              							@elseif ($order->order_status == 2)
              								Processing
              							@else
              								Completed
              							@endif
            						</td>
                        
                        <td>
                          <a href="<?php echo URL::route('order.view',$order->id); ?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Order Details"><i class="fa fa-eye"></i></a>
                          <a href="<?php echo URL::route('order.edit',$order->id); ?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Change Order Status"><i class="fa fa-edit"></i></a>
                         
                        </td>
                        
                      </tr>
                       @endforeach
                       
                    </tbody>
                     @endif
 
                  </table>
                  </div>
                </div>
              </div>
             
              
            </div>

              <!-- end: DYNAMIC TABLE PANEL -->
            </div>
          </div>
          
          <!-- end: PAGE CONTENT-->
        </div>
    <!-- end: MAIN CONTAINER -->
</div>
@endsection


@section('script')
<!--########## Java Script Start ##########-->

    <script type="text/javascript" src="{{ asset("/public/admin/clip-one/assets/plugins/DataTables/media/js/jquery.dataTables.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("/public/admin/clip-one/assets/plugins/DataTables/media/js/DT_bootstrap.js") }}"></script>
    <script src="{{ asset("/public/admin/clip-one/assets/js/table-data.js") }}"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
      jQuery(document).ready(function() {
        TableData.init();
      });
    </script>
 
@endsection


