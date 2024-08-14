<?php echo '<div id="editstickerModal'.$row['cid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Car Sticker</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['cid'].'" name="hidden_stickerid" id="hidden_stickerid"/>
                <div class="form-group">
                    <label>Car Sticker No#: </label>
                    <input name="txt_editsticker" class="form-control input-sm" type="text" value="'.$row['sticker_no'].'" />
                </div>
                <div class="form-group">
                    <label>Resident: </label>
                    <input class="form-control input-sm" type="text" value="'.$row['residentname'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Date: </label>
                    <input name="editdatesticker" class="form-control input-sm" type="date" value="'.$row['date'].'" />
                </div>
                <div class="form-group">
                    <label>Amount : </label>
                    <input name="txt_editamountsticker" class="form-control input-sm" type="text" value="'.$row['amount'].'" />
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_stickersave" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>