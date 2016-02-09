<?php
if (!$config['init']['debug'] == 0){
	error_reporting(E_ALL);
}
session_start();
$q = mysql_connect($config['data']['hostname'],$config['data']['username'],$config['data']['password']) or die("Database connection problem: " . mysql_error());
mysql_select_db($config['data']['database'], $q) or die(header("Location: ./index.php?error=5&msg=" . mysql_error()));

$settingsinfo = mysql_query("SELECT * FROM `settings`;", $q);
$settings = array();
while($sett = mysql_fetch_array($settingsinfo)){
	$settings[$sett['name']] = $sett['value'];
}
?>