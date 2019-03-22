<?php
session_start();
include("../connection.php");
include("../includes/functions.php");

if($_GET['account_id'] == TRUE || $_GET['type_id'] ==1){

		$query = "SELECT image FROM account WHERE account_id = ".$_GET['account_id'];
		$res = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($res);
		$old_image = $row['image'];

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];

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
	 $query = "UPDATE account SET
	 								fname = '{$fname}',
	 								lname = '{$lname}',
	 								username = '{$username}',
	 								password = '{$password}',
	 								image = '{$target_image}' WHERE account_id =".$_GET['account_id'];
	 $var = mysqli_query($conn, $query);
	          header("Location:admin.php");
}else{
	$type = $_POST['type'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$password = $_POST['password'];

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
	    	$fname = $_POST['fname'];
	    	$lname = $_POST['lname'];
	    	$username = $_POST['username'];
	    	$password = $_POST['password'];

	        $query = "INSERT INTO account (type_id , fname, lname, username, password, image, image_path) VALUES ('{$type}','{$fname}', '{$lname}', '{$username}','{$password}', '{$target_image}','{$target_dir}')";
	        $var = mysqli_query($conn, $query);
			       if($type == 1){
			        header("Location:admin.php");
			    	}elseif ($type == 2) {
			    	header("Location:tabulator.php");
			    	}else{
			    		if($type == 3){
			    			header("Location:judge.php");
			    		}
			    	}
	    }

}



?>
