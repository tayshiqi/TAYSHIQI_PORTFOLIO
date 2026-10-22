 <?php
include("config.php"); 

if (!isset($_SESSION["sess_cid"])) 
{
	header("Location: login.php"); 
}
else
{
	$sess_cid = $_SESSION["sess_cid"];
	
	$get_customer = mysqli_query($conn, "select * from customertbl where cust_id=$sess_cid");
	
	$cust_rec = mysqli_fetch_assoc($get_customer );
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Edit Profile</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.slidertron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
			
		</noscript>
		
		<link rel="stylesheet" href="css/customer_design.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		
		<script type="text/javascript">
	
		function check_form()
		{
			var no_error = true;
			var cust_name = document.editfrm.cust_name.value;
			var cust_contact = document.editfrm.cust_contact.value;
			var cust_email = document.editfrm.cust_email.value;
			var cust_gender = document.editfrm.cust_gender.value;
			
			if (cust_name == "")
			{
				document.getElementById("err_name").innerHTML="Please key-in your name.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_name").innerHTML="";
			}
			
			if (cust_contact == "")
			{
				document.getElementById("err_contact").innerHTML="Please key-in your contact number.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_contact").innerHTML="";
			}
			
			if (cust_email == "")
			{
				document.getElementById("err_email").innerHTML="Please key-in your email address.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_email").innerHTML="";
			}
			
			if (cust_gender == "")
			{
				document.getElementById("err_gender").innerHTML="Please select your gender.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_gender").innerHTML="";
			}
		
			return no_error;
		}
		
	</script>
		
		
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<div id="logo"><a href="index.html" style="text-decoration:none; outline:none; border:none;"><img src="images/logo.png" title="Kanso Fruits" alt="Kanso Fruits Logo"/></a></div>
				<h1><a href="index.html"> KANSO FRUIT</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about_us.php">About Us</a></li>
						<li>
							<a href="" class="icon fa-angle-down">Products</a>
							<ul>
								<li><a href="premium_fruit.php">Premium Fruits</a></li>
								<li><a href="seasonal_fruit.php">Seasonal Fruits</a></li>
								<li><a href="citrus_fruit.php">Citrus Fruits</a></li>
								<li><a href="stone_fruit.php">Stone Fruits</a></li>
							</ul>
						</li>
						<li><a href="customer_view_cart.php" class="icon fa-shopping-cart"></a></li>
						<li>
							<a href="" class="icon fa-list"></a>
							<ul>
								<li><a href="customer_profile.php" class="icon fa-user">&nbsp;&nbsp;&nbsp;Account</a></li>
								<li><a href="customer_view_product_list.php" class="icon fa-th">&nbsp;&nbsp;&nbsp;Product List</a></li>
								<li><a href="customer_order_list.php" class="icon fa-history">&nbsp;&nbsp;&nbsp;Order List</a></li>
								<li><a href="user_logout.php" class="icon fa-sign-out">&nbsp;&nbsp;&nbsp;Sign Out</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
		
		<div class="custprofile">
			<h3>Edit Profile</h3>
		</div>
			<section id="main" class="wrapper style1">
				<div class="custbox">
					<!-- Content -->
							<p>
								<a href="customer_profile.php" class="icon fas fa-user">&nbsp;&nbsp;Profile</a>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="edit_customer_profile.php?edit_pk=$sess_cid" class="icon fas fa-pencil-square-o ">&nbsp;Edit Profile</a>
							</p>
							<hr>
							<h3>Hi, <?php  echo $cust_rec["cust_name"];?>! </h3>
							
							<form name="editfrm" action="" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="return check_form();">

							<?php
								
								if ($cust_rec["cust_image"] == "")
								{
									$filename = "customer_image/user.png";
								}
								else
								{
									$filename = "customer_image/".$cust_rec["cust_image"];
								}
							
							?>
							
							
							<div class="custprofpic">
								<img src= "<?php echo $filename; ?>"> 
								<br>Upload Your Picture:<br>
								<input type="file" name="cust_image" class="file"/>
							</div>
							
							<div class="custprofdetail2">

									<label>Name </label>:
									<p><input value="<?php echo $cust_rec['cust_name']; ?>" type="text" name="cust_name" size="50" maxlength="40" class="details"/>
									<span id="err_name" style="color:red; font-style:italic; font-size:0.8em;"></span>
									</p>
								
									<label>Email </label>:
									<p><input value="<?php echo $cust_rec['cust_email']; ?>" type="email" name="cust_email" size="40" maxlength="30" class="details"/>
									<span id="err_email" style="color:red; font-style:italic; font-size:0.8em;"></span>
									</p>
									
									<label>Contact  </label>:
									<p><input value="<?php echo $cust_rec['cust_contact']; ?>" type="text" name="cust_contact" size="20" maxlength="15" 
									placeholder="xxx-xxx-xxxx" class="details"/>
									<span id="err_contact" style="color:red; font-style:italic; font-size:0.8em;"></span>
									</p>
								
									<label >Gender </label>:
										<input type="radio" <?php if($cust_rec["cust_gender"] == "Female")echo"checked"; ?> name="cust_gender" value="Female" >
										<label for="Female" >Female</label>
										<input type="radio" <?php if($cust_rec["cust_gender"] == "Male")echo"checked"; ?> name="cust_gender" value="Male">
										<label for="Male" >Male</label>
									<span id="err_gender" style="color:red; font-style:italic; font-size:0.8em; padding-left:180px;"></span>
									<br>
									
									
									<label>Birth Date </label>: 
									<p><input value="<?php echo $cust_rec["cust_dob"]; ?>" type="date" name="cust_birthdate" class="details"/>
									</p>
									
									
									<label>Join Date </label>:
									<p><?php  echo $cust_rec["cust_join_date"];?>
									</p>
								
									<p>
									<input type="button" name="backbtn" value="Back" onclick="window.location.href='customer_profile.php';">
									&nbsp;&nbsp;
									<input type="submit" name="updatebtn" value="Update" />
									</p>
							
							</div>
							
							</form>
												
						
				</div>
			</section>
		
		
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="https://x.com/KansoFruit123" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://www.instagram.com/kansofruit/" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="mailto:kansofruit@gmail.com" class="icon fa-envelope"><span class="label">Envelope</span></a></li>
				</ul>
				<ul class="menu">
					<li><a href="faqs.php">FAQs</a></li>
					<li><a href="terms_of_use.php">Terms of Use</a></li>
					<li><a href="privacy_policy.php">Privacy</a></li>
					<li><a href="contactus.php">Contact</a></li>
				</ul>
				<span class="copyright">
					&copy; Copyright Kanso Fruits 2024. All rights reserved. 
				</span>
			</footer>

	</body>
