<link href="req_style.css" rel="stylesheet" type="text/css">
<!-- dropdown style -->
<style>
    .dropdown-container a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
.dropdown-container a:hover {
  color: #818181;
}
</style>

<?php
    include 'config_modal.php';

	echo '

	<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                        <div class="pull-left info">
                            <h4>Hello, '.$_SESSION['role'].'</h4>

                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    ';
                    if($_SESSION['role'] == "Administrator"){
                        echo '
                    <ul class="sidebar-menu">
                            <li>
                                <a href="../dashboard/dashboard.php">
                                    <i class="fa fa-home"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="../officials/officials.php">
                                    <i class="fa fa-user"></i> <span>HOA Officials</span>
                                </a>
                            </li>
                            <li>
                                <a href="../resident/resident.php">
                                    <i class="fa fa-users"></i> <span>Resident</span>
                                </a>
                            </li>
                            <li>
                                <a href="../blotter/blotter.php">
                                    <i class="fa fa-users"></i> <span>Complaint Handler</span>
                                </a>
                            </li>
                            <li>
                                <a href="../schedule-admin/index.php">
                                    <i class="fa fa-calendar"></i> <span>Clubhouse Reservation</span>
                                </a>
                            </li>
                            <li>
                                <a href="../activity/activity.php">
                                    <i class="fa fa-calendar"></i> <span>Announcement</span>
                                </a>
                            </li>
                            <li>
                                <a href="../clearance/pending.php">
                                    <i class="fa fa-hourglass"></i> <span>Pending Requests</span>
                                </a>
                            </li>
                            <li>                               
                                <a class="dropdown-btn">
                                    <i class="fa fa-file"></i> <span>Services <i class="fa fa-caret-down"></i></span>
                                </a>
                                    <ul class="dropdown-container">
                                        <li>
                                            <a href="../clearance/buildingpermit_req.php">Construction Bond Request</a>
                                            <a href="../clearance/memorandum_req.php">Memorandum Request</a>
                                            <a href="../clearance/sticker_req.php">Car Sticker Request</a>
                                            <a href="../clearance/id_req.php">ID Application</a>
                                            <a href="../clearance/solicit_req.php">Solicitation Request</a>
                                            <a href="../clearance/monthly_req.php">Monthly Dues</a>
                                            <a href="../clearance/reserve_req.php">Clubhouse Reservation</a>
                                        <li>
                                    </ul>
                            </li>
                            <li>
                                <a href="../clearance/payment.php">
                                    <i class="fa fa-dollar"></i> <span>Revenue Records</span>
                                </a>
                            </li>
                            <li>                               
                                <a class="dropdown-btn">
                                    <i class="fa fa-university"></i> <span>Election Voting <i class="fa fa-caret-down"></i></span>
                                </a>
                                    <ul class="dropdown-container">
                                        <li>
                                            <a href="../votesystem/home.php">Election Dashboard</a>
                                            <a href="../votesystem/#config" data-toggle="modal">Election Title</a>
                                            <a href="../votesystem/positions.php">Positions</a>
                                            <a href="../votesystem/candidates.php">Candidates</a>
                                            <a href="../votesystem/votes.php">Vote History</a>
                                        <li>
                                    </ul>
                            </li>
                            
                       
                           <!-- <li>
                                <a href="../report/report.php">
                                    <i class="fa fa-users"></i> <span>Report</span>
                                </a>
                            </li> --> 
                            
                            <li>
                                <a href="../logs/logs.php">
                                    <i class="fa fa-history"></i> <span>Logs</span>
                                </a>
                            </li>                            
                            
                    </ul>';
                    }
                    elseif($_SESSION['role'] == "Zone Leader"){
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../permit/permit.php">
                                    <i class="fa fa-file"></i> <span>Permit</span>
                                </a>
                            </li>
                            <li>
                                <a href="../clearance/clearance.php">
                                    <i class="fa fa-file"></i> <span>Clearance</span>
                                </a>
                            </li>
                        </ul>';
                    }
                    elseif($_SESSION['role'] == "Resident"){
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../votesystem/home2.php">
                                    <i class="fa fa-calendar"></i> <span>Vote</span>
                                </a>
                            </li>
                        </ul>';
                    }
                    else{
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../activity/activity.php">
                                    <i class="fa fa-calendar"></i> <span>Announcement</span>
                                </a>
                            </li>
                            <li>
                                <a href="../schedule-user/index.php">
                                    <i class="fa fa-calendar"></i> <span>Clubhouse Reservation</span>
                                </a>
                            </li>
                            <li>
                                <a href="../clearance/request.php">
                                    <i class="fa fa-file"></i> <span>Services</span>
                                </a>
                            </li>
                             <li>
                                <a href="../votesystem/home2.php">
                                    <i class="fa fa-university"></i> <span>Election</span>
                                </a>
                            </li>
                        </ul>';
                    }
                echo '
                </section>
                <!-- /.sidebar -->
            </aside>
	';
?>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>