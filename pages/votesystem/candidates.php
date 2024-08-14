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
                        Candidates
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <!-- Main content -->
                                  <section class="content">
                                    <?php
                                      if(isset($_SESSION['error'])){
                                        echo "
                                          <div class='alert alert-danger alert-dismissible'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                            ".$_SESSION['error']."
                                          </div>
                                        ";
                                        unset($_SESSION['error']);
                                      }
                                      if(isset($_SESSION['success'])){
                                        echo "
                                          <div class='alert alert-success alert-dismissible'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <h4><i class='icon fa fa-check'></i> Success!</h4>
                                            ".$_SESSION['success']."
                                          </div>
                                        ";
                                        unset($_SESSION['success']);
                                      }
                                    ?>
                                    <div class="row">
                                      <div class="col-xs-12">
                                        <div class="box">
                                          <div class="box-header with-border">
                                            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                                          </div>
                                          <div class="box-body">
                                            <table id="example1" class="table table-bordered">
                                              <thead>
                                                <th class="hidden"></th>
                                                <th>Position</th>
                                                <th>Photo</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Platform</th>
                                                <th>Tools</th>
                                              </thead>
                                              <tbody>
                                                <?php
                                                  $sql = "SELECT *, candidates.id AS canid FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id ORDER BY positions.priority ASC";
                                                  $query = $con->query($sql);
                                                  while($row = $query->fetch_assoc()){
                                                    $image = (!empty($row['photo'])) ? './images/'.$row['photo'] : './images/profile.jpg';
                                                    echo "
                                                      <tr>
                                                        <td class='hidden'></td>
                                                        <td>".$row['description']."</td>
                                                        <td>
                                                          <img src='".$image."' width='30px' height='30px'>
                                                          <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='".$row['canid']."'><span class='fa fa-edit'></span></a>
                                                        </td>
                                                        <td>".$row['firstname']."</td>
                                                        <td>".$row['lastname']."</td>
                                                        <td><a href='#platform' data-toggle='modal' class='btn btn-info btn-sm btn-flat platform' data-id='".$row['canid']."'><i class='fa fa-search'></i> View</a></td>
                                                        <td>
                                                          <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['canid']."'><i class='fa fa-edit'></i> Edit</button>
                                                          <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['canid']."'><i class='fa fa-trash'></i> Delete</button>
                                                        </td>
                                                      </tr>
                                                    ";
                                                  }
                                                ?>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>   
                                </div>
                                 
                                <?php include 'includes/candidates_modal.php'; ?>
                              </div>
                              <?php include 'includes/scripts.php'; ?>
                              <script>
                              $(function(){
                                $(document).on('click', '.edit', function(e){
                                  e.preventDefault();
                                  $('#edit').modal('show');
                                  var id = $(this).data('id');
                                  getRow(id);
                                });

                                $(document).on('click', '.delete', function(e){
                                  e.preventDefault();
                                  $('#delete').modal('show');
                                  var id = $(this).data('id');
                                  getRow(id);
                                });

                                $(document).on('click', '.photo', function(e){
                                  e.preventDefault();
                                  var id = $(this).data('id');
                                  getRow(id);
                                });

                                $(document).on('click', '.platform', function(e){
                                  e.preventDefault();
                                  var id = $(this).data('id');
                                  getRow(id);
                                });

                              });

                              function getRow(id){
                                $.ajax({
                                  type: 'POST',
                                  url: 'candidates_row.php',
                                  data: {id:id},
                                  dataType: 'json',
                                  success: function(response){
                                    $('.id').val(response.canid);
                                    $('#edit_firstname').val(response.firstname);
                                    $('#edit_lastname').val(response.lastname);
                                    $('#posselect').val(response.position_id).html(response.description);      
                                    $('#edit_platform').val(response.platform);
                                    $('.fullname').html(response.firstname+' '+response.lastname);
                                    $('#desc').html(response.platform);
                                  }
                                });
                              }
                              </script>
                            </div><!-- /.box -->
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