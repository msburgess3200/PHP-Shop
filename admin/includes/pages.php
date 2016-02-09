<?php
switch ($page){
	case "home":
		include("pages/home.php");
		exit;
		break;
	case "adduser":
		include("pages/adduser.php");
		exit;
		break;
	default:
		include("pages/home.php");
		exit;
		break;
}
?>