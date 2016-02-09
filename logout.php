<?php
if (isset($_GET['script'])){
	$script = $_GET['script'];
}
	session_start();
	unset($_COOKIE['loggedin']);
	unset($_COOKIE['username']);
	unset($_COOKIE['userid']);
	unset($_COOKIE['PHPSESSID']);
	setcookie("loggedin", "", time() - 3600);
	setcookie("username", "", time() - 3600);
	setcookie("userid", "", time() - 3600);
	setcookie("PHPSESSID", "", time() - 3600);
	unset($_SESSION['catch']);
	session_destroy();

	if ($script == 1){
		header("Location: ./index.php?error=7");
	}else{
		header("Location: ./index.php?error=6");
	}
?>