<?php echo '<div id="editmem'.$row['mid'].'" class="modal fade">
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
                <input type="hidden" value="'.$row['mid'].'" name="hidden_idmemo" id="hidden_id"/>
                <div class="form-group">
                    <label>Memo No#: </label>
                    <input name="txt_editmemo" class="form-control input-sm" type="text" value="'.$row['memo_id'].'" required/>
                </div>
                <div class="form-group">
                    <label>Resident: </label>
                    <input class="form-control input-sm" type="text" value="'.$row['residentname'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Date: </label>
                    <input name="editdatememo" class="form-control input-sm" type="date" value="'.$row['date'].'" required/>
                </div>
                <div class="form-group">
                    <label>Amount : </label>
                    <input name="txt_editamountmemo" class="form-control input-sm" type="text" value="'.$row['amount'].'" required/>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_reqsave" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>