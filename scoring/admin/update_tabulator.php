<?php
include("../connection.php");
include("../includes/functions.php");

  $tabulator = $_GET['tabulator_id'];
  $comp = $_POST['competition'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $user = $_POST['username'];
  $password = $_POST['password'];

  $comp = mysqli_real_escape_string($conn, $comp);
  $fname = mysqli_real_escape_string($conn, $fname);
  $lname = mysqli_real_escape_string($conn, $lname);
  $user = mysqli_real_escape_string($conn, $user);
  $password = mysqli_real_escape_string($conn, $password);

  $query = "UPDATE tabulator SET 
  			competition_id ='{$comp}',
  			fname ='{$fname}',
  			lname ='{$lname}',
  			username ='{$user}',
  			password ='{$password}' WHERE tabulator_id = ".$tabulator;
$asd = mysqli_query($conn, $query);
confirm_query($asd);
header_to("tabulator.php");



 ?>