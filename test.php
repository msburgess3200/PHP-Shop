<?php
require("includes/config.php");
require("includes/init.php");

$query = mysql_query("SELECT * FROM `invoices`;") or die(mysql_error());
$a = mysql_fetch_array($query);
$b = json_decode($a['items'], true);
foreach ($b as $value){
	// echo "SELECT * FROM `items` WHERE `id` = ". $value ."AND `enabled` = 1;";
	$c = mysql_query("SELECT * FROM `items` WHERE `id` = ". $value ." AND `enabled` = 1;") or die(mysql_error());
	$d = mysql_fetch_array($c);
	echo $d['name'];
}
// print_r($b);

// $a = array(1,2,3,4,5,6,7,8,9);
// $b = json_encode($a);
// echo $b;
?>