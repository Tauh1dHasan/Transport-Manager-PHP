<?php
session_start();
// login security function
if (empty($_SESSION['user_pass'])) {
	echo "<script> location = 'login.php' </script>";
}else{
	$USERPASS = $_SESSION['user_pass'];
	$USERID = $_SESSION['user_id'];
}
?>