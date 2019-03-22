<?php 
include("../connection.php"); 
include("../includes/functions.php");

$id = $_GET['candidate_id'];

$query = "DELETE FROM candidate WHERE candidate_id = {$id}";
$res = mysqli_query($conn, $query);
alert_message("Success!");
header_to("candidate.php");

?>