<?php
session_start();
include("../connection.php");
include("../includes/functions.php");

$comp = $_POST['competition'];
$candnum = $_POST['candidate_num'];
$representing = $_POST['representing'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
if($comp == 0){
	header_to("candidate.php");
	alert_message("Please Pick A Competition!");
}else{

	$target_dir = "uploads/";
	$target_image = basename($_FILES["myimage"]["name"]);
	$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



//	if($target_image == ""){
//		echo "Lol"."<br>";
//		$uploadOk = 0;
//	}else



		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
		}

	    if (move_uploaded_file($_FILES["myimage"]["tmp_name"], $target_file)) {
	    	$_SESSION['message'] = "Success!";
	    	$type = $_POST['type'];
			       if($type == 1){
			        header("Location:admin.php");
			    	}elseif ($type == 2) {
			    	header("Location:tabulator.php");
			    	}else{
			    		if($type == 3){
			    			header("Location:judge.php");
			    		}
			    	}

$query = "INSERT INTO candidate(competition_id,candidate_number,representing,fname,lname,gender,age,image,image_path)
		VALUES ('{$comp}','{$candnum}','{$representing}','{$fname}','{$lname}','{$gender}','{$age}','{$target_image}','{$target_dir}')";
$res = mysqli_query($conn,$query);
confirm_query($res);
alert_message("Success!");
header_to("candidate.php");
}
}
?>
