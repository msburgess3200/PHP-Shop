<?php
	/************************************
			THIS FILE IS PROPERTY
			OF TSS3, INC.
	 ************************************/
require("includes/config.php");
require("includes/init.php");
if (!$_POST){
	die("No information provided. Cancelling API token...");
}
// login post data
$username = $_POST['username'];
$password = $_POST['password'];
$pass_en  = md5($password);
/* ... Let's check the submitted data ... */
if ($username == "john.doe" || $username == ""){
	header("Location: ./index.php?error=1");
	exit;
}
if ($password == "password" || $password == ""){
	header("Location: ./index.php?error=2");
	exit;
}
$query = mysql_query("SELECT * FROM `users` WHERE `username` = '". $username ."' AND `password` = '". $pass_en ."' AND `enabled` = 1;", $q) or die(header("Location: ./index.php?error=5&msg=" . mysql_error()));
$count = mysql_num_rows($query);
$info  = mysql_fetch_array($query);
$_SESSION['catch'] = array();
$_SESSION['catch']['username'] = $username;
$_SESSION['catch']['password'] = $password;
/* Checking database for username ... */
if ($count == 0){
	/* No username matches, so let's check the email ... */
	$query = mysql_query("SELECT * FROM `users` WHERE `email` = '". $username ."' AND `password` = '". $pass_en ."';", $q);
	$count = mysql_num_rows($query);
	$info = mysql_fetch_array($query);
	if ($count == 0){
		header("Location: ./index.php?error=3");
		exit;
	}elseif ($count > 1){
		header("Location: ./index.php?error=4");
		exit;
	}elseif ($count == 1){
		setcookie("loggedin", 1);
		setcookie("username", $username);
		setcookie("userid", $info['id']);
		mysql_query("UPDATE `users` SET `lastloggedin` = UNIX_TIMESTAMP(now()) WHERE `id` = ". $info['id'] .";", $q);
		mysql_query("UPDATE `users` SET `pageupdate` = UNIX_TIMESTAMP(now()) WHERE `id` = ". $info['id'] .";", $q);
		header("Location: ./index.php?page=home");
	}
}elseif ($count == 1){
		setcookie("loggedin", 1);
		setcookie("username", $username);
		setcookie("userid", $info['id']);
		mysql_query("UPDATE `users` SET `lastloggedin` = UNIX_TIMESTAMP(now()) WHERE `id` = ". $info['id'] .";", $q);
		mysql_query("UPDATE `users` SET `pageupdate` = UNIX_TIMESTAMP(now()) WHERE `id` = ". $info['id'] .";", $q);
		header("Location: ./index.php?page=home");
	}
?>