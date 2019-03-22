<?php
session_start();
include("../connection.php");
include("../includes/functions.php");

if($_GET['candidate_id'] == TRUE){

		$query = "SELECT image FROM candidate WHERE candidate_id = ".$_GET['candidate_id'];
		$res = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($res);
		$old_image = $row['image'];

		$comp = $_POST['competition'];
		$candnum = $_POST['candidate_num'];
		$representing = $_POST['representing'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];

	if($_FILES['myimage']['name'] && $_FILES['myimage']['name'] != ""){

	  $target_dir = "uploads/";
	  $target_image = $_FILES["myimage"]["name"];
	  $target_file = $target_dir . basename($_FILES["myimage"]["name"]);
	  $target_temp = $_FILES['myimage']['tmp_name'];
	  $uploadOk = 1;
	  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	  unlink($target_dir, $old_image);
	  move_uploaded_file($target_temp, "uploads/$target_image");



	}else{
		$target_image = $old_image;
	}
	 $query = "UPDATE candidate SET
	 								competition_id = '{$comp}',
	 								candidate_number = '{$candnum}',
	 								fname = '{$fname}',
	 								lname = '{$lname}',
	 								age = '{$age}',
	 								gender = '{$gender}',
	 								image = '{$target_image}' WHERE candidate_id =".$_GET['candidate_id'];
	 $var = mysqli_query($conn, $query);
	          header("Location:candidate.php");
}


?>
