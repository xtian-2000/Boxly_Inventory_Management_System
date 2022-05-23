<?php
$hostName = "ims.cm10enqi961k.us-east-2.rds.amazonaws.com";
$userName = "pongodev";
$password = "pongodevPongodev";
$databaseName = "imsdatabase";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>