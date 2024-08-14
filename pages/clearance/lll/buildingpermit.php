<!-- ========================= MODAL ======================= -->
<style>
    .hide1{
        display: none;
    }
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
<div id="reqbuilding" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Building Permit</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Request Type:</label>
                                    <input name="txtreqtype" class="form-control input-sm" type="text" value="Building Permit" readonly/>
                                    <label>Owner Name:</label>
                                    <input name="txt_owner" class="form-control input-sm" type="text" placeholder="Owner Name" required/>
                                    <label>Project Type:</label>
                                    <input name="txt_desc" class="form-control input-sm" type="text" placeholder="Project Type" required/>
                                    <label>Address/Location:</label>
                                    <input name="txt_address" class="form-control input-sm" type="text" placeholder="Address/Location" required/>
                                    <label for="payment">
                                        Payment:<br>
                                        Gcash: 09164527312<br>
                                        Amount: ₱100
                                    </label>
                                    <select name="payment1" id="payment1" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                            <option selected disabled>Mode Of Payment</option>                                    
                                            <option value="Cash">Cash on Pick up</option>
                                            <option value="Gcash">Gcash</option>
                                    </select>
                                    <div id="hiddenpayment1" class="hide1">
                                        <input name="txt_ref" id="txt_ref"class="form-control input-sm" type="number" placeholder="Reference Number"/>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_buildingreq" value="Request Building Permit"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script>
                window.addEventListener("load", () => { // when the page loads
                document.getElementById("payment1").addEventListener("change", function() {
                    document.getElementById("hiddenpayment1").classList.toggle("hide1", this.value === "Cash")
                })
                })
            </script>