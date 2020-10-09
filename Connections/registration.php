<?php
$servername = "localhost";
$username = "root";
$password = "root"; 
$database = "registration_logistic2020";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error)
  {
  die("Failed to connect to MySQL: " . $conn->connect_error);
  }
mysqli_set_charset($conn,"utf8");
date_default_timezone_set('Asia/Bangkok');
?>

<!--
	รหัส password
Devp@ssw0rd-->