<!-- ========================= MODAL ======================= -->
<div id="disapprovemonthlyModal<?php echo $row['cid']?>" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Disapprove Request</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo '
                <input type="hidden" value="'.$row['cid'].'" name="hidden_monthlyid" id="hidden_monthlyid"/>';
                        ?>
                            <p>Are you sure you want to disapproved this request?</p>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_disapprovemonthly" value="Disapprove"/>
                    </div>
                </div>
              </div>
              </form>
            </div>