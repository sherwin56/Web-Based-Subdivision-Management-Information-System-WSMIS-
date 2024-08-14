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
                        Revenue Records
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                        <!-- left column -->
                            <div class="box">
                                
                                <div class="box-body table-responsive">
                                
                                <form method="post">                                        
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Resident Name</th>
                                                    <th>Request Type</th>
                                                    <th>Payment</th>
                                                    <th>Reference No.</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $squery = mysqli_query($con, "SELECT *,CONCAT(r.lname, ', ' ,r.fname, ' ' ,r.mname) as residentname,p.id as pid FROM tblbuilding p left join tblresident r on r.id = p.residentid  where status = 'Approved'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$row['date'].'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                        </tr>
                                                        ';    
                                                    }
                                                
                                                $squery2 = mysqli_query($con, "SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid FROM tblmemo m left join tblresident rm on rm.id = m.residentid  where status = 'Approved'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery2))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$row['date'].'</td>   
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                        </tr>
                                                        ';
                                                    }
                                                
                                                    $squery3 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid where status = 'Approved' ") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery3))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                            </tr>
                                                            ';
                                                            include "approvesolicit_modal.php";
                                                            include "disapprovesolicit_modal.php";
                                                        }

                                                        $squery4 = mysqli_query($con, "SELECT *,CONCAT(ri.lname, ', ' ,ri.fname, ' ' ,ri.mname) as residentname,i.id as iid FROM tblid i left join tblresident ri on ri.id = i.residentid  where status = 'Approved'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery4))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery5 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblsticker c left join tblresident rc on rc.id = c.residentid  where status = 'Approved'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery5))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                            </tr>
                                                            ';
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