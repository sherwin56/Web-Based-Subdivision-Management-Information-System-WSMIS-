<?php echo '<div id="editreserveModal'.$row['crid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Reservation</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['crid'].'" name="hidden_idreserve" id="hidden_idreserve"/>
                <div class="form-group">
                    <label>Reservation No#: </label>
                    <input name="txt_reserveno" class="form-control input-sm" type="text" value="'.$row['reserve_no'].'" required/>
                </div>
                <div class="form-group">
                    <label>Full Name: </label>
                    <input class="form-control input-sm" type="text" value="'.$row['fullname'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Title: </label>
                    <input name="txtedit_title" class="form-control input-sm" type="text" value="'.$row['title'].'" />
                </div>
                <div class="form-group">
                    <label>Description: </label>
                    <input name="txtedit_desc" class="form-control input-sm" type="text" value="'.$row['description'].'" />
                </div>
                <div class="form-group">
                    <label>Start Date: </label>
                    <input name="edit_sdate" id="edit_sdate" class="form-control input-sm" type="datetime-local" value="'.$row['startdate'].'" />
                </div>
                <div class="form-group">
                    <label>End Date: </label>
                    <input name="edit_edate" id="edit_edate" class="form-control input-sm" type="datetime-local" value="'.$row['enddate'].'" />
                </div>
                <div class="form-group">
                    <label>Amount: </label>
                    <input name="txtedit_reserveamount" class="form-control input-sm" type="text" value="'.$row['amount'].'" readonly/>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="location.reload();" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_reservesave" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>
<script>
     var today = new Date().toISOString().slice(0, 16);

    document.getElementsByName("edit_sdate")[0].min = today;
    document.getElementsByName("edit_edate")[0].min = today;
</script>';
?>
