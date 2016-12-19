<?php
include('includes/connection.php');
$result = mysqli_query($con,"SELECT * FROM photos");
while($row = mysqli_fetch_array($result))
{
echo '<div id="imagelist">';
echo '<p><img src="'.$row['location'].'"></p>';
echo '<p id="caption">'.$row['caption'].' </p>';
echo '</div>';
}
?>