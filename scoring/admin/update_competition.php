<?php 
include("../connection.php"); 
include("../includes/functions.php");
$a = $_POST['title'];
$b = $_POST['description'];
$c = $_POST['status'];

$res = update_competition($a,$b,$c,$_GET['competition_id']);
header_to("competition.php");
?>