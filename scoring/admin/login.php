<?php 
include("../connection.php");
include("../includes/functions.php");

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);

 $result=mysqli_query($conn, "SELECT * FROM account WHERE username = '$username' AND password = '$password'");
 $row=mysqli_fetch_array($result);

//type.type_id = account.type_id
if($row>0){
	if($row['logged_in'] == FALSE){
			$aid = $row['account_id'];
			$query = "UPDATE account SET logged_in = 1 where account_id =".$aid;
			$res = mysqli_query($conn, $query);

			session_start();
			$_SESSION['aid'] = $row['account_id'];
		    $_SESSION['first']=$row['fname'];
		     $_SESSION['last']=$row['lname'];
		     $_SESSION['path']=$row['image_path'];
		     $_SESSION['image']=$row['image'];
		     $_SESSION['logged_in']= TRUE;
		     $_SESSION['type'] = $row['type_id'];
		    mysqli_free_result($res);
		header("Location:home.php");
	}else{
		echo "<script>";
		echo "window.alert(\"User Already Logged_in!\")";
		echo "</script>";

		echo "<script>";
		echo "window.location.href = (\"index.php\")";
		echo "</script>";

	}
	
}else{
$_SESSION['message'] = "Username/Password Did'nt match!"; 
header("Location:index.php");
}
?>