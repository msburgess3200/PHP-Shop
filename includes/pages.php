<?php
require("config.php");
require("init.php");
mysql_query("UPDATE `users` SET `pageupdate` = UNIX_TIMESTAMP(now()) WHERE `id` = ". $_COOKIE['userid'] .";", $q);
switch ($page){
	case "home":
		include("pages/home.php");
		exit;
		break;
	case "invoices":
		include("pages/invoices.php");
		exit;
		break;
	default:
		include("pages/home.php");
		exit;
		break;
}
?>