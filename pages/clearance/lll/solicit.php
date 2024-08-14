<!-- ========================= MODAL ======================= -->
<style>
    .hide3{
        display: none;
    }
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
<div id="reqsolicit" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Memorandum Request</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Request Type:</label>
                                    <input name="txtsolicit" class="form-control input-sm" type="text" value="Solicitation" readonly/>
                                    <label>Name of Project:</label>
                                    <input name="txtsub" class="form-control input-sm" type="text" placeholder="Name of Project" required/>
                                    <label>Full Name:</label>
                                    <input name="txtfn" class="form-control input-sm" type="text" placeholder="Full Name" required/>
                                    <label>Contact No#:</label>
                                    <input name="txt_contact" class="form-control input-sm" type="number" placeholder="Contact No#" required/>
                                    <label for="payment">
                                        Payment:<br>
                                        Gcash: 09164527312<br>
                                        Amount: ₱100
                                    </label>
                                    <select name="payment3" id="payment3" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                            <option selected disabled>Mode Of Payment</option>                                    
                                            <option value="Cash">Cash on Pick up</option>
                                            <option value="Gcash">Gcash</option>
                                    </select>
                                    <div id="hiddenpayment3" class="hide3">
                                        <input name="txt_solref" id="txt_solref"class="form-control input-sm" type="number" placeholder="Reference Number" value=0/>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_solicit" value="Request Solicit"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script>
                window.addEventListener("load", () => { // when the page loads
                document.getElementById("payment3").addEventListener("change", function() {
                    document.getElementById("hiddenpayment3").classList.toggle("hide3", this.value === "Cash")
                })
                })
            </script>