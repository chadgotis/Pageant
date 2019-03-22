<?php 
include("../connection.php");
include("../includes/functions.php");

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);

 $result=mysqli_query($conn, "SELECT tabulator.*,competition.name FROM tabulator INNER JOIN competition WHERE username = '$username' AND password = '$password' AND competition.competition_id = tabulator.competition_id");
 $row=mysqli_fetch_array($result);
//type.type_id = account.type_id
if($row>0){
session_start();
$_SESSION['competition_id'] = $row['competition_id'];
$_SESSION['competition_name']=$row['name'];
$_SESSION['logged_in']= TRUE;
header_to("tabulator.php");
}else{
    header_to("index.php");
}
?>