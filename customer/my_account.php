<!DOCTYPE>
<?php 
session_start();
include("../functions/functions.php");
?>
<html>

<head>

	<title>
		Jupiter Bargin Online Shops
	</title>
	
	<link rel="stylesheet" href="../styles/style.css" media="all" />
	
</head>

<body>
	<!--Main Start-->
	<div class="main_wrapper">
	
		<!--Head Start-->
		<div class="head_wrapper">
		
			<a href="../index.php"><img id="logo" src="../images/logo.gif"> </img> </a>
			<img id="bogo" src="../images/bogo.gif"></img>
			
		</div>
		<!--Head End-->
		
		<!--Menu Start-->
		<div class="menu_wrapper">
			
			<ul id="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../all_products.php">All product</a></li>
				<li><a href="my_account.php">My account</a></li>
				<li><a href="../customer_register.php">Sign Up</a></li>
				<li><a href="../cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product"/ > 
					<input type="submit" name="search" value="Search" />
				</form>
			
			</div>
		
		</div>
		<!--Menu End-->
	
		<!--Content Start-->
		<div class="content_wrapper">
		
			<div id="side"> 
				
				<div id="side_title">
					Account
				</div>
				
				<div id="category_title">
				<?php
				
				
				$user = $_SESSION['customer_email'];
				
				$get_img = "select * from customers where customer_email='$user'";
				
				$run_img = mysqli_query($con,$get_img);
				
				$row_img = mysqli_fetch_array($run_img);
				
				$c_image = $row_img['customer_image'];
				
				$c_name = $row_img['customer_name'];
				
				echo "<p style='text-align:center; color:white; padding:10px; font-size:20px'>$user</p>";
				
				echo "<p style='text-align:center;'><img src='customer_image/$c_image' width='150' height='150'/></p>";
				
				echo "<p style='text-align:center; color:white; padding:10px; font-size:20px'>$c_image</p>";
				
				?>
				<ul id="category_title">
				<li><br></li>
				<li><a href="my_account.php?my_orders">My Orders</a></li>
				<li><a href="my_account.php?edit_account">Edit Account</a></li>
				<li><a href="my_account.php?change_pass">Change Password</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
				<li><a href="logout.php">Logout</a></li>
				
				<ul>
				
				<ul>
					
				</div>
				
				
			
			</div>
			
			<!--Shopping Cart function-->
			<?php cart(); ?> 
			
			
			<div class="shopping_cart"> 
			
			<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
			<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email']  ;
					}
					else {
					echo "<b>Welcome Guest: Your </b>";
					}
			?>
			
					
			
			<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='../checkout.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='../logout.php' style='color:orange;'>Logout</a>";
					}
			?>
			
			</span> 
			
			</div>
			<div id="products_box">
				
				
				
				
				<?php 
				
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				echo "
				<h2 style='padding:20px;'>Welcome:  $c_name </h2>
				<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
				}
				}
				}
				
				?>
				
				<?php 
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}
				
				
				?>
				
			</div>
			
		</div>
		<!--Content End-->
		
		<!--Foot Start-->		
		<div class="foot_wrapper">
			<h3 style="text-align:center; ">&copy; 2014 by www.OnlineTuting.com</h3>
		</div>
		<!--Foot End---->
	
	</div>
	<!--Main End-->
	
	
</body>

</html>
