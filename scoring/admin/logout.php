<?php 
include("../connection.php");
include("../includes/functions.php");
 
 session_start();
 $query = "UPDATE account SET logged_in = 0 where account_id =".$_SESSION['aid'];
 $res = mysqli_query($conn, $query);
 $_SESSION = array();
 session_destroy();

 header("Location:index.php");
?>