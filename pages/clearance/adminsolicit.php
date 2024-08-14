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
<div id="adminsolicit" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Memorandum</h4>
                    </div>
                    <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="margin-bottom: -5px;">
                                        Full Name:<br>
                                        <i style="font-size: 12px; font-weight: normal;">(Surname, FirstName MiddleName)</i>
                                        </label>
                                        <input name="txtadminfn" class="form-control input-sm" type="text" placeholder="Ex: Cruz, John Padua" required/>
                                        <label>Project Name:</label>
                                        <input name="txtadminpn" class="form-control input-sm" type="text" placeholder="Project Name" required/>
                                        <label>Contact No#:</label>
                                        <input name="txtadmincontact" class="form-control input-sm" type="text" placeholder="Contact No#" required/>
                                        <label>Date: </label>
                                        <input name="adminsoldate" class="form-control input-sm" type="date" placeholder="Date" required/>
                                        <label>Amount: </label>
                                        <input name="adminamount" class="form-control input-sm" type="number" placeholder="Amount" required/>
                                        <label for="payment">
                                            Payment:<br>
                                            Gcash: 09164527312<br>
                                            Amount: ₱100
                                        </label>
                                        <select name="adminpayment" id="adminpayment" class="form-control input-sm" type="text" placeholder="Mode of Payment" required>  
                                                <option selected disabled>Mode Of Payment</option>                                    
                                                <option value="Cash">Cash on Pick up</option>
                                                <option value="Gcash">Gcash</option>
                                        </select>
                                        <div id="hiddenpaymentadmin" class="hideadmin">
                                            <input name="txtadminsolref" id="txtadminsolref"class="form-control input-sm" type="number" placeholder="Reference Number" value=0/>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="location.reload();" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_adminsolicit" value="Request Solicit Form"/>
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