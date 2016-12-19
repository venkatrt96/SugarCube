<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome User!</title>
	<link rel="stylesheet" href="styles/home.css" media="all"/>
	<script src="js/home.js"></script>
</head>
<body>

<!--<h1>Welcome <?php echo $_SESSION['user_email']; ?></h1>
-->
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

		<div id="left">
			<div id="lcont">
				<button><a href="count.php?index=myqt">My Questions?</a></button>
				<button><a href="count.php?index=mypt">My Posts</a></button>
				<button>My Codes</button>
				<button>My Videos</button>
				<button>My Photos</button>
				
			</div>
		</div>

		<div id="posts">
<?php 

	$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");
	$email = $_SESSION['user_email'];
	//echo $email;
	$open = $_GET['index'];
	if ($open == "myqt"){
		$sqlgetstuff = "select distinct question,detail from posts where user_email='$email' group by question order by p_id desc";
		$getstuff = mysqli_query($con,$sqlgetstuff);
			
		while($gottystuff = mysqli_fetch_array($getstuff)){

			$myqt = $gottystuff['question'];
			$mydt = $gottystuff['detail'];

			echo "<div id='selector'>";
			echo "<h3 id='qt'><a href='replier.php?openqt=$myqt'>$myqt</a></h3>";
			echo "<p id='det'>$mydt</p><br>";
			echo "</div>";

		}
	}
	if ($open == "mypt"){
		
	}

?>

</div>
</div>
</body>
</html>
