<html>
	<head>
		<title>SugarCube</title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>


<body>
	<div class="container">
		<!--Header-->
		<div id="head_wrap">
			<div id="header">
				<div class="image">
					<img src="images/sugar-cubes-icon.png" style="float: left; padding: 5px;" />
					<h3>SugarCube</h3>
				</div>
				<form method="post" action="" id="form1">
					<strong>Email:</strong>
					<input type="email" name="email" placeholder="example@example.com" required="required" />
					<strong>Password:</strong>
					<input type="password" name="pass" placeholder="Password" required="required" />
					<button name="login">Login</button>
				</form>	
				<?php 
					include("login.php")
				 ?>
			</div>
		</div>