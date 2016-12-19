<?php

session_start();

include('includes/connection.php');

if (!isset($_FILES['image']['tmp_name'])) {
	echo "<script type='text/javascript'>alert('Please Upload A Image File');</script>";
}
else{

	$email = $_SESSION['user_email'];

	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
	move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
			
	$location="photos/" . $_FILES["image"]["name"];
	$caption=mysqli_real_escape_string($con,$_POST['caption']);
	echo $caption;

	$save = mysqli_query($con,"INSERT INTO photos (ph_id, user_email, location, caption) VALUES ('','$email','$location','$caption')");
	$sqly = mysqli_query($con,"UPDATE users SET user_image='$location' WHERE user_email='$email'") or die("Unable to fetch data");

	echo $caption;
	echo $email;

	if($sqly){
		echo "<script>alert('Profile Picture Updated');</script>";
	}
	// Update Not Working

//	include 'functions/retrieve_users.php';
//	usersTable($caption);

	header("location: profile.php");
	exit();					
	}
?>
