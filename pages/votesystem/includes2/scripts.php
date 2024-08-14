<!-- jQuery 3 -->
<script src="bower_components3/jquery3/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components3/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins3/iCheck/icheck.min.js"></script>
<!-- DataTables -->
<script src="bower_components3/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components3/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components3/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components3/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist2/js3/adminlte.min.js"></script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable()
  	var bookTable = $('#booklist').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })

    $('#searchBox').on('keyup', function(){
    	bookTable.search(this.value).draw();
	});

  })
</script>