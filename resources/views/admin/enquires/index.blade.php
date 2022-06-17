@extends('admin.layout.master')
@section('content')

<?php 
   $current_route = \Request::route()->getName();
   $routeArr = explode('.', $current_route);
   $section = $routeArr[0];
   $action = $routeArr[1];

   $data = App\Helpers\AdminHelper::checkAddButtonPermission($section,Auth::user()->id);
?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product Enquires</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Enquires List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
           
           <div class="col-lg-12"> 
         
               
           <div class="card">

<!-- /.card-header -->
<div class="card-body">
<table border="1" class="table table-striped">
<thead>
<tr>
<th scope="col">#id</th>
<th scope="col">Name</th>
<th scope="col">Product</th>
<th scope="col">Email</th>
<th scope="col">Contact</th>
<th scope="col">Message</th>

</tr>
</thead>
@foreach($enquires as $enquire)

<tbody>
<tr>
<td>{{$enquire['id']}}</td>
<td>{{$enquire['name']}}</td>
<td>{{$enquire['product']}}</td>
<td>{{$enquire['email']}}</td>
<td>{{$enquire['contact_no']}}</td>
<td>{{$enquire['message']}}</td>
<td><a href="<?php echo URL::route('enquires.view',$enquire->id); ?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Order Details"><i class="fa fa-eye"></i></a>
<a href="<?php echo URL::route('enquires.delete',$enquire->id); ?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Order Details"><i class="fas fa-trash"></i></a></td>



</tr>
</tbody>
@endforeach
</table>              </div>
<!-- /.card-body -->
            </div>
          </div>
         </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')


@endsection
  


