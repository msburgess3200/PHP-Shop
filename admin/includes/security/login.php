<?php
/* Security: Timeout */
require("../config.php");
require("../init.php");
$query = mysql_query("SELECT `id`, FROM_UNIXTIME(lastupdated) FROM `users` WHERE `id` = 1;", $q) or die(mysql_error());
$a = mysql_fetch_array($query);
$current_time = time();
$db_time	  = strtotime($a[1]);

echo $current_time."<br />";
echo $db_time."<br />";
echo "_________________________<br />";
echo $current_time-$a[1];
?>