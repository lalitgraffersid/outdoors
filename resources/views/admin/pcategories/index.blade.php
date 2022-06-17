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
            <h1 class="m-0 text-dark">category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">category List</li>
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

           <div class="card-header float-right">
                     <a href="{{route('pcategories.add')}}" class="btn btn-info float-right"><i class="fas fa-plus"></i> {{$data['actionData']->action_title}} </a>
                  </div>
<!-- /.card-header -->
<div class="card-body">
<table border="1" class="table table-striped">
<thead>
<tr>
<th scope="col">#id</th>
<th scope="col">Brand</th>
<th scope="col">Title</th>
<th scope="col">image</th>



</tr>
</thead>
@foreach($pcategorys as $pcategory)

<tbody>
<tr>
<td>{{$pcategory['id']}}</td>
<td>{{$pcategory->brand->name}}</td>

<td>{{$pcategory['title']}}</td>
<td><img src="{{url('/public/admin/clip-one/assets/category/thumbnail')}}/{{$pcategory->image}}">

<td><a class="btn btn-info btn-sm" href={{"delete/".$pcategory['id']}}>Delete</a>
<a class="btn btn-danger btn-sm" href={{"edit/".$pcategory['id']}}>edit</a></td>



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
  


