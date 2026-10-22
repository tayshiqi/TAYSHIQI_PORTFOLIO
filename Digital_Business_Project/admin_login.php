<?php
include "config.php";
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Admin Login</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/design.css" />
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

		<script type="text/javascript">

		function check_form()
		{
			var no_error = true;
			var email_address = document.signinfrm.email_address.value;
			var password = document.signinfrm.password.value;

			if (email_address == "")
			{
				document.getElementById("err_email").innerHTML="Please key-in the email address.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_email").innerHTML="";
			}

			if (password == "")
			{
				document.getElementById("err_password").innerHTML="Please key-in the password.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_password").innerHTML="";
			}
			
			return no_error;
		}

		</script>
		
	</head>
	<body>

		<!-- Background -->
		
		<div id="background">
		
			<div class="lgf">
			
			<form name="signinfrm" action="" method="post" onsubmit="return check_form();">
			<div id="logo" style="text-align:center;">
				<a href="index.html" style="text-decoration:none; outline:none; border:none;">
				<img src="images/logo.png" title="Kanso Fruits" alt="Kanso Fruits Logo" width="40%" height="40%" /></a>
			</div>
			
				<h3 style="text-align:center; margin:15px;">Admin Login</h3>
				
				<p>
					<input type="email" name="email_address" placeholder="Email Address" class="details"/>
					<br><span id="err_email" style="color:red; font-style:italic; font-size:0.8em;"></span>
				</p>
				
				<p> 
					<input type="password" name="password" placeholder="Password" class="details"/>
					<br><span id="err_password" style="color:red; font-style:italic; font-size:0.8em;"></span>
				</p>
				
				<p style="margin-bottom:0;">
					<input type="submit" name="loginbtn" value="Sign-In" />	
				</p>

			</form>

			</div>
			
		</div>

	</body>
</html>

<?php


if (isset($_POST["loginbtn"])) 
{

	$email = $_POST["email_address"];
	$password = md5($_POST["password"]); 
	
	$admin_login = mysqli_query($conn, "select * from admintbl where admin_email='$email' and admin_password = '$password'");
	

	if (mysqli_num_rows($admin_login) == 1)
	{
		$admin_rec = mysqli_fetch_assoc($admin_login); 
	
		$_SESSION["sess_aid"] = $admin_rec["admin_id"]; 

		header("Location: admin_dashboard.php");
	}
	else
	{
		echo 
		"<script type='text/JavaScript'>
			alert('The email address or password is invalid.');
		</script>";
	}
	
}
?>