<!-- ========================= MODAL ======================= -->
<style>
    .hide7{
        display: none;
    }
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
<div id="reqreserve<?php echo $row['id']?>" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Clubhouse Reservation</h4>
                    </div>
                    <div class="modal-body">
                    <?php
                    $query = mysqli_query($con,"SELECT zone,id,CONCAT(lname, ', ', fname, ' ', mname) as cname from tblresident where id = '".$row['id']."' ");
                    $row = mysqli_fetch_array($query);
                        echo '
                            <input type="hidden" value="'.$row['id'].'" name="hidden_idreserve" id="hidden_idreserve"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Payment:</label>
                                        <input name="txtreserve" class="form-control input-sm" type="text" value="Clubhouse Reservation" readonly/>
                                        <label>Full Name:</label>
                                        <input name="txtfnreserve" class="form-control input-sm" type="text" value="'.$row['cname'].'" readonly/>
                                        <label>Title:</label>
                                        <input name="txttitle" class="form-control input-sm" type="text" placeholder="Title" required/>
                                        <label>Description:</label>
                                        <input name="txtrdesc" class="form-control input-sm" type="text" placeholder="Description" required/>
                                        <label>Start Date:</label>
                                        <input name="txtsdatereserve" id="txtsdatereserve" class="form-control input-sm" type="datetime-local" required/>
                                        <label>End Date:</label>
                                        <input name="txtedatereserve" id="txtedatereserve" class="form-control input-sm" type="datetime-local" required/>
                                        <label for="payment">
                                            Payment:<br>
                                            Gcash (09164527312) or Scan QR Code:<br>
                                            <div style="display: flex; align-content: center; justify-content: center;">
                                            <image class="pull-left" src="../../img/qrcode.jpg" style="width:55%;height:150px; background: white;"/>
                                            </div>
                                        </label>
                                        <select name="payment7" id="payment7" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                                <option selected disabled>Mode Of Payment</option>                                    
                                                <option value="Cash">Cash</option>
                                                <option value="Gcash">Gcash</option>
                                        </select><br>
                                        <div id="hiddenpayment7" class="hide7">
                                            <input name="txt_reserveref" id="txt_reserveref"class="form-control input-sm" type="number" placeholder="Reference Number" value=0/>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            ';
                        ?>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_reservereq" value="Submit Reservation"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script>
                window.addEventListener("load", () => { // when the page loads
                document.getElementById("payment7").addEventListener("change", function() {
                    document.getElementById("hiddenpayment7").classList.toggle("hide7", this.value === "Cash")
                })
                })
            </script>
            <script>
                var today = new Date().toISOString().slice(0, 16);

            document.getElementsByName("txtsdatereserve")[0].min = today;
            document.getElementsByName("txtedatereserve")[0].min = today;
            </script>