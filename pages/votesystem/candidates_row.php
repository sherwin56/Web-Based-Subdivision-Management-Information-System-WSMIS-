<?php 
	include "../connection.php";

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, candidates.id AS canid FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id WHERE candidates.id = '$id'";
		$query = $con->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>