<?php
	include 'conn.php';
    session_start();

    if(isset($_SESSION['userid'])){
            $sql = "SELECT * FROM tblresident WHERE id = '".$_SESSION['userid']."'";
		    $query = $con->query($sql);
		    $voter = $query->fetch_assoc();
	}
	else{
		header('location: ../../../main/index.php');
		exit();
	}

?>