<?php
include("config.php"); 

session_destroy();

header("refresh:3; url=login.php");

?>

<!DOCTYPE html>
<html>
<head><title>Kanso Fruits</title>
<link rel="icon" href="images/logo.png" type="images/png">

	<style type= "text/css">
		
	*{
		padding:0px;
		margin:0px;
	}
		
	#background{
		width:100%;
		height:100vh;
		background-image:linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)),url(images/banner3.jpg);
		background-size:cover;
		background-position:center;
	}
		
	.lgf{
		border:1px solid transparent;
	}
		
	#logo1 img{
		width:40%; 
		height:40%;
	}
				
	#logo1{
		background-color:#FBF8EF;
		width:25%;
		margin:150px auto;
		padding:10px;
		border-radius:20px;
	}
	
	</style>
	
</head>
<body>

<div id="background">
	
	<div class="lgf">
	
		<div id="logo1" style="text-align:center;">
			<a href="index.html" style="text-decoration:none; outline:none; border:none;">
			<img src="images/logo.png" title="Kanso Fruits" alt="Kanso Fruits Logo" /></a>
			<br>
			<h3 style=" margin:15px; font-size:1.2em;">You’re Logged Out!</h3>
			<p style=" margin:15px; ">Thank you for being with us. <br>
			Come back soon! 😉
			</p>
		</div>
		
	</div>
	
</div>


</body>
</html>