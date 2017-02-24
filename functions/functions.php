<?php

//connecte to mysql database ecommerce
$con = mysqli_connect("localhost","root","","ecommerce");


//getting the categories
function getCategory(){
	
	// to make $con work inside the function.
	global $con;
	
	$get_cats = "select * from categories";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while ($row_cats = mysqli_fetch_array($run_cats)){
		
		$cat_id    = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}


//getting the categories
function getBrand(){
	
	// to make $con work inside the function.
	global $con;
	
	$get_brands = "select * from brands";
	
	$run_brands = mysqli_query($con, $get_brands);
	
	while ($row_brands = mysqli_fetch_array($run_brands)){
		
		$brand_id    = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];

		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

#add option list
function option_Category(){
	
	global $con;
		
	$get_cats = "select * from categories";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
		echo "<option value='$cat_id'>$cat_title</option>";
	
	
	}
					
}

#add option list
function option_Brand(){
	
	global $con;
		
	$get_brands = "select * from brands";
	
	$run_brands = mysqli_query($con, $get_brands);
	
	while ($row_brands=mysqli_fetch_array($run_brands)){
	
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	
		echo "<option value='$brand_id'>$brand_title</option>";
	
	
	}
					
}

#show product in product_wrapper
function getProduct(){

	if (!isset($_GET['cat'])){
		if (!isset($_GET['brand'])){
	
	global $con; 
	
	$get_pro = "select * from products order by RAND() LIMIT 0,6";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3 align='center'>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='180' height='180' />
					
					<p><b> Price: $ $pro_price </b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
		}
	}
	}

#Show all the product
function getProductall(){

	if (!isset($_GET['cat'])){
		if (!isset($_GET['brand'])){
	
	global $con; 
	
	$get_pro = "select * from products";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3 align='center'>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='180' height='180' />
					
					<p><b> Price: $ $pro_price </b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
		}
	}
	}

	
#Show product by category
function getCategoryProduct(){

	if (isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];
	
	global $con; 
	
	$get_cat_pro = "select * from products where product_cat='$cat_id' order by RAND() LIMIT 0,6";

	$run_cat_pro = mysqli_query($con, $get_cat_pro); 
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if ($count_cats == 0 ){
	
	echo "<h2> There is no product in this category! </h2>";
	}
	else {	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
		$pro_cat_id = $row_cat_pro['product_id'];
		$pro_cat_cat = $row_cat_pro['product_cat'];
		$pro_cat_brand = $row_cat_pro['product_brand'];
		$pro_cat_title = $row_cat_pro['product_title'];
		$pro_cat_price = $row_cat_pro['product_price'];
		$pro_cat_image = $row_cat_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3 align='center'>$pro_cat_title</h3>
					
					<img src='admin_area/product_images/$pro_cat_image' width='180' height='180' />
					
					<p><b> Price: $ $pro_cat_price </b></p>
					
					<a href='details.php?pro_id=$pro_cat_id' style='float:left;'>Details</a>
					
					<a href='index.php?add_cart=$pro_cat_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
	}	}
	}
	
	}

#show product by brand
function getBrandProduct(){

	if (isset($_GET['brand'])){
		
		$brand_id = $_GET['brand'];
	
	global $con; 
	
	$get_brand_pro = "select * from products where product_brand='$brand_id' order by RAND() LIMIT 0,6";

	$run_brand_pro = mysqli_query($con, $get_brand_pro); 
	
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
	
		$pro_brand_id = $row_brand_pro['product_id'];
		$pro_brand_cat = $row_brand_pro['product_cat'];
		$pro_brand_brand = $row_brand_pro['product_brand'];
		$pro_brand_title = $row_brand_pro['product_title'];
		$pro_brand_price = $row_brand_pro['product_price'];
		$pro_brand_image = $row_brand_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3 align='center'>$pro_brand_title</h3>
					
					<img src='admin_area/product_images/$pro_brand_image' width='180' height='180' />
					
					<p><b> Price: $ $pro_brand_price </b></p>
					
					<a href='details.php?pro_id=$pro_brand_id' style='float:left;'>Details</a>
					
					<a href='index.php?add_cart=$pro_brand_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
	}
	
	}

#show product detail
function getDetail(){

	global $con; 
	
	if (isset($_GET['pro_id'])){
		
	$product_id=$_GET['pro_id'];
		
	$get_pro = "select * from products where product_id='$product_id'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3 align='center'>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='400' height='400' />
					
					<p><b> Price: $ $pro_price </b></p>
					
					<a href='index.php' style='float:left;'>Go Back</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
	}
	
}

#add search function to search box
function Search(){

	global $con; 

	if (isset($_GET['search'])){
		
	$search_query=$_GET['user_query'];
		
	$get_pro = "select * from products where product_keywords like '%$search_query%'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3 align='center'>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='180' height='180' />
					
					<p><b> Price: $ $pro_price </b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
	}
}

#Getting User Ip Address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}

//creating the shopping cart
function cart(){

if(isset($_GET['add_cart'])){

	global $con; 
	
	$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
	
	$run_check = mysqli_query($con, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "insert into cart (p_id,ip_add,qty) values ('$pro_id','$ip','1')";
	
	$run_pro = mysqli_query($con, $insert_pro); 
	
	echo "<script>window.open('index.php','_self')</script>";
	}
	
}
}


#getting total added items
function total_items(){
	global $con; 
	
	
	if(isset($_GET['add_cart'])){

	
	
	$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$get_items = "select * from cart where ip_add='$ip' ";
	
	$run_items= mysqli_query($con, $get_items); 
	
	$count_items = mysqli_num_rows($run_items);
	
	}
	
	else {
		
		
	$ip = getIp(); 
	
	$get_items = "select * from cart where ip_add='$ip' ";
	
	$run_items= mysqli_query($con, $get_items); 
	
	$count_items = mysqli_num_rows($run_items);
		
	}
	
	echo $count_items;
}



#getting total price

function total_price(){
	
	$total =0;
	
	global $con;
	
	$ip = getIp();
	
	$sel_price = "select * from cart where ip_add='$ip'";
	
	$run_price = mysqli_query($con, $sel_price);
		
		while ($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id = $p_price['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($con, $pro_price);
		
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
						
			$product_price = array($pp_price['product_price']);
			
			$values = array_sum($product_price);
			
			$total +=$values;
			
			}
		
		
		}
		
		echo "$" . $total;
		
	
}

function check_price(){
	
	$total =0;
	
	global $con;
	
	$ip = getIp();
	
	$sel_price = "select * from cart where ip_add='$ip'";
	
	$run_price = mysqli_query($con, $sel_price);
		
		while ($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id = $p_price['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($con, $pro_price);
		
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
						
			$product_price = array($pp_price['product_price']);
			
			$product_title = $pp_price['product_title'];
			
			$product_image = $pp_price['product_image'];
			
			$single_price = $pp_price['product_price'];
			
			
			
			$values = array_sum($product_price);
			
			$total +=$values;
			
			}
		
		
		}
		
		echo "$" . $total;
		
	
}

?>