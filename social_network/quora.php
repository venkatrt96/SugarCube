<?php

	session_start();

	include('includes/connection.php');
	$email = $_SESSION['user_email']; 

	if (isset($_POST['Post'])){

		$qt = mysqli_real_escape_string($con,$_POST['Question']);
		$dt = mysqli_real_escape_string($con,$_POST['Detail']);

		$qsql = "insert into `posts` (`p_id`, `user_email`, `question`, `detail`, `answer`, `votes`) values ('', '$email', '$qt', '$dt', '', '');";
		$run = mysqli_query($con,$qsql);

		if ($run){

			echo "<script type='text/javascript'>alert('Posted Successful');</script>";
			echo "<script>window.open('home.php','_self')</script>";

		}

	}

?>