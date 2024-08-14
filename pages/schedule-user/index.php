<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="fullcalendar2/lib2/main2.min.css">
    <script src="js/jquery2-3.6.0.min.js"></script>
    <script src="js/bootstrap2.min.js"></script>
    <script src="fullcalendar2/lib2/main2.min.js"></script>
    
</head>
<?php require_once('db-connect.php') ?>
    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    include('../head_css.php'); ?>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Clubhouse Reservation
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row" style="display: flex; align-content: center; justify-content: center;">
                        <!-- left column -->
                            <div class="box" style="display: flex; align-content: center; justify-content: center;">
                            <div class="container py-5" id="page-container">
        <div class="row" style="display: flex; align-content: center; justify-content: center;">
            <div class="col-md-9">
                <div id="calendar" style="display: flex; align-content: center; justify-content: center;"></div>
            </div>
            <div class="col-md-3" style="display: flex; align-content: center; justify-content: center;">
                <div class="cardt rounded-0 shadow">
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Reservation Details</h5>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-dismiss="modal" value="Cancel">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 
$schedules = $conn->query("SELECT * FROM `schedule_list`");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
                            </div><!-- /.box -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; ?>
        
<script>
    var today = new Date().toISOString().slice(0, 16);

document.getElementsByName("start_datetime")[0].min = today;
document.getElementsByName("end_datetime")[0].min = today;
</script>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": []
        });
    });
</script>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="js2/script2.js"></script>
    </body>
</html>