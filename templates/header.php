<?php 
include_once "include/db_init.php";
include_once 'include/functions.php';
start_session();
include_once 'include/pre.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crypto Wallet</title>

<link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>
	<div class="main">
		<div class="header">
			<div class="header_logo">
				<img src="images/logo.png" height="125" width="125">
			</div>
			<div class="header_left">
				<div class="header_name">
					<h2>Crypto-Wallet</h2>
				</div>
				<div class="navbar">
					<div class="menu_nav">
						<ul>
							<li><a href="?action=accounts">Accounts</a></li>
							<li><a href="?action=trade">Trade</a></li>
							<li><a href="?action=buy_sell">Buy/Sell</a></li>
							<li><a href="?action=help">Help</a></li>
							<li>
								<?php 
									if(is_login()){
										echo "<a href='?action=logout'>Log Out</a>";
									}else{
										echo "<a href='?action=login'>Sign In</a>";
									}

								?>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>



