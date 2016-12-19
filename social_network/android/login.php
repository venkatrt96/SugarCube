<?php

	require "connect.php";

	$email = $_POST['str_email'];
	$pass = $_POST['str_pass'];

	$get_user = "select * from users where user_email='$email' AND user_pass='$pass'";
	$run_user = mysqli_query($con,$get_user);
	$check = mysqli_num_rows($run_user);

	if ($check > 0) {
		$row = mysqli_fetch_assoc($run_user);	
		$gname = $row['user_name'];
		echo $gname;
	}	

?>