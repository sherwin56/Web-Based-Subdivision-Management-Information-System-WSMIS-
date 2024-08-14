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
                        Pending Requests
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="tab-pane active in">
                                <form method="post">                                    
                                <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Full Name</th>
                                                    <th>Request Type</th>
                                                    <th>Payment</th>
                                                    <th>Reference No.</th>
                                                    <th style="width: 25% !important;">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $squery = mysqli_query($con, "SELECT *,CONCAT(r.lname, ', ' ,r.fname, ' ' ,r.mname) as residentname,p.id as pid FROM tblbuilding p left join tblresident r on r.id = p.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            
                                                            <td>'.$row['ownername'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>
                                                                <button class="btn btn-success btn-sm" data-target="#approveModal'.$row['pid'].'" data-toggle="modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
                                                                <button class="btn btn-danger btn-sm" data-target="#disapproveModal'.$row['pid'].'" data-toggle="modal"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disapprove</button>
                                                            </td>
                                                        </tr>
                                                        ';
                                                        include "approve_modal.php";
                                                        include "disapprove_modal.php";     
                                                    }
                                                
                                                $squery2 = mysqli_query($con, "SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid FROM tblmemo m left join tblresident rm on rm.id = m.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery2))
                                                    {
                                                        echo '
                                                        <tr>
                                                            
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>
                                                                <button class="btn btn-success btn-sm" data-target="#approvememoModal'.$row['mid'].'" data-toggle="modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
                                                                <button class="btn btn-danger btn-sm" data-target="#disapprovememoModal'.$row['mid'].'" data-toggle="modal"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disapprove</button>
                                                            </td>
                                                        </tr>
                                                        ';
                                                        include "approvememo_modal.php";
                                                        include "disapprovememo_modal.php";
                                                    }
                                                
                                                    $squery3 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid where status = 'New' ") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery3))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>
                                                                    <button class="btn btn-success btn-sm" data-target="#approvesolicitModal'.$row['s_id'].'" data-toggle="modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
                                                                    <button class="btn btn-danger btn-sm" data-target="#disapprovesolicitModal'.$row['s_id'].'" data-toggle="modal"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disapprove</button>
                                                                </td>
                                                            </tr>
                                                            ';
                                                            include "approvesolicit_modal.php";
                                                            include "disapprovesolicit_modal.php";
                                                        }

                                                        $squery4 = mysqli_query($con, "SELECT *,CONCAT(ri.lname, ', ' ,ri.fname, ' ' ,ri.mname) as residentname,i.id as iid FROM tblid i left join tblresident ri on ri.id = i.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery4))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>
                                                                    <button class="btn btn-success btn-sm" data-target="#approveIDModal'.$row['iid'].'" data-toggle="modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
                                                                    <button class="btn btn-danger btn-sm" data-target="#disapproveIDModal'.$row['iid'].'" data-toggle="modal"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disapprove</button>
                                                                </td>
                                                            </tr>
                                                            ';
                                                            include "approveid_modal.php";
                                                            include "disapproveid_modal.php";
                                                        }

                                                        $squery5 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblsticker c left join tblresident rc on rc.id = c.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery5))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>
                                                                    <button class="btn btn-success btn-sm" data-target="#approvestickerModal'.$row['cid'].'" data-toggle="modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
                                                                    <button class="btn btn-danger btn-sm" data-target="#disapprovestickerModal'.$row['cid'].'" data-toggle="modal"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disapprove</button>
                                                                </td>
                                                            </tr>
                                                            ';
                                                            include "approvesticker_modal.php";
                                                            include "disapprovesticker_modal.php";
                                                        }

                                                        $squery6 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblmonthly c left join tblresident rc on rc.id = c.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery6))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>
                                                                    <button class="btn btn-success btn-sm" data-target="#approvemonthlyModal'.$row['cid'].'" data-toggle="modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
                                                                    <button class="btn btn-danger btn-sm" data-target="#disapprovemonthlyModal'.$row['cid'].'" data-toggle="modal"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disapprove</button>
                                                                </td>
                                                            </tr>
                                                            ';
                                                            include "approvemonthly_modal.php";
                                                            include "disapprovemonthly_modal.php";
                                                        }

                                                        $squery7 = mysqli_query($con, "SELECT *,CONCAT(rr.lname, ', ' ,rr.fname, ' ' ,rr.mname) as residentname,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery7))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['fullname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>
                                                                    <button class="btn btn-success btn-sm" data-target="#approvereserveModal'.$row['crid'].'" data-toggle="modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
                                                                    <button class="btn btn-danger btn-sm" data-target="#disapprovereserveModal'.$row['crid'].'" data-toggle="modal"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disapprove</button>
                                                                </td>
                                                            </tr>
                                                            ';
                                                            include "approvereserve_modal.php";
                                                            include "disapprovereserve_modal.php";
                                                        }
                                                ?>
                                            </tbody>
                                        </table>
                                            
                                </form>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                    <?php include "function.php"; ?>

                    <?php include "../added_notif.php"; ?>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <?php include "notif_modal.php";?>
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