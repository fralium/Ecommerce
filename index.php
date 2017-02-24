<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");
?>
<html>

<head>

	<title>
		Jupiter Bargin Online Shops
	</title>
	
	<link rel="stylesheet" href="styles/style.css" media="all" />
	
</head>

<body>
	<!--Main Start-->
	<div class="main_wrapper">
	
		<!--Head Start-->
		<div class="head_wrapper">
		
			<a href="index.php"><img id="logo" src="images/logo.gif"> </img> </a>
			<img id="bogo" src="images/bogo.gif"></img>
			
		</div>
		<!--Head End-->
		
		<!--Menu Start-->
		<div class="menu_wrapper">
			
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All product</a></li>
				<li><a href="customer/my_account.php">My account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
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
					Category
				</div>
				
				<div id="category_title">
				
					<?php getCategory(); ?>
					
				</div>
				
				<div id="side_title">
					Brand
				</div>
				
				<div id="category_title">
					
					<?php getBrand(); ?>
					
				</div>
			
			</div>
			
			<!--Shopping Cart function-->
			<?php cart(); ?> 
			
			
			<div class="shopping_cart"> 
			
			<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
			
			<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest: Your </b>";
					}
			?>
			
					<b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Shopping Cart</a>
			<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					
					
					
					?>
			</span>
			
			</div>
			
			<div class="product_wrapper"> 
			<?php getProduct(); ?>
			<?php getCategoryProduct(); ?>
			<?php getBrandProduct(); ?>
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
