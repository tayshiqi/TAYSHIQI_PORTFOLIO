<?php
include "config.php";

session_destroy();

header("refresh:2; url=admin_login.php");

?>


<!DOCTYPE html>
<html>
<head><title>Kanso Fruits Admin Logout</title>
<link rel="icon" href="images/logo.png" type="images/png">
<link rel="stylesheet" href="css/design.css" />
</head>

<body>

	<div id="background">
	
	<div class="lgf">
	
		<div id="logo1" style="text-align:center;">
			<a href="index.html" style="text-decoration:none; outline:none; border:none;">
			<img src="images/logo.png" title="Kanso Fruits" alt="Kanso Fruits Logo" /></a>
			<br>
			<h3 style=" margin:15px; font-size:1.2em;">Admin Logout</h3>
			<p style=" margin:15px;">Thank You</p>
		</div>
		
	</div>
	
	</div>

</body>

</html>