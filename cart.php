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
					echo "<b>Welcome Guest: Your</b>";
					}
					?>
					
					<b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="index.php" style="color:yellow">Back to Shop</a>
					
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
			
				<form action="" method="post" enctype="multipart/form-data">
			
					<table align="center" width="700" bgcolor="skyblue" >
					
					
						<tr align="center">
							 <th>Remove</th>  
							 <th>Products</th>  
							 <th>Quantity</th>  
							 <th>Total Price</th>  
						</tr>
					
						<?php $total =0;
	
							global $con;
	
							$ip = getIp();
	
							$sel_price = "select * from cart where ip_add='$ip'";
		
							$run_price = mysqli_query($con, $sel_price);
		
							while ($p_price=mysqli_fetch_array($run_price)){
		
								$pro_id = $p_price['p_id'];
								
								$qty    = $p_price['qty'];
		
								$pro_price = "select * from products where product_id='$pro_id'";
		
								$run_pro_price = mysqli_query($con, $pro_price);
		
								while ($pp_price = mysqli_fetch_array($run_pro_price)){
						
									$product_price = array($pp_price['product_price']);
			
									$product_title = $pp_price['product_title'];
			
									$product_image = $pp_price['product_image'];
			
									$single_price = $pp_price['product_price'];
				
									$values = array_sum($product_price);

									$total += $values;
								
							
						?>
						
						<tr align="center"> 
							<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" > </td>
							
							<td><?php echo $product_title; ?>
							    <br>
								<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60">							
							</td>
							<td>
							<input type="text" size="4" name="qty" value="<?php if(isset($_POST['update_cart'])){echo $_SESSION['qty'];} else {echo $qty;} ?>"/>
							
							</td>
							
							<?php 
							
							
						if(isset($_POST['update_cart'])){
						
							$qty = $_POST['qty'];
							
							$update_qty = "update cart set qty='$qty'";
							
							$run_qty = mysqli_query($con, $update_qty); 
							
							$_SESSION['qty']=$qty;
							
							$total = $total*$qty;
						}
						
						
						?>
							
							<td><?php echo "$ ". $single_price;?></td>
							
						</tr>
						
											
						<?php } }?>
						
						
						<tr align="right">
							<td colspan="5"> <b>Sub Total: </b></td>
							<td align="center"> <?php echo "   $  ". $total;?></td>

						</tr>
						
						<tr align="center">
							
							<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
							
							<td><input type="submit" name="continue" value="Continue Shopping"></td>
							
							<td><button><a href="checkout.php" style="text-decoration:none; color:black ">Checkout</a></button></td>
					
						
						</tr>
					
					</table>
					
			    </form>
				
				
				<?php
				
				function updatecart() {						
					global $con; 
		
					$ip = getIp();
		
					if(isset($_POST['update_cart'])){
		
						foreach($_POST['remove'] as $remove_id){
			
							$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
			
							$run_delete = mysqli_query($con, $delete_product); 
			
							if($run_delete){
			
							echo "<script>window.open('cart.php','_self')</script>";
			
					}}}
					
					
					if(isset($_POST['continue'])){
					
					echo "<script>window.open('index.php','_self')</script>";
					}

					}
					
					echo @$up_cart=updatecart();
					
			
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
