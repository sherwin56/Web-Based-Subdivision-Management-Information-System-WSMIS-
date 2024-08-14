<?php echo '<div id="editmonthlyModal'.$row['cid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Monthly Due</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['cid'].'" name="hidden_monthlyid" id="hidden_monthlyid"/>
                <div class="form-group">
                    <label>Monthly Due No#: </label>
                    <input name="txt_editmonthly" class="form-control input-sm" type="text" value="'.$row['monthly_no'].'" />
                </div>
                <div class="form-group">
                    <label>Resident: </label>
                    <input class="form-control input-sm" type="text" value="'.$row['residentname'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Date: </label>
                    <input name="editdatemonthly" class="form-control input-sm" type="date" value="'.$row['date'].'" required/>
                </div>
                <div class="form-group">
                    <label class="control-label">Month:</label>
                    <select name="txt_editmonth" class="form-control input-sm input-size" required>
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

                <div class="form-group">
                    <label>Amount : </label>
                    <input name="txt_editamountmonthly" class="form-control input-sm" type="text" value="'.$row['amount'].'" />
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="location.reload();" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_monthlysave" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>