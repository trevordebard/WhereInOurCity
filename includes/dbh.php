<?php

/*Sets the varaibles we need to get connection to the database*/
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "wioc";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); //Establishes connection with our database

// Create connection
//$conn = new mysqli($dbServername, $dbUsername, $dbPassword);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
?>
