<?php
/* 
	Internal Security:
	MODULE: AutoLogout
*/
header("Content-Type: application/json"); // fixes format instead of webpage
if ($_COOKIE['loggedin'] == 1){
	$query = mysql_query("SELECT `pageupdate` FROM `users` WHERE `id` = ". $_COOKIE['userid'] .";", $q);
	$a = mysql_fetch_array($query);
	$json = json_encode(array(
		"success" => 1,
		"time"	  => time(),
		"account" => $a['pageupdate']
	));
}else{
	$json = json_encode(array(
		"error" => "ERROR: 101 - NOT LOGGED INTO THE SYSTEM"
	));
}
	echo $json;
?>