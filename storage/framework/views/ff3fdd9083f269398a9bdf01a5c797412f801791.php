<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Outdoor Structures</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b></b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?php echo e(asset('assets/admin/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('assets/admin/dist/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('assets/admin/dist/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/toastr/toastr.min.js')); ?>"></script>

<script src="<?php echo e(asset('/vendor/yajra/laravel-datatables-buttons/src/resources/assets/buttons.server-side.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/select2/js/select2.full.min.js')); ?>"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script type="text/javascript">
   <?php if(Session::has('message')): ?>
      var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
      switch(type){
         case 'info':
            toastr.info("<?php echo e(Session::get('message')); ?>");
            break;

         case 'warning':
            toastr.warning("<?php echo e(Session::get('message')); ?>");
            break;

         case 'success':
            toastr.success("<?php echo e(Session::get('message')); ?>");
            break;
                
         case 'error':
            toastr.error("<?php echo e(Session::get('message')); ?>");
            break;
      }
   <?php endif; ?>
</script>

</body>
</html><?php /**PATH /home/aobhfo788oyt/public_html/resources/views/admin/includes/footer.blade.php ENDPATH**/ ?>