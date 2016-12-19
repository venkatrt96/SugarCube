<?php

$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");

$sqlget = mysqli_query($con,"SELECT user_image FROM users WHERE user_email='$email'") or die("Unable to fetch data");;
$locationget = mysqli_fetch_array($sqlget);
#echo $captionget['user_image'];
$cget = $locationget['user_image'];

$sql = mysqli_query($con,"SELECT location FROM photos WHERE location='$cget'") or die("Unable to fetch data");;
$path = mysqli_fetch_array($sql);

echo '<img src="'.$path['location'].'" id="pic">';

?>