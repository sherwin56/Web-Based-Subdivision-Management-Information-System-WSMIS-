<!-- ========================= MODAL ======================= -->
<style>
    .hide6{
        display: none;
    }
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
<div id="reqmonthly<?php echo $row['id']?>" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Monthly Due Payment</h4>
                    </div>
                    <div class="modal-body">
                    <?php
                    $query = mysqli_query($con,"SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname from tblresident where id = '".$row['id']."' ");
                    $row = mysqli_fetch_array($query);
                        echo '
                            <input type="hidden" value="'.$row['id'].'" name="hidden_idmonthly" id="hidden_idmonthly"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Payment:</label>
                                        <input name="txtmonthly" class="form-control input-sm" type="text" value="Monthly Due" readonly/>
                                        <label>Full Name:</label>
                                        <input name="txtfnamemonthly" class="form-control input-sm" type="text" value="'.$row['cname'].'" readonly/>
                                        <label for="payment">
                                            Payment:<br>
                                            Amount: ₱100 per month<br>
                                            Gcash (09164527312) or Scan QR Code:<br>
                                            <div style="display: flex; align-content: center; justify-content: center;">
                                            <image class="pull-left" src="../../img/qrcode.jpg" style="width:55%;height:150px; background: white;"/>
                                            </div>
                                        </label>
                                        <div class="form-group">
                                        <label class="control-label">Month:</label>
                                        <select name="txt_month" class="form-control input-sm input-size" required>
                                            <option selected="" disabled="" disable selected hidden >Select Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        </div>

                                        <select name="payment6" id="payment6" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                                <option selected disabled>Mode Of Payment</option>                                    
                                                <option value="Cash">Cash</option>
                                                <option value="Gcash">Gcash</option>
                                        </select><br>
                                        <div id="hiddenpayment6" class="hide6">
                                            <input name="txt_monthlyref" id="txt_monthlyref"class="form-control input-sm" type="number" placeholder="Reference Number" value=0/>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            ';
                        ?>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_monthlyreq" value="Pay Monthly Due"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script>
                window.addEventListener("load", () => { // when the page loads
                document.getElementById("payment6").addEventListener("change", function() {
                    document.getElementById("hiddenpayment6").classList.toggle("hide6", this.value === "Cash")
                })
                })
            </script>