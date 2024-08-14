<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">

<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Resident Information</h4>
        </div>
        <div class="modal-body">';

        $edit_query = mysqli_query($con,"SELECT * from tblresident where id = '".$row['id']."' ");
        $erow = mysqli_fetch_array($edit_query);

        echo '
            <div class="row">
                <div class="container-fluid">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">

                        <input type="hidden" value="'.$erow['id'].'" name="hidden_id" id="hidden_id"/>
                            <label class="control-label">Name:</label><br>
                            <div class="col-sm-4">
                                <input name="txt_edit_lname" class="form-control input-sm col-sm-4" type="text" value="'.$erow['lname'].'"/>
                            </div> 
                            <div class="col-sm-4">
                                <input name="txt_edit_fname" class="form-control input-sm col-sm-4" type="text" value="'.$erow['fname'].'"/>
                            </div> 
                            <div class="col-sm-4">
                                <input name="txt_edit_mname" class="form-control input-sm col-sm-4" type="text" value="'.$erow['mname'].'"/>
                            </div> <br>
                        </div>

                        <div class="form-group">
                            <label class="control-label" style="margin-top:10px;">Birthdate:</label>
                            <input name="txt_edit_bdate" class="form-control input-sm input-size" type="date" value="'.$erow['bdate'].'"/> 
                        </div>

                        <div class="form-group">
                            <label class="control-label">Civil Status:</label>
                            <select name="txt_edit_cstatus" class="form-control input-sm input-size">
                                <option value="'.$erow['civilstatus'].'" disable selected hidden >'.$erow['civilstatus'].'</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label class="control-label">House & Land Ownership Status:</label>
                            <select name="ddl_edit_los" class="form-control input-sm input-size">
                                <option value="'.$erow['landOwnershipStatus'].'" disable selected hidden >'.$erow['landOwnershipStatus'].'</option>
                                <option>Owned</option>
                                <option>Tenant</option>
                                <option>Care Taker</option>
                                <option value="Live with Parents/Relatives">Live with Parents/Relatives</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Email Address:</label>
                            <input name="txt_edit_eadd" class="form-control input-sm input-size" type="text" value="'.$erow['emailaddress'].'" required/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Move In Date:</label>
                            <input name="txt_edit_indate" class="form-control input-sm input-size" type="date" value="'.$erow['moveindate'].'" required/>
                        </div>                   
                        
                        <div class="form-group">
                            <label class="control-label">Username:</label>
                            <input name="txt_edit_uname" class="form-control input-sm input-size" type="text" value="'.$erow['username'].'"/>
                        </div>

                    </div>


                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Gender:</label>
                            <select name="ddl_edit_gender" class="form-control input-sm">
                                <option value="'.$erow['gender'].'" disable selected hidden >'.$erow['gender'].'</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Birthplace:</label>
                            <input name="txt_edit_bplace" class="form-control input-sm" type="text" value="'.$erow['bplace'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Address:</label>
                            <select name="txt_edit_zone" class="form-control input-sm input-size">
                            <option value="'.$erow['zone'].'" disable selected hidden >'.$erow['zone'].'</option>
                            <option value="BLK A1 LOT1">BLK A1 LOT1</option>
                            <option value="BLK A1 LOT2">BLK A1 LOT2</option>
                            <option value="BLK A1 LOT3">BLK A1 LOT3</option>
                            <option value="BLK A1 LOT4">BLK A1 LOT4</option>
                            <option value="BLK A1 LOT5">BLK A1 LOT5</option>
                            <option value="BLK A2 LOT1">BLK A2 LOT1</option>
                            <option value="BLK A2 LOT2">BLK A2 LOT2</option>
                            <option value="BLK A2 LOT3">BLK A2 LOT3</option>
                            <option value="BLK A2 LOT4">BLK A2 LOT4</option>
                            <option value="BLK A2 LOT5">BLK A2 LOT5</option>
                            <option value="BLK B1 LOT1">BLK B1 LOT1</option>
                            <option value="BLK B1 LOT2">BLK B1 LOT2</option>
                            <option value="BLK B1 LOT3">BLK B1 LOT3</option>
                            <option value="BLK B1 LOT4">BLK B1 LOT4</option>
                            <option value="BLK B1 LOT5">BLK B1 LOT5</option>
                            <option value="BLK B2 LOT1">BLK B2 LOT1</option>
                            <option value="BLK B2 LOT2">BLK B2 LOT2</option>
                            <option value="BLK B2 LOT3">BLK B2 LOT3</option>
                            <option value="BLK B2 LOT4">BLK B2 LOT4</option>
                            <option value="BLK B2 LOT5">BLK B2 LOT5</option>
                            <option value="BLK C1 LOT1">BLK C1 LOT1</option>
                            <option value="BLK C1 LOT2">BLK C1 LOT2</option>
                            <option value="BLK C1 LOT3">BLK C1 LOT3</option>
                            <option value="BLK C1 LOT4">BLK C1 LOT4</option>
                            <option value="BLK C1 LOT5">BLK C1 LOT5</option>
                            <option value="BLK C2 LOT1">BLK C2 LOT1</option>
                            <option value="BLK C2 LOT2">BLK C2 LOT2</option>
                            <option value="BLK C2 LOT3">BLK C2 LOT3</option>
                            <option value="BLK C2 LOT4">BLK C2 LOT4</option>
                            <option value="BLK C2 LOT5">BLK C2 LOT5</option>
                            <option value="BLK D1 LOT1">BLK D1 LOT1</option>
                            <option value="BLK D1 LOT2">BLK D1 LOT2</option>
                            <option value="BLK D1 LOT3">BLK D1 LOT3</option>
                            <option value="BLK D1 LOT4">BLK D1 LOT4</option>
                            <option value="BLK D1 LOT5">BLK D1 LOT5</option>
                            <option value="BLK D2 LOT1">BLK D2 LOT1</option>
                            <option value="BLK D2 LOT2">BLK D2 LOT2</option>
                            <option value="BLK D2 LOT3">BLK D2 LOT3</option>
                            <option value="BLK D2 LOT4">BLK D2 LOT4</option>
                            <option value="BLK D2 LOT5">BLK D2 LOT5</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Total Household Member:</label>
                            <input name="txt_edit_householdmem" class="form-control input-sm type="number" min="1" value="'.$erow['totalhousehold'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Contact No:</label>
                            <input name="txt_edit_rthead" class="form-control input-sm" type="number" value="'.$erow['relationtohead'].'"/>
                        </div>

                        
                        <div class="form-group">
                            <label class="control-label">Password:</label>
                            <input name="txt_edit_upass" class="form-control input-sm" type="password" value="'.$erow['password'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Image (Optional):</label>
                            <input name="txt_edit_image" class="form-control input-sm" type="file" />
                        </div>

                    </div>

                    </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="location.reload();" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>