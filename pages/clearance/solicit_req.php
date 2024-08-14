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
                        Solicitation Request
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adminsolicit"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Solicitation</button>

                                        <?php 
                                            if(!isset($_SESSION['staff']))
                                            {
                                        ?>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModalsol"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 
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
                                                    <th style="width: 20px !important;"><input type="checkbox" name="chk_deletesolicit[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                    <?php
                                                        }
                                                    ?>
                                                    <th>Solicit No.</th>
                                                    <th>Date Issued</th>
                                                    <th>Full Name</th>
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

                                                    $squery2 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid  where status = 'Approved' and s.residentid = rs.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery2))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="chk_deletesolicit[]" class="chk_deletesolicit" value="'.$row['s_id'].'" /></td>
                                                            <td>'.$row['solicit_no'].'</td>
                                                            <td>'.$row['date'].'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                            <td><button class="btn btn-primary btn-sm" data-target="#editsolicit'.$row['s_id'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                            <a href="printsolicit.php?resident='.$row['residentid'].'&solicit='.$row['solicit_no'].'&val='.base64_encode($row['solicit_no'].'|'.$row['residentname'].'|'.$row['date']).'" onclick="location.reload();" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Print</a></td>
                                                        </tr>
                                                        ';

                                                        include "editsolicit_modal.php";
                                                    }
                                                    
                                                    
                                                    $squery2 = mysqli_query($con, "SELECT *,s.id as s_id FROM tblsolicit s where status = 'Approved' and s.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery2))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="chk_deletesolicit[]" class="chk_deletesolicit" value="'.$row['s_id'].'" /></td>
                                                            <td>'.$row['solicit_no'].'</td>
                                                            <td>'.$row['date'].'</td>
                                                            <td>'.$row['fname'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                            <td><button class="btn btn-primary btn-sm" data-target="#editsolicit'.$row['s_id'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                            <a href="printadminsolicit.php?resident='.$row['residentid'].'&adminsolicit='.$row['solicit_no'].'&val='.base64_encode($row['solicit_no'].'|'.$row['fname'].'|'.$row['date']).'" onclick="location.reload();" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Print</a></td>
                                                        </tr>
                                                        ';

                                                        include "editsolicit_modal.php";
                                                    }
                                                }
                                                else{
                                                    $squery2 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid  where status = 'Approved' and s.residentid = rs.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery2))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$row['solicit_no'].'</td>
                                                            <td>'.$row['date'].'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                            <td><button class="btn btn-primary btn-sm" data-target="#editsolicit'.$row['s_id'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                            <a href="printsolicit.php?resident='.$row['residentid'].'&solicit='.$row['solicit_no'].'&val='.sha1($row['solicit_no'].'|'.$row['residentname'].'|'.$row['date']).'" onclick="location.reload();" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Print</a></td>
                                                        </tr>
                                                        ';

                                                        include "editsolicit_modal.php";
                                                    }
                                                    
                                                    $squery2 = mysqli_query($con, "SELECT *,s.id as s_id FROM tblsolicit s where status = 'Approved' and s.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery2))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="chk_deletesolicit[]" class="chk_deletesolicit" value="'.$row['s_id'].'" /></td>
                                                            <td>'.$row['solicit_no'].'</td>
                                                            <td>'.$row['date'].'</td>
                                                            <td>'.$row['fname'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                            <td><button class="btn btn-primary btn-sm" data-target="#editsolicit'.$row['s_id'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                            <a href="printadminsolicit.php?resident='.$row['residentid'].'&adminsolicit='.$row['solicit_no'].'&val='.base64_encode($row['solicit_no'].'|'.$row['fname'].'|'.$row['date']).'" onclick="location.reload();" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Print</a></td>
                                                        </tr>
                                                        ';

                                                        include "editsolicit_modal.php";
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
                                                    <th style="width: 20px !important;"><input type="checkbox" name="chk_deletesolicit[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                    <?php
                                                        }
                                                    ?>
                                                    <th>Resident Name</th>
                                                    <th>Request Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!isset($_SESSION['staff']))
                                                {

                                                    $squery2 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid where status = 'Disapproved' ") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery2))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="chk_deletesolicit[]" class="chk_deletesolicit" value="'.$row['s_id'].'" /></td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['status'].'</td>
                                                        </tr>
                                                        ';

                                                        include "editsolicit_modal.php";
                                                    }
                                                }
                                                else{
                                                    $squery2 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid where status = 'Disapproved' ") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery2))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['status'].'</td>
                                                        </tr>
                                                        ';

                                                        include "editsolicit_modal.php";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        </div>


                                        </div>
                                    <?php include "deletesolicit_modal.php"; ?>

                                    </form>

                                </div><!-- /.box-body -->
                                <?php include "adminsolicit.php"; ?>
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