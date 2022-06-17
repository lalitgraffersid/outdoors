@extends('admin.layout.master')
@section('content')

<?php 
   $current_route = \Request::route()->getName();
   $routeArr = explode('.', $current_route);
   $section = $routeArr[0];
   $action = $routeArr[1];

   $data = App\Helpers\AdminHelper::checkAddButtonPermission($section,Auth::user()->id);
   // $user_id = Request::get('user_id');
   // $status = Request::get('status');
?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Product</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Product List</li>
                  <div class="card-header float-right">
                     <a href="{{route('products.add')}}" class="btn btn-info float-right"><i class="fas fa-plus"></i> {{$data['actionData']->action_title}} </a>
                  </div>
               </ol>
            </div>
            </div>
         </div>
      </div>

      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     @if(!empty($data['checkRole']) && (Auth::user()->user_type == 'admin' || !empty($data['checkPermission'])))
                        <div class="card-header float-right">
                           <a href="{{route('products.add')}}" class="btn btn-info float-right"><i class="fas fa-plus"></i> {{$data['actionData']->action_title}} </a>
                           <a href="{{route('products.import')}}" class="btn btn-info float-right" style="margin-right: 7px;"><i class="fas fa-plus"></i> Import </a> 
                        </div>
                     @endif
                     <div class="card-body">
                        <form action="{{route('products.index')}}" method="GET">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-3">
                                       <div class="form-group">
                                          <select class="select12 form-control" name="category_id" style="width: 100%;" data-placeholder="Select Category">
                                             <option value="">Select Category</option>
                                             @foreach($categories as $value)
                                                <option value="{{$value->id}}" <?php if(!empty($category_id) && $category_id == $value->id){ echo "selected"; } ?> >{{$value->title}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-3">
                                       <div class="form-group">
                                          <select class="select12 form-control" name="brand_id" style="width: 100%;" data-placeholder="Select Brand">
                                             <option value="">Select Brand</option>
                                             @foreach($brands as $value)
                                                <option value="{{$value->id}}" <?php if(!empty($brand_id) && $brand_id == $value->id){ echo "selected"; } ?> >{{$value->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       <div class="form-group">
                                          <input type="text" name="title" class="form-control" placeholder="Search Title" value="<?php if(!empty($title)){echo $title; } ?>">
                                       </div>
                                    </div>
                                    <div class="col-2">
                                       <div class="form-group">
                                          <label></label>
                                          <button type="submit" class="btn btn-info" style="width: 97%;">Search</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <table class="table table-bordered" >
                           <thead>
                              <tr>
                                 <th>S.No.</th>
                                 <th>Category</th>
                                 <th>Brand</th>
                                 <th>Title</th>
                                 <th>Image</th>
                                 <th>Status</th>
                                 <!-- <th>Quantity Available</th> -->
                                 <th style="width: 200px">Action</th>
                              </tr>
                           </thead>
                           
                           @if(count($results)>0)
                           <tbody class="tablecontents" id="tablecontents">
                              <?php $i = 1; ?>
                              @foreach($results as $key => $result)
                              <?php 
                                 $count = DB::table('products')->where('title',$result->title)->count();
                                 $category = DB::table('pcategories')->where('id',$result->category_id)->first();
                                 $brand = DB::table('brands')->where('id',$result->brand_id)->first();
                                 $image = DB::table('product_images')->where('product_id',$result->id)->first();
                              ?>
                              <tr class="row1" id="row1" data-id="{{ $result->id }}">
                                 <td>{{$result->order_no}}</td>
                                 <td>{{$category->title}}</td>
                                 <td>{{$brand->name}}</td>
                                 <td>{{$result->title}}</td>
                                 <td>
                                    @if(!empty($image->image))
                                       <ul class="list-inline"><li class="list-inline-item"><img alt="Avatar" class="table-avatar" src="{{url('/public/admin/clip-one/assets/products/thumbnail')}}/{{$image->image}}"></li></ul>
                                    @else
                                       <ul class="list-inline"><li class="list-inline-item"><img alt="Avatar" class="table-avatar" src="{{url('/assets/no_image.jpg')}}" width="100px"></li></ul>
                                    @endif
                                 </td>
                                 <td>
                                    @if (!empty($checkStatusAction) && (!empty($checkStatusPermission) || Auth::user()->user_type == 'admin'))
                                       @if($result->status == '1')
                                          <a title="Status" href="{{route('products.status',[$result->id]) }}"  onclick="return confirm('Are you sure want to change status?')"> <span class="btn btn-success btn-sm">Active</span></a> 
                                       @endif
                                       @if($result->status == '0')
                                          <a title="Status" href="{{ route('products.status',[$result->id]) }}"  onclick="return confirm('Are you sure want to change status?')"><span class="btn btn-danger btn-sm">Inactive</span> </a> 
                                       @endif
                                    @else
                                       @if($result->status == '1')
                                          <a href="javascript:void(0)" class="btn btn-success btn-sm">Active</a>
                                       @endif
                                       @if($result->status == '0')
                                          <a href="javascript:void(0)" class="btn btn-danger btn-sm">Inactive</a>
                                       @endif
                                    @endif
                                 </td>
                              
                                    <td><a class="btn btn-info btn-sm" href={{"delete/".$result['id']}}>Delete</a>
<a class="btn btn-danger btn-sm" href={{"edit/".$result['id']}}>edit</a></td>
                                       
                              </tr>
                              <?php $i++; ?>
                              
                                 @section('script')
                                 @if (empty($category_id)  && empty($status) && empty($title))                          
                                    <script type="text/javascript">
                                       $(function () {
                                          $( "#tablecontents" ).sortable({
                                             items: "tr",
                                             cursor: 'move',
                                             opacity: 0.9,
                                             update: function() {
                                                sendOrderToServer();
                                             }
                                          });

                                          function sendOrderToServer() {  
                                             var order = [];
                                             $('tr.row1').each(function(index,element) {
                                                
                                               order.push({
                                                   id: $(this).attr('data-id'),
                                                   position: index+1
                                                });
                                             });


                                             $.ajax({
                                                type: "POST", 
                                                dataType: "json", 
                                                url: "{{url('admin/products/sortProducts')}}",
                                                data: {
                                                   order:order,
                                                   _token: '{{csrf_token()}}'
                                                },
                                                success: function(response) {
                                                   if (response.status == "success") {
                                                      toastr.success("Sorted successfuly.",'Success');
                                                      location.reload();
                                                   } else {
                                                      toastr.error("Try Again!",'Error');
                                                      location.reload();
                                                   }
                                                }
                                             });
                                          }
                                       });
                                    </script>
                                 @endif
                                 
                                 @endsection
                              @endforeach
                           </tbody>
                           @endif
                        </table>

                        
                        <!-- Add more modal -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
@endsection
