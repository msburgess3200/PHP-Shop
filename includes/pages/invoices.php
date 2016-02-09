<?php
	if (isset($_GET['mod'])){
		$mod = $_GET['mod'];
		include("modules/invoices/". $mod .".php");
		exit;
	}

	$query = mysql_query("SELECT * FROM `invoices` WHERE `userid` = ". $_COOKIE['userid'] .";");
?>
<html>
	<head>
		<title>Invoices</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/hover.css" media="all" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>
<body>
	<table width="100%" height="100%" border="0">
		<tr>
			<td height="100%" width="10%" id="mainmenu">
				<?php include("includes/menu.php"); ?>
			</td>
			<td>
				<table width="100%" border="0">
					<tr>
						<td align="center" style="color:white;">
							<?php 
								if (isset($_GET['error'])){$error = $_GET['error'];}
								if ($error == 1){echo "<div class=\"bad\">Invoice not found!</div>";}
							?>
							<table id="invoice-table">
								<tr>
									<td>Invoice No.</td>
									<td>Amount</td>
									<td>Status</td>
									<td>Action</td>
								</tr>
<?php
while ($a = mysql_fetch_array($query)){?>
								<tr>
									<td><?php echo $a['id']; ?></td>
									<td><?php echo $a['amount']; ?></td>
									<td><?php if ($a['status'] == 0){
											echo "<div id=\"status-notpaid\">Not Paid</div>";
										}elseif ($a['status'] == 1){
											echo "<div id=\"status-pending\">Pending</div>";
										}elseif ($a['status'] == 2){
											echo "<div id=\"status-paid\">Paid</div>";
										}elseif ($a['status'] == 3){
											echo "<div id=\"status-declined\">Declined</div>";
										} ?></td>
									<td><a href="index.php?page=invoices&mod=view&id=<?php echo $a['id'];?>" target="_blank">View</a></td>
								</tr>
<?php
}
?>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<script type="text/javascript" src="js/loggedin.js"></script>
</body>
</html>
