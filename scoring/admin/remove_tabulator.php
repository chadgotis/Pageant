<?php 
include("../connection.php"); 
include("../includes/functions.php");

$id = $_GET['tabulator_id'];

$query = "DELETE FROM tabulator WHERE tabulator_id = {$id}";
$res = mysqli_query($conn, $query);
header_to("tabulator.php");
?>