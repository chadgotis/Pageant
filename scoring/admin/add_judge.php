<?php
include("../connection.php");
include("../includes/functions.php");

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $user = $_POST['username'];
  $password = $_POST['password'];

  $query = "INSERT INTO judge (fname , lname, username, password) VALUES ('{$fname}', '{$lname}', '{$user}', '{$password}')";
$asd = mysqli_query($conn, $query);
confirm_query($asd);


 ?>