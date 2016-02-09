<?php
if (!$config['init']['debug'] == 0){
	error_reporting(E_ALL);
}
session_start();
$q = mysql_connect($config['data']['hostname'],$config['data']['username'],$config['data']['password']) or die("Database connection problem: " . mysql_error());
mysql_select_db($config['data']['database'], $q) or die(header("Location: ./index.php?error=5&msg=" . mysql_error()));
?>