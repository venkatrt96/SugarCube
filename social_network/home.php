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

				<form action="" method="get" id="form1">
					
					<div class="dropdown">
						
						<input type="text" size="60" onkeyup="showResult(this.value)" placeholder="Find People" autocomplete="off" maxlength="200" id="search" />
						
  						<div class="dropdown-content">
    						<div id="txtHint"></div>
	 	 				</div>
					</div>

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
		

		<div id="poster">
			<form action="quora.php" method="post" enctype="multipart/form-data" id="form2">
	 			Question:<br>
	 			<textarea maxlength="2000" rows="25" cols="80" type="text" name="Question" required="required" class="Q"></textarea><br>
	 			Detail:<br>
	 			<textarea maxlength="10000" rows="50" cols="80" name="Detail" type="text" class="D"></textarea>
	 			<br>
	 			<input type="submit" name="Post" value="Post" id="P">
	 		</form>
		</div>

		<div id="posts">
			<?php  

				require 'includes/connection.php';
				$psql = "select distinct question,detail from posts order by p_id desc;";
				$ppass = mysqli_query($con,$psql);
				while($prow = mysqli_fetch_array($ppass)){

					$posts_qt = $prow['question'];
					$posts_dt = $prow['detail'];
					//$posts_id_sql = mysqli_query($con,"select p_id from posts where question='$posts_qt'");
					//$posts_id = mysqli_fetch_array($posts_id_sql);

					echo "<div id='selector'>";
					echo "<h3 id='qt'><a href='replier.php?openqt=$posts_qt'>$posts_qt</a></h3>";
					echo "<p id='det'>$posts_dt</p><br>";

					$email = $_SESSION['user_email'];
					$ansqt = $prow['question'];
					$ansdt = $prow['detail'];
					
					$tmp = $prow['question'];
					$ppass1 = mysqli_query($con,"select distinct answer,votes from posts where question='$tmp' order by p_id desc;");

					echo "<br>";
					echo "<h3 id='ext'>Answers:</h3>";

					while($prow1 = mysqli_fetch_array($ppass1)){	
						$tmpans = $prow1['answer'];	
						if ($tmpans!=""){	

							$posts_ans = $prow1['answer'];
							$posts_votes = $prow1['votes'];

							echo "<p id='ans'>$posts_ans</p>";
							//echo "<p id='vot'>Votes : $posts_votes</p><br>";
						}	
						else{
							//echo "<p>No Answers Available!!</p>";
							break;
						}
					}
					echo "</div>";
				}
		
			?>
		</div>

</div>
</body>
</html>