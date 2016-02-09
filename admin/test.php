<?php
require("includes/config.php");
require("includes/init.php");

$query = mysql_query("SELECT `id`, `firstname`, `lastname`, `email`, FROM_UNIXTIME(lastupdated) FROM `users`;");
$a = mysql_fetch_array($query);
print_r($a);
?>