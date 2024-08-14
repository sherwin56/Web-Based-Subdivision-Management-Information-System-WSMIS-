<?php
	$con = new mysqli('localhost', 'id20981518_root', 'Test@123', 'id20981518_db_barangay');

	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}
	
?>