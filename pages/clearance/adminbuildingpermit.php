<!-- ========================= MODAL ======================= -->
<style>
    .hideadmin{
        display: none;
    }
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
<div id="adminbuildingp" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Construction Bond</h4>
                    </div>
                    <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        
                                        <div class="form-group">
                                            <label>Resident Name:</label>
                                            <select name="txt_residentidbp" class="select2 form-control input-sm" style="width:100%" required>
                                                <option selected="" disabled="">-- Select Resident -- </option>
                                                <?php
                                                    $squery = mysqli_query($con,"SELECT r.id,r.lname,r.fname,r.mname from tblresident r ");
                                                    while ($row = mysqli_fetch_array($squery)){
                                                        echo '
                                                            <option>'.$row['lname'].', '.$row['fname'].' '.$row['mname'].'</option>    
                                                        ';
                                                    }
                                                ?>
                                            </select>
                                            
                                        </div>
                                        <label>Project Type:</label>
                                        <input name="txtadmindesc" class="form-control input-sm" type="text" placeholder="Project Type" required/>
                                        <label>Address/Location:</label>
                                        <input name="txtadminaddress" class="form-control input-sm" type="text" placeholder="Address/Location" required/>
                                        <label>Date: </label>
                                        <input name="adminpermitdate" class="form-control input-sm" type="date" placeholder="Date" required/>
                                        <label>Amount: </label>
                                        <input name="adminamount" class="form-control input-sm" type="number" placeholder="Amount" required/>
                                        <label for="payment">
                                            Payment:<br>
                                            Gcash: 09164527312<br>
                                        </label>
                                        <select name="adminpayment" id="adminpayment" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                                <option selected disabled>Mode Of Payment</option>                                    
                                                <option value="Cash">Cash on Pick up</option>
                                                <option value="Gcash">Gcash</option>
                                        </select>
                                        <div id="hiddenpaymentadmin" class="hideadmin">
                                            <input name="txtadminbpref" id="txtadminbpref"class="form-control input-sm" type="number" placeholder="Reference Number" value=0/>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_adminbuilding" value="Request Building Permit"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script>
                window.addEventListener("load", () => { // when the page loads
                document.getElementById("adminpayment").addEventListener("change", function() {
                    document.getElementById("hiddenpaymentadmin").classList.toggle("hideadmin", this.value === "Cash")
                })
                })
            </script>