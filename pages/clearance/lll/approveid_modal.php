<!-- ========================= MODAL ======================= -->
<style>
    input[type=number].form-control::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
     margin: 0; 
}
</style>
            <div id="approveIDModal<?php echo $row['iid']?>" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Approve Request</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo '
                <input type="hidden" value="'.$row['iid'].'" name="hidden_idappli" id="hidden_idappli"/>';
                
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                            
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input name="txt_idamount" class="form-control input-sm" type="number" placeholder="Amount" required/>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_approveid" value="Approve"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
            
            