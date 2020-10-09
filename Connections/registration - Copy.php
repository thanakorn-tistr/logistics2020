<?php
$servername = "localhost";
$username = "golf";
$password = "golf1102";
$database = "registration";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error)
  {
  die("Failed to connect to MySQL: " . $conn->connect_error);
  }
mysqli_set_charset($conn,"utf8");
?>