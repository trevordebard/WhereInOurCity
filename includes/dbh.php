<?php

$dbServername = "localhost";
$dbUsername = "dbwiocad";
$dbPassword = "Wukr+ezc";
$dbName = "WIOC";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Create connection
//$conn = new mysqli($dbServername, $dbUsername, $dbPassword);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";
?>
