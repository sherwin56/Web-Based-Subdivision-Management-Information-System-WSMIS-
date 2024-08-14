<!-- ========================= MODAL ======================= -->
            <div id="addModal" class="modal fade">
            <form class="form-horizontal" method="post">
              <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Manage Blotter</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">

                                    <div class="col-md-2"  style="width:110px;">
                                        <label class="control-label">Complainant:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="txt_cname" class="form-control input-sm select2" style="width:100%">
                                            <option disabled selected>-- Select Complainant --</option>
                                            <?php
                                            $qc = mysqli_query($con,"SELECT * from tblresident");
                                            while($rowc = mysqli_fetch_array($qc)){
                                                echo '
                                                    <option cage="'.$rowc['age'].'" caddress="'.$rowc['zone'].'" ccontact="'.$rowc['relationtohead'].'">'.$rowc['lname'].', '.$rowc['fname'].' '.$rowc['mname'].'</option>
                                                    ';
                                            }
                                            ?>
                                        </select>
                                    </div>



                                    <div class="col-sm-2"  style="width:110px;">
                                        <label class="control-label">Age:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input style="background-color: white;" id="cage" name="txt_cage" class="form-control input-sm" type="number" placeholder="Complainant Age" readonly/>
                                    </div>
                                </div>


                           
                                <div class="form-group">
                                    <div class="col-md-2"  style="width:110px;">
                                        <label class="control-label">Address:</label>
                                    </div>  
                                    <div class="col-sm-4" >
                                        <input style="background-color: white;" id="caddress" name="txt_cadd" class="form-control input-sm" type="text" placeholder="Complainant Address" readonly/>
                                    </div> 

                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Contact #:</label>
                                    </div>  
                                    <div class="col-sm-4" >
                                        <input style="background-color: white;" id="ccontact" name="txt_ccontact" class="form-control input-sm" type="number" placeholder="Contact #" readonly/>
                                    </div> 

                                </div> 

                                <div class="form-group">
                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Complainee:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="txt_pname" class="form-control input-sm select2" style="width:100%">
                                            <option disabled selected>-- Select Complainee --</option>
                                            <?php
                                            $qp = mysqli_query($con,"SELECT * from tblresident");
                                            while($rowp = mysqli_fetch_array($qp)){
                                                echo '
                                                    <option value="'.$rowp['id'].'" page="'.$rowp['age'].'" paddress="'.$rowp['zone'].'" pcontact="'.$rowp['relationtohead'].'">'.$rowp['lname'].', '.$rowp['fname'].' '.$rowp['mname'].'</option>
                                                    ';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Age:</label>
                                    </div>
                                    <div class="col-sm-4" >
                                        <input style="background-color: white;" id="page" name="txt_page" class="form-control input-sm" type="number" placeholder="Complainee Age" readonly/>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Address:</label>
                                    </div>  
                                    <div class="col-sm-4" >
                                        <input style="background-color: white;" id="paddress" name="txt_padd" class="form-control input-sm" type="text" placeholder="Complainee Address" readonly/>
                                    </div> 

                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Contact #:</label>
                                    </div>  
                                    <div class="col-sm-4" >
                                        <input style="background-color: white;" id="pcontact" name="txt_pcontact" class="form-control input-sm" type="number" placeholder="Contact #" readonly/>
                                    </div> 

                                </div> 

                                <div class="form-group">
                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Complaint:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="txt_complaint" class="form-control input-sm" type="text" placeholder="Complaint" required/>
                                    </div>

                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Action:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="ddl_acttaken" class="form-control input-sm" required>
                                            <option value="1st Option">1st Option</option>
                                            <option value="2nd Option">2nd Option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Status:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="ddl_stat" class="form-control input-sm" required>
                                            <option selected="" disabled="" disable selected hidden>Select Status</option>
                                            <option >Pending</option>
                                            <option >Solved</option>
                                            <option >Unsolved</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-2" style="width:110px;">
                                        <label class="control-label">Incidence:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="txt_location" class="form-control input-sm" type="text" placeholder="Location of Incidence" required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="location.reload();" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_add" value="Add Complaint"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            
<script>
$(document).ready(function () {     
$('select[name="txt_cname"]').change(function(){
   var comage = $('option:selected', this).attr('cage');
   $("#cage").val(comage);

   var comaddress = $('option:selected', this).attr('caddress');
   $("#caddress").val(comaddress);

   var comcontact = $('option:selected', this).attr('ccontact');
   $("#ccontact").val(comcontact);
});
});
</script>

<script>
$(document).ready(function () {     
$('select[name="txt_pname"]').change(function(){
   var value = $('option:selected', this).attr('value');
   $("#value").val(value);

   var compage = $('option:selected', this).attr('page');
   $("#page").val(compage);

   var compaddress = $('option:selected', this).attr('paddress');
   $("#paddress").val(compaddress);

   var compcontact = $('option:selected', this).attr('pcontact');
   $("#pcontact").val(compcontact);
});
});
</script>
            