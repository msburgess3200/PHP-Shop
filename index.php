<?php
if (isset($_GET['error'])){
	$error = $_GET['error'];
	} 
if (isset($_GET['msg'])){
	$msg = $_GET['msg'];
	}
if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == 1){
	$page = $_GET['page'];
	include("includes/pages.php");
	exit;
}
if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == 1 && isset($_GET['action'])){
	$action = $_GET['action'];
	include("includes/actions.php");
	exit;
}
if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == 1 && isset($_GET['security'])){
	$action = $_GET['action'];
	include("includes/security/security.php");
	exit;
}
?>
<html>
	<head>
		<title>Welcome!</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/hover.css" media="all" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>
<body>
	<table width="100%" height="100%" border="0">
		<tr>
			<td>
				<table width="100%" border="0">
					<tr>
						<td align="center" style="color:white;">
							<h2>Portal Login:</h2>
								<br />
								<?php
									// error codes
									if ($_GET['error'] == 1){
										echo "<div class=\"bad\">Please enter a valid username!</div>";
									}
									if ($_GET['error'] == 2){
										echo "<div class=\"bad\">Please enter a valid password!</div>";
									}
									if ($_GET['error'] == 3){
										echo "<div class=\"bad\">Invalid username or password!</div>";
									}
									if ($_GET['error'] == 4){
										echo "<div class=\"bad\">Oh no! Something went wrong!<br />Please contact the developer!</div>";
									}
									if ($_GET['error'] == 5){
										echo "<div class=\"bad\">Database connection problem: <br />" . $msg . "</div>";
									}
									if ($_GET['error'] == 6){
										echo "<div class=\"good\">Cookies cleared!<br />You have been logged out.</div>";
									}
									if ($_GET['error'] == 7){
										echo "<div class=\"bad\">Session timed out!<br />You have been logged out.</div>";
									}
									if ($_GET['error'] == 8){
										echo "<div class=\"bad\">An error has occurred!<br />Please try your request again.</div>";
									}
								?>
								<br />
								<form id="login" method="POST" action="/login.php" onSubmit="return CheckLogin();">
									<table border="0">
										<tr>
											<td>
												<label for="usernameBox" class="Label">Username / Email: </label>
											</td>
											<td>
												<input type="text" id="usernameBox" name="username" value="<?php if (isset($_SESSION['catch']['username'])){echo $_SESSION['catch']['username'];}else{echo "john.doe";} ?>" />
											</td>
										</tr>
										<tr>
											<td>
												<label for="passwordBox" class="Label">Password: </label>
											</td>
											<td>
												<input type="password" id="passwordBox" name="password" value="<?php if (isset($_SESSION['catch']['password'])){echo $_SESSION['catch']['password'];}else{echo "password";} ?>" />
											</td>
										</tr>
										<tr>
											<td>
												<label for="rememberBox" class="Label">Remember Me: </label>
											</td>
											<td>
												<input type="checkbox" name="rememberme" id="rememberBox" value="1" />
											</td>
										</tr>
										<tr>
											<td></td>
											<td><input type="submit" value="Login" id="submit" /></td>
										</tr>
									</table>
								</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
