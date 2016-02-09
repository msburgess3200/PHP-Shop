<?php
	if (isset($_GET['id'])){
		$id = $_GET['id'];
	}
	$query = mysql_query("SELECT * FROM `invoices` WHERE `userid` = ". $_COOKIE['userid'] ." AND `id` = ". $id .";", $q) or die(mysql_error());
	$count = mysql_num_rows($query);
	if ($count !== 1){
		header("Location: ./index.php?error=1");
		exit;
	}
	$a     = mysql_fetch_array($query);
	$info = mysql_query("SELECT `firstname`,`lastname`,`address`,`company`,`city`,`state`,`zipcode`,`countrycode`,`phone` FROM `users` WHERE `id` = ". $_COOKIE['userid'] .";", $q) or die(mysql_error());
	$userinfo = mysql_fetch_array($info);
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>Invoice #<?php echo $id; ?></title>
	<link rel='stylesheet' type='text/css' href='css/invoice.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery.min.js'></script>
</head>
<body>
	<div id="page-wrap">
		<div id="header">INVOICE</div>
		<div id="identity">
            <div id="address"><?php echo $userinfo['firstname']." ".$userinfo['lastname']; ?><br />
<?php if ($userinfo['company']){echo $userinfo['company']."<br />";} ?>
<?php echo $userinfo['address']; ?><br />
<?php echo $userinfo['city']. " ," . $userinfo['state']. " ".$userinfo['zipcode']; ?><br />
Phone: <?php echo "+".$userinfo['countrycode']." ".$userinfo['phone']; ?></div>
            <div id="logo">
              TSS3, INC.
            </div>
		</div>
		<div style="clear:both"></div>
		<div id="customer">
            <div id="customer-title"><?php echo $config['company']['name']; ?></div>
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><div><?php echo $id; ?></div></td>
                </tr>
                <tr>
                    <td class="meta-head">Date</td>
                    <td><div id="date"><?php echo date("F d, Y",$a['date']); ?></div></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">$875.00</div></td>
                </tr>
            </table>
		</div>
		<table id="items">
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
<?php
$b = json_decode($a['items'], true);
$qty = json_decode($a['qty'], true);
$pr = json_decode($a['prices'], true);
$i = 0;
foreach ($b as $value){
	$it = mysql_query("SELECT * FROM `items` WHERE `id` = ". $value .";");
	$itemlist = mysql_fetch_array($it);
	?>
	<tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><div><?php echo $itemlist['name']; ?></div></div></td>
		      <td class="description"><div><?php echo $itemlist['description']; ?></div></td>
		      <td><div class="cost">$<?php echo $pr[$i]; ?></div></td>
		      <td><div class="qty"><?php echo $qty[$i]; ?></div></td>
		      <td><span class="price">$<?php echo $pr[$i]*$qty[$i]; ?></span></td>
		  </tr>
<?php
$subprice = $pr[$i]*$qty[$i];
	$i++;
}
?>	  
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">$<?php echo $subprice; ?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Tax</td>
		      <td class="total-value"><div id="subtotal">$0.01</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">$875.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>
		      <td class="total-value"><div id="paid">$0.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">$875.00</div></td>
		  </tr>
		</table>
	</div>
	<script type="text/javascript" src="js/loggedin.js"></script>
</body>
</html>