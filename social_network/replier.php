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

		<div id="posts">
		<?php 

		$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");
		$email = $_SESSION['user_email'];
		//echo $email;
		$openqt = $_GET['openqt'];
		$sqlgetstuff = "select detail from posts where question='$openqt';";
		$getstuff = mysqli_query($con,$sqlgetstuff);
		$dtstuff = mysqli_fetch_array($getstuff) or die("Unable to fetch data");
		$opendt = $dtstuff['detail'];
	
		//echo $openqt;
		//echo $dtstuff['detail'];	

		echo "<div id='selector'>";
		echo "<h3 id='qt'><a href=''>$openqt</a></h3>";
		echo "<p id='det'>$opendt</p><br>";

		echo '<div id="resp">';
		echo '<form action="" method="post" enctype="multipart/form-data" id="">';
	 			
	 	echo '<textarea type="text" name="resp" required="required" class="D"></textarea><br>';
	 			
	 	echo '<input type="submit" name="Post" value="Post" id="P">';
	 	echo '</form>';
		echo '</div>';


		if (isset($_POST['Post'])){

			$ansgot = mysqli_real_escape_string($con,$_POST['resp']);
			$sqlchk = "select answer from posts where question='$openqt';";
			$sqlchkc = mysqli_query($con,$sqlchk);
			$sqlchkcc = mysqli_fetch_array($sqlchkc);
			if ($sqlchkcc == ''){
				$sqldep = mysqli_query($con,"update posts set answer='$ansgot' where question='$openqt'");
			}
			else{
				$sqldep = mysqli_query($con,"insert into posts values ('','','$openqt','$opendt','$ansgot','$email',0)");
			}
			echo "<script type='text/javascript'>alert('Posted Successfully');</script>";
			//echo "<script>window.open('replier.php?openqt='$openqt'','_self')</script>";
			echo "<script>window.open('home.php','_self')</script>";
		}	


		echo "<br>";
		echo "<h3 id='ext'>Answers:</h3>";


		$sqlanss = "select answer,votes from posts where question='$openqt' order by p_id desc";
		$anssquery = mysqli_query($con,$sqlanss);

		while($anssarray = mysqli_fetch_array($anssquery)){
			$tmpanss = $anssarray['answer'];		
			if ($tmpanss==''){
				//echo "<p>No Answers Available!!</p>";
				break;
			}
			else{	

				$posts_ans = $anssarray['answer'];
				$posts_votes = $anssarray['votes'];

				echo "<p id='ans'>$posts_ans</p>";
				echo "<p id='vot'>Votes : $posts_votes</p><br>";
			}	
		}

		echo "</div>";

		?>
		</div>

</div>
</body>
</html>