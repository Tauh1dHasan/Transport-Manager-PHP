<?php 
$con = mysqli_connect('localhost', 'root', '', 'dtm');
if (!$con) {
	echo "Database connection failed: ";
	mysqli_connect_errno($con);
	die();
	echo "<script> location = 'login.php' </script>";
}


?>