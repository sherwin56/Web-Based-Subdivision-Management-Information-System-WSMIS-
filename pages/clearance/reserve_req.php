<!DOCTYPE html>
<html>

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
                <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adminreserve"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Reservation</button>

                                        <?php 
                                            if(!isset($_SESSION['staff']))
                                            {
                                        ?>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModalreserve"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        <?php
                                            }
                                        ?>
                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <ul class="nav nav-tabs" id="myTab">
                                      <li class="active"><a data-target="#approved" data-toggle="tab">Approved</a></li>
                                      <li><a data-target="#disapproved" data-toggle="tab">Disapproved</a></li>
                                </ul>

                                

                                <form method="post">
                                    <div class="tab-content">
                                    <div id="approved" class="tab-pane active in">
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <?php 
                                                        if(!isset($_SESSION['staff']))
                                                        {
                                                    ?>
                                                    <th style="width: 20px !important;"><input type="checkbox" name="deleteModalreserve[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                    <?php
                                                        }
                                                    ?>
                                                    <th>Reservation No.</th>
                                                    <th>Full Name</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Payment</th>
                                                    <th>Reference No.</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th style="width: 15% !important;">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                if(!isset($_SESSION['staff']))
                                                {

                                                    $squery = mysqli_query($con, "SELECT *,CONCAT(rr.lname, ', ' ,rr.fname, ' ' ,rr.mname) as residentname,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'Approved' and cr.residentid = rr.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="deleteModalreserve[]" class="deleteModalreserve" value="'.$row['crid'].'" /></td>
                                                            <td>'.$row['reserve_no'].'</td>
                                                            <td>'.$row['fullname'].'</td>
                                                            <td>'.$row['title'].'</td>
                                                            <td>'.$row['description'].'</td>
                                                            <td>'.$row['startdate'].'</td>
                                                            <td>'.$row['enddate'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                            <td><button class="btn btn-primary btn-sm" data-target="#editreserveModal'.$row['crid'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                             <a href="printreserve.php?resident='.$row['residentid'].'&reserve='.$row['reserve_no'].'&val='.sha1($row['reserve_no'].'|'.$row['residentname'].'|'.$row['date']).'" onclick="location.reload();" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Print</a></td>
                                                            </td>
                                                        </tr>
                                                        ';

                                                        include "editreserve_modal.php";
                                                    }
                                                    
                                                    $squery = mysqli_query($con, "SELECT *,cr.id as crid FROM tblreserve cr where status = 'Approved' and cr.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="deleteModalreserve[]" class="deleteModalreserve" value="'.$row['crid'].'" /></td>
                                                            <td>'.$row['reserve_no'].'</td>
                                                            <td>'.$row['fullname'].'</td>
                                                            <td>'.$row['title'].'</td>
                                                            <td>'.$row['description'].'</td>
                                                            <td>'.$row['startdate'].'</td>
                                                            <td>'.$row['enddate'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                            <td><button class="btn btn-primary btn-sm" data-target="#editreserveModal'.$row['crid'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                            <a href="printadminreserve.php?resident='.$row['residentid'].'&adminreserve='.$row['reserve_no'].'&val='.sha1($row['reserve_no'].'|'.$row['fullname'].'|'.$row['date']).'" onclick="location.reload();" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Print</a></td>
                                                        </tr>
                                                        ';

                                                        include "editreserve_modal.php";
                                                    }
                                                }
                                                else{
                                                    $squery = mysqli_query($con, "SELECT *,CONCAT(rr.lname, ', ' ,rr.fname, ' ' ,rr.mname) as residentname,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'Approved'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="deleteModalreserve[]" class="deleteModalreserve" value="'.$row['crid'].'" /></td>
                                                            <td>'.$row['reserve_no'].'</td>
                                                            <td>'.$row['title'].'</td>
                                                            <td>'.$row['description'].'</td>
                                                            <td>'.$row['startdate'].'</td>
                                                            <td>'.$row['enddate'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                            <td><button class="btn btn-primary btn-sm" data-target="#editreserveModal'.$row['crid'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                            <a href="printreserve.php?resident='.$row['residentid'].'&reserve='.$row['reserve_no'].'&val='.sha1($row['reserve_no'].'|'.$row['residentname'].'|'.$row['date']).'" onclick="location.reload();" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Print</a></td>
                                                            </td>
                                                        </tr>
                                                        ';

                                                        include "editreserve_modal.php";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        </div>

                                        <div id="disapproved" class="tab-pane">
                                        <table id="table1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <?php 
                                                        if(!isset($_SESSION['staff']))
                                                        {
                                                    ?>
                                                    <th style="width: 20px !important;"><input type="checkbox" name="deleteModalreserve[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                    <?php
                                                        }
                                                    ?>
                                                    <th>Full Name</th>
                                                    <th>Request Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!isset($_SESSION['staff']))
                                                {

                                                    $squery = mysqli_query($con, "SELECT *,CONCAT(rr.lname, ', ' ,rr.fname, ' ' ,rr.mname) as residentname,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'Disapproved'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="deleteModalreserve[]" class="deleteModalreserve" value="'.$row['crid'].'" /></td>
                                                            <td>'.$row['fullname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['status'].'</td>
                                                        </tr>
                                                        ';

                                                        include "editreserve_modal.php";
                                                    }
                                                }
                                                else{
                                                    $squery = mysqli_query($con, "SELECT *,CONCAT(rr.lname, ', ' ,rr.fname, ' ' ,rr.mname) as residentname,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'Disapproved'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="deleteModalreserve[]" class="deleteModalreserve" value="'.$row['crid'].'" /></td>
                                                            <td>'.$row['fullname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['status'].'</td>
                                                        </tr>
                                                        ';

                                                        include "editreserve_modal.php";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        </div>


                                        </div>
                                    <?php include "deletereserve_modal.php"; ?>

                                    </form>

                                </div><!-- /.box-body -->
                                <?php include "adminreservation.php";?>
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>

            <?php include "add_modal.php"; ?>

            <?php include "function.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>