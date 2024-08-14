<!-- ========================= MODAL ======================= -->
            <div id="addCourseModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Manage Officials</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Position:</label>
                                    <input name="txt_position" class="form-control input-sm" type="text" placeholder="Position" required/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Name:</label>
                                        <select name="txt_cname" id="txt_cname" class="form-control input-sm select2" style="width:100%">
                                            <option disabled selected>-- Select Name --</option>
                                            <?php
                                                $qc = mysqli_query($con,"SELECT * from tblresident");
                                                while($rowc = mysqli_fetch_array($qc)){
                                                    echo '
                                                    <option caddress="'.$rowc['zone'].'" ccontact="'.$rowc['relationtohead'].'">'.$rowc['lname'].', '.$rowc['fname'].' '.$rowc['mname'].'</option>
                                                    ';  
                                                }                                              
                                            ?>   
                                        </select>
                                </div>
                               <div class="form-group">
                                    <label>Contact #:</label>
                                    <input name="txt_contact" id="contact" class="form-control input-sm" type="text" placeholder="Contact #" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input name="txt_address" id="address" class="form-control input-sm" type="text" placeholder="Address" readonly/>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="location.reload();" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_add" value="Add Officials"/>
                    </div>
                </div>
              </div>
              </form>
            </div>


<script>
    $(document).ready(function () {     
        $('select[name="txt_cname"]').change(function(){
           var address = $('option:selected', this).attr('caddress');
           $("#address").val(address);
        
           var contact = $('option:selected', this).attr('ccontact');
           $("#contact").val(contact);
        });
    });
</script>