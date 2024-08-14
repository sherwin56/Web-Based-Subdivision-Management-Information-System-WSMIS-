<!-- ========================= MODAL ======================= -->
<style>
    .hide2{
        display: none;
    }
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
<div id="reqmemorandum<?php echo $row['id']?>" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Memorandum Request</h4>
                    </div>
                    <div class="modal-body">

                        <?php
                        $query = mysqli_query($con,"SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname from tblresident where id = '".$row['id']."' ");
                        $row = mysqli_fetch_array($query);

                        echo'
                            <input type="hidden" value="'.$row['id'].'" name="hidden_idsticker" id="hidden_idmemo"/>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Request Type:</label>
                                        <input name="txtreqmem" class="form-control input-sm" type="text" value="Memorandum" readonly/>
                                        <label>Subject:</label>
                                        <input name="txt_sub" class="form-control input-sm" type="text" placeholder="Subject" required/>
                                        <label>Full Name:</label>
                                        <input name="txt_fn" class="form-control input-sm" type="text" value="'.$row['cname'].'" readonly/>
                                        <label>Address:</label>
                                        <input name="txt_reqto" class="form-control input-sm" type="text" value="'.$row['zone'].'" readonly/>
                                        <label for="payment">
                                            Payment:<br>
                                            Amount: ₱100<br>
                                            Gcash (09164527312) or Scan QR Code:<br>
                                            <div style="display: flex; align-content: center; justify-content: center;">
                                            <image class="pull-left" src="../../img/qrcode.jpg" style="width:55%;height:150px; background: white;"/>
                                            </div>
                                        </label>
                                        <select name="payment2" id="payment2" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                                <option selected disabled>Mode Of Payment</option>                                    
                                                <option value="Cash">Cash on Pick up</option>
                                                <option value="Gcash">Gcash</option>
                                        </select>
                                        <div id="hiddenpayment2" class="hide2">
                                            <input name="txt_memref" id="txtm_memref"class="form-control input-sm" type="number" placeholder="Reference Number" value=0/>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        ';
                        
                        ?>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_memreq" value="Request Memorandum"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script>
                window.addEventListener("load", () => { // when the page loads
                document.getElementById("payment2").addEventListener("change", function() {
                    document.getElementById("hiddenpayment2").classList.toggle("hide2", this.value === "Cash")
                })
                })
            </script>