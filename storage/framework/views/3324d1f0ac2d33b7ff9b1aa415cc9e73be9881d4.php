
<?php $__env->startSection('content'); ?>

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
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
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
                     <a href="<?php echo e(route('pcategories.add')); ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i> <?php echo e($data['actionData']->action_title); ?> </a>
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
<?php $__currentLoopData = $pcategorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tbody>
<tr>
<td><?php echo e($pcategory['id']); ?></td>
<td><?php echo e($pcategory->brand->name); ?></td>

<td><?php echo e($pcategory['title']); ?></td>
<td><img src="<?php echo e(url('/public/admin/clip-one/assets/category/thumbnail')); ?>/<?php echo e($pcategory->image); ?>">

<td><a class="btn btn-info btn-sm" href=<?php echo e("delete/".$pcategory['id']); ?>>Delete</a>
<a class="btn btn-danger btn-sm" href=<?php echo e("edit/".$pcategory['id']); ?>>edit</a></td>



</tr>
</tbody>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>              </div>
<!-- /.card-body -->
            </div>
          </div>
         </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<?php $__env->stopSection(); ?>
  



<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\outdoor\resources\views/admin/pcategories/index.blade.php ENDPATH**/ ?>