<!DOCTYPE>

<?php 

include("../functions/functions.php");

?>
<html>
	<head>
		<title>Inserting Product</title> 
		
	</head>
	
<body bgcolor="skyblue">

<form action="insert_product.php" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="795" border="2" bgcolor="#187eae">
			
			<tr align="center">
				<td colspan="7"><h2>Insert New Post Here</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60"  /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
					<select name="product_cat">
					<option >Select a category</option>
					<?php option_Category() ?>
				    </select>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Brand:</b></td>
				<td>
					<select name="product_brand">
					<option >Select a brand</option>
					<?php option_Brand() ?>
				    </select>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td><input type="text" name="product_price" size="60"  /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Keywords:</b></td>
				<td><input type="text" name="product_keywords" size="60"  /></td>
			</tr>
			
						
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			</tr>
		
		</table>
	
	
	</form>
</body> 
</html>

<?php 
	
	//_POST was used here to receive the information from the above form using the method _POST

	if(isset($_POST['insert_post'])){ 
	 
	//getting the text data from the fields
		$product_title = $_POST['product_title'];
		$product_cat= $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		
		
	//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
	
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
	//insert the form data to mysql database 
		$insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
		
		$insert_pro = mysqli_query($con, $insert_product);
		
	//Check whether the database insert is successful or not
	//yes, show a window message
		if($insert_pro){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('insert_product.php','_self')</script>";
		 echo "'$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords'";
		}
	
	
	
	}
?>