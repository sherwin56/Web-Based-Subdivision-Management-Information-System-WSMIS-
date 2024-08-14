<?php
include "../connection.php";
$query=mysqli_query($con,"select * from tblbuilding where status = 'New' and seen='0' order by id desc");
$output = '';
while($row=mysqli_fetch_array($query)){
$output .= '
	<div class="alert alert_default">
		<a href="" class="close" data-dismiss="alert" onclick="location.reload();" aria-label="close">&times;</a>
		<a href="pending.php"><p>New Request for <strong>'.$row['req_type'].'</strong></a>
	</div>
	';
}
mysqli_query($con,"update tblbuilding set seen='1' where status='New' and seen='0'");
echo $output;

$query2=mysqli_query($con,"select * from tblmemo where status = 'New' and seen='0' order by id desc");
$output2 = '';
while($row=mysqli_fetch_array($query2)){
$output2 .= '
	<div class="alert alert_default">
		<a href="" class="close" data-dismiss="alert" onclick="location.reload();" aria-label="close">&times;</a>
		<a href="pending.php"><p>New Request for <strong>'.$row['req_type'].'</strong></a>
	</div>
	';
}
mysqli_query($con,"update tblmemo set seen='1' where status='New' and seen='0'");
echo $output2;

$query3=mysqli_query($con,"select * from tblsolicit where status = 'New' and seen='0' order by id desc");
$output3 = '';
while($row=mysqli_fetch_array($query3)){
$output3 .= '
	<div class="alert alert_default">
		<a href="" class="close" data-dismiss="alert" onclick="location.reload();" aria-label="close">&times;</a>
		<a href="pending.php"><p>New Request for <strong>'.$row['req_type'].'</strong></a>
	</div>
	';
}
mysqli_query($con,"update tblsolicit set seen='1' where status='New' and seen='0'");
echo $output3;

$query4=mysqli_query($con,"select * from tblid where status = 'New' and seen='0' order by id desc");
$output4 = '';
while($row=mysqli_fetch_array($query4)){
$output4 .= '
	<div class="alert alert_default">
		<a href="" class="close" data-dismiss="alert" onclick="location.reload();" aria-label="close">&times;</a>
		<a href="pending.php"><p>New Request for <strong>'.$row['req_type'].'</strong></a>
	</div>
	';
}
mysqli_query($con,"update tblid set seen='1' where status='New' and seen='0'");
echo $output4;

$query5=mysqli_query($con,"select * from tblreserve where status = 'New' and seen='0' order by id desc");
$output5 = '';
while($row=mysqli_fetch_array($query5)){
$output5 .= '
	<div class="alert alert_default">
		<a href="" class="close" data-dismiss="alert" onclick="location.reload();" aria-label="close">&times;</a>
		<a href="pending.php"><p>New Request for <strong>'.$row['req_type'].'</strong></a>
	</div>
	';
}
mysqli_query($con,"update tblreserve set seen='1' where status='New' and seen='0'");
echo $output5;

$query6=mysqli_query($con,"select * from tblmonthly where status = 'New' and seen='0' order by id desc");
$output6 = '';
while($row=mysqli_fetch_array($query6)){
$output6 .= '
	<div class="alert alert_default">
		<a href="" class="close" data-dismiss="alert" onclick="location.reload();" aria-label="close">&times;</a>
		<a href="pending.php"><p>New Request for <strong>'.$row['req_type'].'</strong></a>
	</div>
	';
}
mysqli_query($con,"update tblmonthly set seen='1' where status='New' and seen='0'");
echo $output6;

$query7=mysqli_query($con,"select * from tblsticker where status = 'New' and seen='0' order by id desc");
$output7 = '';
while($row=mysqli_fetch_array($query7)){
$output7 .= '
	<div class="alert alert_default">
		<a href="" class="close" data-dismiss="alert" onclick="location.reload();" aria-label="close">&times;</a>
		<a href="pending.php"><p>New Request for <strong>'.$row['req_type'].'</strong></a>
	</div>
	';
}
mysqli_query($con,"update tblsticker set seen='1' where status='New' and seen='0'");
echo $output7;
?>
