<?php
$host     = 'localhost';
$username = 'id20981518_root';
$password = 'Test@123';
$dbname   ='id20981518_db_barangay';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}