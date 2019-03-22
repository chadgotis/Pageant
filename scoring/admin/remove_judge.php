<?php 
include("../connection.php"); 
include("../includes/functions.php");

$id = $_GET['judge_id'];

$query = "DELETE FROM judge WHERE judge_id = {$id}";
$res = mysqli_query($conn, $query);
header_to("judges.php");
?>