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
    <head>
        <title> Revenue Records</title>
        <style>
            .btn{
                left: 20%;
                color: #fff;
                background-color: #3c76ba;
            }

            .btn:hover{
                color: #fff;
                background-color: #1e428b
            }
        </style>
    </head>
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
                                <div class="box-header">
                                    <div>

                                        <?php 
                                            if(!isset($_SESSION['staff']))
                                            {
                                        ?>
                                        <?php
                                            }
                                        ?>
                                
                                    </div>                                
                                </div><!-- /.box-header -->
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
                                                    <?php
                                                        }
                                                    ?>
                                                    <th>Date</th>
                                                    <th>Full Name</th>
                                                    <th>Service Type</th>
                                                    <th>Payment</th>
                                                    <th>Reference No.</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                if(!isset($_SESSION['staff']))
                                                {

                                                    $squery = mysqli_query($con, "SELECT *,CONCAT(r.lname, ', ' ,r.fname, ' ' ,r.mname) as residentname,p.id as pid FROM tblbuilding p left join tblresident r on r.id = p.residentid  where status = 'Approved' and p.residentid = r.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        $date = date_create($row['date']);
                                                        echo '
                                                        <tr>
                                                            <td>'.(date_format($date,"F j, o")).'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                        </tr>
                                                        ';
                                                        }

                                                        $squery = mysqli_query($con, "SELECT *, p.id as pid FROM tblbuilding p where status = 'Approved' and p.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['ownername'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }

                                                        $squery2 = mysqli_query($con, "SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid FROM tblmemo m left join tblresident rm on rm.id = m.residentid  where status = 'Approved' and m.residentid = rm.id") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery2))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>   
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery2 = mysqli_query($con, "SELECT *, m.id as mid FROM tblmemo m where status = 'Approved' and m.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery2))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>   
                                                                <td>'.$row['fname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }

                                                        $squery3 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid where status = 'Approved' and s.residentid = rs.id") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery3))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery3 = mysqli_query($con, "SELECT *,s.id as s_id FROM tblsolicit s where status = 'Approved' and s.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery3))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['fname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }

                                                        $squery4 = mysqli_query($con, "SELECT *,CONCAT(ri.lname, ', ' ,ri.fname, ' ' ,ri.mname) as residentname,i.id as iid FROM tblid i left join tblresident ri on ri.id = i.residentid  where status = 'Approved'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery4))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery5 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblsticker c left join tblresident rc on rc.id = c.residentid  where status = 'Approved'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery5))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        
                                                        $squery6 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblmonthly c left join tblresident rc on rc.id = c.residentid  where status = 'Approved'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery6))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        
                                                    $squery7 = mysqli_query($con, "SELECT *,CONCAT(rr.lname, ', ' ,rr.fname, ' ' ,rr.mname) as residentname,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'Approved' and cr.residentid = rr.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery7))
                                                    {
                                                        $date = date_create($row['date']);
                                                        echo '
                                                        <tr>
                                                            <td>'.(date_format($date,"F j, o")).'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                        </tr>
                                                        ';
                                                    }

                                                    $squery7 = mysqli_query($con, "SELECT *,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'Approved' and cr.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery7))
                                                    {
                                                        $date = date_create($row['date']);
                                                        echo '
                                                        <tr>
                                                            <td>'.(date_format($date,"F j, o")).'</td>
                                                            <td>'.$row['fullname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                        </tr>
                                                        ';
                                                    }
                                                     $squery8 = mysqli_query($con, "SELECT *,CONCAT(r.lname, ', ' ,r.fname, ' ' ,r.mname) as residentname,p.id as pid FROM tblbuilding p left join tblresident r on r.id = p.residentid  where status = 'Disapproved' and p.residentid = r.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery8))
                                                    {
                                                        $date = date_create($row['date']);
                                                        echo '
                                                        <tr>
                                                            <td>'.(date_format($date,"F j, o")).'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                        </tr>
                                                        ';
                                                        }

                                                    $squery8 = mysqli_query($con, "SELECT *, p.id as pid FROM tblbuilding p where status = 'Disapproved' and p.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery8))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['ownername'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                    $squery9 = mysqli_query($con, "SELECT *,CONCAT(r.lname, ', ' ,r.fname, ' ' ,r.mname) as residentname,p.id as pid FROM tblbuilding p left join tblresident r on r.id = p.residentid  where status = 'New' and p.residentid = r.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery9))
                                                    {
                                                        $date = date_create($row['date']);
                                                        echo '
                                                        <tr>
                                                            <td>'.(date_format($date,"F j, o")).'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                        </tr>
                                                        ';
                                                        }

                                                    $squery9 = mysqli_query($con, "SELECT *, p.id as pid FROM tblbuilding p where status = 'New' and p.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery9))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['ownername'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td> 
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery10 = mysqli_query($con, "SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid FROM tblmemo m left join tblresident rm on rm.id = m.residentid  where status = 'Disapproved' and m.residentid = rm.id") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery10))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['date'].'</td>   
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                                
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery10 = mysqli_query($con, "SELECT *, m.id as mid FROM tblmemo m where status = 'Disapproved' and m.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery10))
                                                        {
                                                            echo '
                                                            <tr>
                                                            
                                                                <td>'.$row['date'].'</td>   
                                                                <td>'.$row['fname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                                
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery11 = mysqli_query($con, "SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid FROM tblmemo m left join tblresident rm on rm.id = m.residentid  where status = 'New' and m.residentid = rm.id") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery11))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['date'].'</td>   
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                                
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery11 = mysqli_query($con, "SELECT *, m.id as mid FROM tblmemo m where status = 'New' and m.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery11))
                                                        {
                                                            echo '
                                                            <tr>
                                                            
                                                                <td>'.$row['date'].'</td>   
                                                                <td>'.$row['fname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                                
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery12 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid where status = 'Disapproved' and s.residentid = rs.id") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery12))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                                
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery12 = mysqli_query($con, "SELECT *,s.id as s_id FROM tblsolicit s where status = 'Disapproved' and s.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery12))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['fname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                                
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery12 = mysqli_query($con, "SELECT *,CONCAT(rs.lname, ', ' ,rs.fname, ' ' ,rs.mname) as residentname,s.id as s_id FROM tblsolicit s left join tblresident rs on rs.id = s.residentid where status = 'New' and s.residentid = rs.id") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery12))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                                
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery12 = mysqli_query($con, "SELECT *,s.id as s_id FROM tblsolicit s where status = 'New' and s.residentid = '0'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery12))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['fname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                                
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery13 = mysqli_query($con, "SELECT *,CONCAT(ri.lname, ', ' ,ri.fname, ' ' ,ri.mname) as residentname,i.id as iid FROM tblid i left join tblresident ri on ri.id = i.residentid  where status = 'Dispproved'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery13))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery13 = mysqli_query($con, "SELECT *,CONCAT(ri.lname, ', ' ,ri.fname, ' ' ,ri.mname) as residentname,i.id as iid FROM tblid i left join tblresident ri on ri.id = i.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery13))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';  
                                                        }
                                                $squery14 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblsticker c left join tblresident rc on rc.id = c.residentid  where status = 'Disapproved'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery14))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery14 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblsticker c left join tblresident rc on rc.id = c.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery14))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        
                                                        $squery15 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblmonthly c left join tblresident rc on rc.id = c.residentid  where status = 'Dispproved'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery15))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        $squery15 = mysqli_query($con, "SELECT *,CONCAT(rc.lname, ', ' ,rc.fname, ' ' ,rc.mname) as residentname,c.id as cid FROM tblmonthly c left join tblresident rc on rc.id = c.residentid  where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery15))
                                                        {
                                                            $date = date_create($row['date']);
                                                            echo '
                                                            <tr>
                                                                <td>'.(date_format($date,"F j, o")).'</td>
                                                                <td>'.$row['residentname'].'</td>
                                                                <td>'.$row['req_type'].'</td>
                                                                <td>'.$row['payment'].'</td>
                                                                <td>'.$row['ref_no'].'</td>
                                                                <td>₱'.$row['amount'].'</td>
                                                                <td> '.$row['status'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                        
                                                    $squery16 = mysqli_query($con, "SELECT *,CONCAT(rr.lname, ', ' ,rr.fname, ' ' ,rr.mname) as residentname,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'Dispproved' and cr.residentid = rr.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery16))
                                                    {
                                                        $date = date_create($row['date']);
                                                        echo '
                                                        <tr>
                                                            <td>'.(date_format($date,"F j, o")).'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                        </tr>
                                                        ';
                                                    }
                                                     $squery16 = mysqli_query($con, "SELECT *,CONCAT(rr.lname, ', ' ,rr.fname, ' ' ,rr.mname) as residentname,cr.id as crid FROM tblreserve cr left join tblresident rr on rr.id = cr.residentid  where status = 'New' and cr.residentid = rr.id") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery16))
                                                    {
                                                        $date = date_create($row['date']);
                                                        echo '
                                                        <tr>
                                                            <td>'.(date_format($date,"F j, o")).'</td>
                                                            <td>'.$row['residentname'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['payment'].'</td>
                                                            <td>'.$row['ref_no'].'</td>
                                                            <td>₱'.$row['amount'].'</td>
                                                            <td> '.$row['status'].'</td>
                                                        </tr>
                                                        ';
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
                                                    <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
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

                                                    $squery = mysqli_query($con, "SELECT *,CONCAT(r.lname, ', ' ,r.fname, ' ' ,r.mname) as residentname,p.id as pid FROM tblbuilding p left join tblresident r on r.id = p.residentid where status = 'Disapproved' ") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['pid'].'" /></td>
                                                            <td>'.$row['ownername'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['status'].'</td>
                                                        </tr>
                                                        ';

                                                        include "edit_modal.php";
                                                    }
                                                }
                                                else{
                                                    $squery = mysqli_query($con, "SELECT *,CONCAT(r.lname, ', ' ,r.fname, ' ' ,r.mname) as residentname,p.id as pid FROM tblbuilding p left join tblresident r on r.id = p.residentid where status = 'Disapproved' ") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$row['ownername'].'</td>
                                                            <td>'.$row['req_type'].'</td>
                                                            <td>'.$row['status'].'</td>
                                                        </tr>
                                                        ';

                                                        include "edit_modal.php";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        </div>


                                        </div>
                                    <?php include "../deleteModal.php"; ?>

                                    </form>

                                </div><!-- /.box-body -->

                                <?php include "adminbuildingpermit.php"; ?>
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
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/datatables.min.js"></script>
        <script src="assets/js/pdfmake.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>