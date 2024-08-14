<?php
	session_start();
	include "../../connection.php";

	if(!isset($_SESSION['userid']) || trim($_SESSION['userid']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM tbluser WHERE id = '".$_SESSION['userid']."'";
	$query = $con->query($sql);
	$user = $query->fetch_assoc();
	
?>