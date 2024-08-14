<?php echo '<div id="editsolicit'.$row['s_id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Memorandum</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['s_id'].'" name="hidden_idsolicit" id="hidden_idsolicit"/>
                <div class="form-group">
                    <label>Memo No#: </label>
                    <input name="txt_editsol" class="form-control input-sm" type="text" value="'.$row['solicit_no'].'" />
                </div>
                <div class="form-group">
                    <label>Resident: </label>
                    <input class="form-control input-sm" type="text" value="'.$row['residentname'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Date: </label>
                    <input name="editdatesol" class="form-control input-sm" type="date" value="'.$row['date'].'" />
                </div>
                <div class="form-group">
                    <label>Amount : </label>
                    <input name="txt_editamountsol" class="form-control input-sm" type="text" value="'.$row['amount'].'" />
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_solicitsave" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>