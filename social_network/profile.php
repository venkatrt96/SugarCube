<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome User!</title>
	<link rel="stylesheet" href="styles/profile.css" media="all"/>
</head>
<body>

<?php 

$email = $_SESSION['user_email']; 
#echo $email;

?>

<div class="container">
		<!--Header-->
		<div id="head_wrap">
			<div id="header">
				<div class="image">
					<img src="images/sugar-cubes-icon.png" style="float: left; padding: 5px;" id="img" />
					<h3>SugarCube</h3>
				</div>

				<form action="action.php" method="get" id="form1">
					<input type="text" size="60" placeholder="Find People" maxlength="200" id="search" />
					<input type="submit" value="Search" id="submit" />
				</form>

				<div id="menu">
					<center>
					<a href="profile.php">My Profile</a>
					<a href="home.php">Home</a>
					<a href=""><img src="images/notification-outline.png"></a>
					<a href=""><img src="images/speech_bubble.png"></a>
					</center>
				</div>
			</div>
		</div>

		<div id="content_wrap">

			<div id="content">
				<center><div id="">
					<?php include 'functions/imgpath.php' ?>
				</div></center>

				<br><br>
				<h3>Upload A New Profile Picture</h3>
				<br>

	 			<form action="addimg.php" method="post" enctype="multipart/form-data" name="form2">
	 				Select Image:<br>
	 				<input type="file" name="image" required="required" class="f1"><br>
	 				Caption(Provide A Unique Caption):<br>
	 				<input name="caption" type="text" required="required" class="f1" id="c1">
	 				<br>
	 				<input type="submit" name="Submit" value="Upload" id="b1">
	 			</form>

			</div>

			<div id="profile">
			<h3>My Profile</h3>
				<?php 

					$qr = "SELECT user_name,user_email,user_gender,user_country,user_b_day,status FROM users WHERE user_email='$email'";
					$result = mysqli_query($con,$qr) or die("Unable to fetch data");
					$fetch = mysqli_fetch_array($result);
					echo '<div id="right">';
					echo '<h4><i>Name : </i><b>'.$fetch['user_name'].'</b></h4>';
					echo '<h4><i>Email Id : </i><b>'.$fetch['user_email'].'</b></h4>';
					echo '<h4><i>Gender : </i><b>'.$fetch['user_gender'].'</b></h4>';
					echo '<h4><i>Country : </i><b>'.$fetch['user_country'].'</b></h4>';
					echo '<h4><i>Date Of Birth : </i><b>'.$fetch['user_b_day'].'</b></h4>';
					echo '</div>';

				?>
			</div>

		</div>

	<!--Footer-->
	<div id="footer">
		<h2>&copy; 2016 - The SugerCube Network</h2>
	</div>

</div>
</body>
</html>