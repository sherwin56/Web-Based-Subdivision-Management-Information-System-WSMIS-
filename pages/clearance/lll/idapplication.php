<!-- ========================= MODAL ======================= -->
<style>
    .hide4{
        display: none;
    }
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
<div id="reqID<?php echo $row['id']?>" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">ID Application</h4>
                    </div>
                    <div class="modal-body">
                    <?php
                    $query = mysqli_query($con,"SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname from tblresident where id = '".$row['id']."' ");
                    $row = mysqli_fetch_array($query);
                        echo '
                            <input type="hidden" value="'.$row['id'].'" name="hidden_idappli" id="hidden_idappli"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Request Type:</label>
                                        <input name="txtidappli" class="form-control input-sm" type="text" value="ID Applcation" readonly/>
                                        <label>Full Name:</label>
                                        <input name="txtfname" class="form-control input-sm" type="text" value="'.$row['cname'].'" readonly/>
                                        <label for="payment">
                                            Payment:<br>
                                            Gcash: 09164527312<br>
                                            Amount: ₱100
                                        </label>
                                        <select name="payment4" id="payment4" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                                <option selected disabled>Mode Of Payment</option>                                    
                                                <option value="Cash">Cash on Pick up</option>
                                                <option value="Gcash">Gcash</option>
                                        </select>
                                        <div id="hiddenpayment4" class="hide4">
                                            <input name="txt_idref" id="txt_idref"class="form-control input-sm" type="number" placeholder="Reference Number" value=0/>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            ';
                        ?>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_idreq" value="Request ID"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script>
                window.addEventListener("load", () => { // when the page loads
                document.getElementById("payment4").addEventListener("change", function() {
                    document.getElementById("hiddenpayment4").classList.toggle("hide4", this.value === "Cash")
                })
                })
            </script>