</html>

<?php

if(isset($_POST["updatebtn"]))
{
	$cname = $_POST["cust_name"];
	$cemail = $_POST["cust_email"];
	$ccontact = $_POST["cust_contact"];
	$cgender = $_POST["cust_gender"];
	$cdob = $_POST["cust_birthdate"];
	
	$filename = $_FILES["cust_image"]["name"];
	$tempname = $_FILES["cust_image"]["tmp_name"];

	$check_duplicate_customer_name = mysqli_query($conn,"select * from customertbl where cust_name = '$cname' and cust_id != $sess_cid");
	
	if (mysqli_num_rows($check_duplicate_customer_name) > 0)
	{
		echo 
		"<script type='text/javascript'>
			alert('A record with this User Name already exists.');
			window.location.href='edit_customer_profile.php?edit_pk=".$sess_cid."';
		</script>";
	}
	else
	{
		$new_filename = date("YmdHis")."_".$filename;
		
		$path ="customer_image/".$filename;
		
		if (move_uploaded_file($tempname,$path))
		{
			mysqli_query($conn,
			"Update customertbl set
			cust_name = '$cname',
			cust_email = '$cemail',
			cust_contact = '$ccontact',
			cust_gender = '$cgender',
			cust_dob = '$cdob',
			cust_image = '$filename'

			where cust_id = $sess_cid");
			
			echo
			"<script type='text/javascript'>
				alert('Record updated successfully.');
				setTimeout(function(){ window.location.href='customer_profile.php' },2000);
			</script>
			";
		}
		else
		{
			mysqli_query($conn,
			"Update customertbl set
			cust_name = '$cname',
			cust_email = '$cemail',
			cust_contact = '$ccontact',
			cust_gender = '$cgender',
			cust_dob = '$cdob'

			where cust_id = $sess_cid");
			
			echo
			"<script type='text/javascript'>
				alert('Record updated successfully.');
				setTimeout(function(){ window.location.href='customer_profile.php' },2000);
			</script>
			";
		}
	
	
	}
}

?>