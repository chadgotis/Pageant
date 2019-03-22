<?php
include("../connection.php");
include("../includes/functions.php");

  $comp = $_POST['competition'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $user = generate_tab_username();
  $password = generate_password();

  $query = "INSERT INTO tabulator (competition_id, fname , lname, username, password) VALUES ('{$comp}','{$fname}', '{$lname}', '{$user}', '{$password}')";
$asd = mysqli_query($conn, $query);
confirm_query($asd);
header_to("tabulator.php");



 ?>