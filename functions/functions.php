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


function getProduct(){

	if (!isset($_GET['cat'])){
		if (!isset($_GET['brand'])){
	
	global $con; 
	
	$get_pro = "select * from products ";

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
					
					<a href='#'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
		}
	}
	}
	
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
					
					<a href='#'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
	}	}
	}
	
	}
	
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
					
					<a href='#'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
	}
	
	}

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
					
					<a href='#'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
	}
	
}

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
					
					<a href='#'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
	}
}


?>