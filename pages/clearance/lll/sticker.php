<!-- ========================= MODAL ======================= -->
<style>
    .hide5{
        display: none;
    }
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
<div id="reqsticker<?php echo $row['id']?>" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Car Sticker</h4>
                    </div>
                    <div class="modal-body">
                    <?php
                    $query = mysqli_query($con,"SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname from tblresident where id = '".$row['id']."' ");
                    $row = mysqli_fetch_array($query);
                        echo '
                            <input type="hidden" value="'.$row['id'].'" name="hidden_idsticker" id="hidden_idsticker"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Request Type:</label>
                                        <input name="txtsticker" class="form-control input-sm" type="text" value="Car Sticker" readonly/>
                                        <label>Full Name:</label>
                                        <input name="txtfnamesticker" class="form-control input-sm" type="text" value="'.$row['cname'].'" readonly/>
                                        <label for="payment">
                                            Payment:<br>
                                            Gcash: 09164527312<br>
                                            Amount: ₱100
                                        </label>
                                        <select name="payment5" id="payment5" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                                <option selected disabled>Mode Of Payment</option>                                    
                                                <option value="Cash">Cash on Pick up</option>
                                                <option value="Gcash">Gcash</option>
                                        </select>
                                        <div id="hiddenpayment5" class="hide5">
                                            <input name="txt_stickerref" id="txt_stikcerref"class="form-control input-sm" type="number" placeholder="Reference Number" value=0/>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            ';
                        ?>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_stickerreq" value="Request Car Sticker"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script>
                window.addEventListener("load", () => { // when the page loads
                document.getElementById("payment5").addEventListener("change", function() {
                    document.getElementById("hiddenpayment5").classList.toggle("hide5", this.value === "Cash")
                })
                })
            </script>