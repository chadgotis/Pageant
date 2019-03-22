<?php 
include("../connection.php");
include("../includes/functions.php");
 
session_start();
$query = "UPDATE judge SET logged_in = 0 where judge_id =".$_SESSION['judge_id'];
$res = mysqli_query($conn, $query);
$_SESSION = array();
session_destroy();
header("Location:../index.php");
?>