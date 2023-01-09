<?php 
  //Connect to database
  $con = mysqli_connect("reservatiesdb.mysql.database.azure.com", "sekariya", "Prullenbak123", "fonteyn");
  //Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //Get the email
  $email = $_GET['email'];
  //Query the database
  $query = "DELETE FROM reservaties WHERE email='$email'";
  $result = mysqli_query($con, $query);
  //Redirect to index.php
  header('Location: dashboard.php');
?>