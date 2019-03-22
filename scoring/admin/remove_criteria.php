<?php 
include("../connection.php"); 
include("../includes/functions.php");

$id = $_GET['criteria_id'];
$comp = $_GET['competition_id'];

$query = "DELETE FROM criteria WHERE criteria_id = {$id}";
$res = mysqli_query($conn, $query);
header_to("view_criteria.php?competition_id=".$comp);

?>