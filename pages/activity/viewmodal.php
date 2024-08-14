<?php echo '<div id="view-modal'.$row['id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Description</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>'.$row['description'].'</label>
                </div>';
                $p = mysqli_query($con,"SELECT * from tblactivityphoto where activityid = '".$row['id']."' ");
                while($row1 = mysqli_fetch_array($p)){
                    echo '<div class="col-md-4">
                        <image src="photo/'.basename($row1['filename']).'" style="width:170px;height:170px;"/>
                    </div>';
                }
            
            echo '
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close"/>
        </div>
    </div>
  </div>
</form>
</div>';?>