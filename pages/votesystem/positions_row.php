<?php 
	include "../connection.php";

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM positions WHERE id = '$id'";
		$query = $con->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>