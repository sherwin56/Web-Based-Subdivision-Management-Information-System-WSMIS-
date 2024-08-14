<!DOCTYPE html>
<html>
<style>
    .box a{
        cursor: pointer;
        color: #6386e6;
        background-color: aqua;
    }
    .box a:hover{
        color:blue;
        background-color: #5074d5;
    }
</style>
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
                        Services
                    </h1>
                    
                </section>
            <section class="content">
            
                <div class="row">
                        <!-- left column -->
                        <div class="box">
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                
                                <?php
                                    $squery = mysqli_query($con, "SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname FROM tblresident where id = '".$_SESSION['userid']."' order by zone");
                                    while($row = mysqli_fetch_array($squery))
                                      {
                                          echo'
                                            <a  data-toggle="modal" data-target="#reqbuilding'.$row['id'].'">
                                              <div class="info-box">
                                                <span class="info-box-icon"><i class="fa fa-file-text"></i></span>
                                                
                                                <div class="info-box-content" style="display: flex; aligh-items: center;">
                                                  <div class="text" style="margin-top: 25px; font-weight: bold"><span class="info-box-text">CONSTRUCTION BOND</span></div>
                                                </div>
                                                <!-- /.info-box-content -->
                                              </div>
                                              <!-- /.info-box -->
                                            </div>
                                            </a>
                                          ';
                                          include "buildingpermit.php";
                                      }
                                ?>

                                <?php
                                    $squery = mysqli_query($con, "SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname FROM tblresident where id = '".$_SESSION['userid']."' order by zone");
                                    while($row = mysqli_fetch_array($squery))
                                    {
                                        echo'
                                            <a  data-toggle="modal" data-target="#reqmemorandum'.$row['id'].'">
                                            <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                                <div class="info-box">
                                                <span class="info-box-icon"><i class="fa fa-file-text"></i></span>
                                                
                                                <div class="info-box-content" style="display: flex; aligh-items: center;">
                                                  <div class="text" style="margin-top: 25px; font-weight: bold"><span class="info-box-text">MEMORANDUM REQUEST</span></div>
                                                </div>
                                                <!-- /.info-box-content -->
                                              </div>
                                              <!-- /.info-box -->
                                            </div>
                                            </a>
                                        '; 
                                        include "memorandum.php";
                                    }
                                ?>

                                <?php
                                    $squery = mysqli_query($con, "SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname FROM tblresident where id = '".$_SESSION['userid']."' order by zone");
                                    while($row = mysqli_fetch_array($squery))
                                    {
                                      echo '
                                        <a  data-toggle="modal" data-target="#reqsticker'.$row['id'].'">
                                        <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                            <div class="info-box">
                                            <span class="info-box-icon"><i class="fa fa-car"></i></span>
        
                                            <div class="info-box-content" style="display: flex; aligh-items: center;">
                                              <div class="text" style="margin-top: 25px; font-weight: bold"><span class="info-box-text">CAR STICKER</span></div>
                                            </div>
                                            <!-- /.info-box-content -->
                                          </div>
                                          <!-- /.info-box -->
                                        </div>
                                        </a>
                                      ';
                                      include "sticker.php";
                                    }
                                    
                                  ?>

                                <?php
                                    $squery = mysqli_query($con, "SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname, age, gender, image FROM tblresident where id = '".$_SESSION['userid']."' order by zone");
                                    while($row = mysqli_fetch_array($squery))
                                    {
                                      echo'
                                        <a  data-toggle="modal" data-target="#reqID'.$row['id'].'">
                                        <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                          <div class="info-box">
                                          <span class="info-box-icon"><i class="fa fa-user"></i></span>
                                          
                                          <div class="info-box-content" style="display: flex; aligh-items: center;">
                                            <div class="text" style="margin-top: 25px; font-weight: bold"><span class="info-box-text">ID APPLICATION</span></div>
                                          </div>
                                          <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                        </div>
                                        </a>
                                      ';
                                      
                                    include "idapplication.php";
                                    }
                                ?>

                               <?php
                                    $squery = mysqli_query($con, "SELECT zone,relationtohead,id,CONCAT(lname, ', ', fname, ' ', mname) as cname FROM tblresident where id = '".$_SESSION['userid']."' order by zone");
                                    while($row = mysqli_fetch_array($squery))
                                    {
                                        echo'

                                            <a  data-toggle="modal" data-target="#reqsolicit'.$row['id'].'">
                                            <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                                <div class="info-box">
                                                <span class="info-box-icon"><i class="fa fa-file-text"></i></span>
                                                
                                                <div class="info-box-content" style="display: flex; aligh-items: center;">
                                                  <div class="text" style="margin-top: 25px; font-weight: bold"><span class="info-box-text">SOLICITATION FORM</span></div>
                                                </div>
                                                <!-- /.info-box-content -->
                                              </div>
                                              <!-- /.info-box -->
                                            </div>
                                            </a>
                                        ';
                                        include "solicit.php";
                                    }
                                      
                                ?>
                                
                                <?php
                                    $squery = mysqli_query($con, "SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname FROM tblresident where id = '".$_SESSION['userid']."' order by zone");
                                    while($row = mysqli_fetch_array($squery))
                                    {
                                      echo '
                                        <a  data-toggle="modal" data-target="#reqmonthly'.$row['id'].'">
                                        <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                            <div class="info-box">
                                            <span class="info-box-icon"><i class="fa fa-calendar-check-o"></i></span>
        
                                            <div class="info-box-content" style="display: flex; aligh-items: center;">
                                              <div class="text" style="margin-top: 25px; font-weight: bold"><span class="info-box-text">Monthly Dues</span></div>
                                            </div>
                                            <!-- /.info-box-content -->
                                          </div>
                                          <!-- /.info-box -->
                                        </div>
                                        </a>
                                      ';
                                      include "monthly.php";
                                    }

                                ?>
                                
                                <?php
                                    $squery = mysqli_query($con, "SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname FROM tblresident where id = '".$_SESSION['userid']."' order by zone");
                                    while($row = mysqli_fetch_array($squery))
                                    {
                                      echo '
                                        <a  data-toggle="modal" data-target="#reqreserve'.$row['id'].'">
                                        <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                            <div class="info-box">
                                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
        
                                            <div class="info-box-content" style="display: flex; aligh-items: center;">
                                              <div class="text" style="margin-top: 25px; font-weight: bold"><span class="info-box-text">Clubhouse Reservation</span></div>
                                            </div>
                                            <!-- /.info-box-content -->
                                          </div>
                                          <!-- /.info-box -->
                                        </div>
                                        </a>
                                      ';
                                      include "reservation.php";
                                    }

                                ?>

                                <?php
                                    include "../added_notif.php";
                                    include "../duplicate_error.php";
                                    include "lengthstay_error.php";
                                    include "req_modal.php";
                                     include "function.php";
                                      ?>
                       <!-- /.row -->
                </div>
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