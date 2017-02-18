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

		echo "<li><a href='#'>$cat_title</a></li>";
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

		echo "<li><a href='#'>$brand_title</a></li>";
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






?>