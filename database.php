<?php
$hostName = "reservatiesdb.mysql.database.azure.com";
$userName = "sekariya";
$password = "Prullenbak123";
$databaseName = "fonteyn";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>