<?php echo '<div id="editIDModal'.$row['iid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit ID Application</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['iid'].'" name="hidden_idappli" id="hidden_idappli"/>
                <div class="form-group">
                    <label>ID Application No#: </label>
                    <input name="txt_editid" class="form-control input-sm" type="text" value="'.$row['id_no'].'" />
                </div>
                <div class="form-group">
                    <label>Resident: </label>
                    <input class="form-control input-sm" type="text" value="'.$row['residentname'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Date: </label>
                    <input name="edit_iddate" class="form-control input-sm" type="date" value="'.$row['date'].'" />
                </div>
                <div class="form-group">
                    <label>Amount : </label>
                    <input name="txtedit_idamount" class="form-control input-sm" type="text" value="'.$row['amount'].'" />
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="location.reload();" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_idsave" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>