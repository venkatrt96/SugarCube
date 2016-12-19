<?php

$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");
//$email = $_SESSION['user_email'];

$q = $_GET["q"];

$a[0] = "Ellen";
$a[1] = "Elex";
$a[2] = "Elexr";
$a[3] = "Jyothise Johny";
$a[4] = "Venkat Raman";
$a[5] = "Vipin PR";
$a[6] = "Bipin Dharmic";

for ($i = 0; $i < sizeof($a); $i++){ 
    $q = strtolower($q);
    //echo $q;
    $length = strlen($q);
    //echo $length;
    if (stristr($q, substr($a[$i], 0, $length))){
        echo "<h4><a href='$a[$i]'>$a[$i]</a></h4>";
    }
}

?>
<style type="text/css">

a{
    color: blue;
    text-decoration: none;
}

</style>