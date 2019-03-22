<?php
include("../connection.php");

if($_GET['competition_id'] == TRUE){
$c_id = $_GET['competition_id'];
$query = "DELETE FROM competition WHERE competition_id = {$c_id}";
$res = mysqli_query($conn, $query);
$query ="DELETE FROM candidate WHERE competition_id = {$c_id}";
$ress = mysqli_query($conn, $query);

header("Location:competition.php");
}else{

$id = $_GET['account_id'];
$tid = $_GET['type_id'];

$query = "DELETE FROM account WHERE account_id = {$id}";
$res = mysqli_query($conn, $query);
if(!$res){
	echo "Removing data failed! Abort!";
}else{
	if($tid == 1){
	header("Location:admin.php");
	}elseif ($tid == 2) {
	header("Location:tabulator.php");
	}elseif ($tid == 3) {
	header("Location:judge.php");
	}else{
		echo "Error!";
	}
}
}
?>
