<?php

	include("includes/connection.php");

	global $con;

	if(isset($_POST['sign_up'])){

		//Prevent insertion of code using
		//mysqli_real_escape_string($con,____);

		$name = mysqli_real_escape_string($con,$_POST['u_name']);
		$pass = mysqli_real_escape_string($con,$_POST['u_pass']);
		$email = mysqli_real_escape_string($con,$_POST['u_email']);
		$country = mysqli_real_escape_string($con,$_POST['u_country']);
		$gender = mysqli_real_escape_string($con,$_POST['u_gender']);
		$b_day = mysqli_real_escape_string($con,$_POST['u_birthday']);
		$date = date("d-m-y");
		$status = "Unverified";
		$posts = "No";

		$get_email = "select * from users where user_email='$email'";
		$run_email = mysqli_query($con,$get_email);
		$check = mysqli_num_rows($run_email);

		if($check == 1){

			//echo "<h2>This email is already registered!</h2>";
			echo "<script type='text/javascript'>alert('This email is already registered!');</script>";
			exit();
		}


		if(strlen($pass)<8){

			echo "<script type='text/javascript'>alert('Password must be atleast 8 characters long');</script>";
			exit();
		}
		else{

			$insert = "insert into users (user_name,user_pass,user_email,user_country,user_gender,user_b_day,user_image,register_date,last_login,status,posts) values ('$name','$pass','$email','$country','$gender','$b_day','default','$date',NOW(),'$status','$posts')";
			//NOW() gives the current date

			$run_insert = mysqli_query($con,$insert);

			if ($run_insert){
				//For Session
				$_SESSION['user_email'] = $email;
				echo "<script type='text/javascript'>alert('Registration Successful');</script>";
				echo "<script>window.open('home.php','_self')</script>";
			}

		}

	}



?>