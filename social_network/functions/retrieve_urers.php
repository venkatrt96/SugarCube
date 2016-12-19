<?php

	function usersTable($var){

		$utget = mysqli_query($con,"SELECT * FROM users WHERE user_email='$email'");
		$ut1data = mysqli_fetch_array($ut1);

		$name1 = $ut1data[''];
		$pass1 = $ut1data[''];
		$email1 = $ut1data[''];
		$country1 = $ut1data[''];
		$gender1 = $ut1data[''];
		$b_day1 = $ut1data[''];
		$date11 = $ut1data[''];
		$date12 = $ut1data[''];
		$status1 = $ut1data[''];
		$posts1 = $ut1data[''];

		$utput = mysqli_query($con,"");

	}

?>