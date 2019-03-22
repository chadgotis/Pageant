<?php 
include("../connection.php"); 
include("../includes/functions.php");
$comp = $_POST['competition'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$user = $_POST['username'];
$password = $_POST['password'];
$judge = $_GET['judge_id'];

$comp = mysqli_real_escape_string($conn,$comp);
$fname = mysqli_real_escape_string($conn,$fname);
$lname = mysqli_real_escape_string($conn,$lname);
$user = mysqli_real_escape_string($conn,$user);
$password = mysqli_real_escape_string($conn,$password);

$query = "UPDATE judge SET  
							competition_id ='{$comp}',
							fname ='{$fname}',
							lname ='{$lname}',
							username ='{$user}',
							password ='{$password}' WHERE judge_id = ".$judge;
$res = mysqli_query($conn, $query);
header_to("judges.php");
?>