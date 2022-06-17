@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Edit Order Status</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Order Status
Edit</li>
                  
               </ol>
            </div>
            </div>
         </div>
      </div>
    <!-- start: MAIN CONTAINER -->

        <div class="container" ng-controller="cmsController">
          <!-- start: PAGE HEADER -->
          
          <div class="row">
            <div class="col-sm-12">
              <!-- start: STYLE SELECTOR BOX -->
              <!-- end: STYLE SELECTOR BOX -->
              <!-- start: PAGE TITLE & BREADCRUMB -->
             
              
              <!-- end: PAGE TITLE & BREADCRUMB -->
              <!-- Display all errors -->
              @if (count($errors) > 0)
              <div class="alert alert-danger val-error-list">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

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
                  <div class="alert-mesg" flash-message="@{{statusMesg}}"></div>

           {!! Form::open(array('route' => 'order.update','method'=>'POST', 'class' => 'form-horizontal', 'id' => 'orderEdit', 'name' => 'orderEdit', 'files' => true, 'enctype' => 'multipart/form-data')) !!} 

                    

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="order_status">
                        Order Status
                      </label>
                      <div class="col-sm-6">
                        <select name="order_status" id="order_status" required>
                          
                          <option value="1" {{ $orderDetail->order_status == 1 ? 'selected=selected' : '' }}>Ordered</option>
                          <option value="2" {{ $orderDetail->order_status == 2 ? 'selected=selected' : '' }}>Processing</option>
						  <option value="3" {{ $orderDetail->order_status == 3 ? 'selected=selected' : '' }}>Completed</option>
                          
                        </select>
                      </div>
           
                    </div>
                    
                    
                    <input type="hidden" class="form-control" name="order_id" id="order_id" value="{{$orderDetail->id}}">
                     
                    <div class="form-group">
                      <label class="col-sm-2 control-label">
                       
                      </label>
                      <div class="col-sm-9">

                       
                        <input type="submit" id="save" name="save" class="btn btn-primary" value="Update"/>
                        <a class="btn btn-green" href="{{ url('admin/order/index') }}">Back</a>
                      </div>
                    </div>

                 <!--  {!! Form::close() !!}  -->
                </div>
              </div>
              <!-- end: TEXT FIELDS PANEL -->
            </div>
          </div>
          <!-- end: PAGE CONTENT-->
        </div>
</div>
    <!-- end: MAIN CONTAINER -->
  
@endsection

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@section('script')
  <script src="{{ asset("/public/admin/clip-one/assets/plugins/ckeditor/ckeditor.js") }}"></script>
  <!--    #################  cms form validation ##################### -->
   <script src="{{ asset("/public/admin/clip-one/assets/js/gallery.js") }}"></script>
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

