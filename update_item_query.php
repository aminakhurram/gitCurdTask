<?php
	require_once 'includes/db.php';
	

 if(isset($_POST['update_product'])){
	$update_p_id = $_POST['id'];
	$update_p_name = $_POST['name'];
	$update_p_price = $_POST['price'];
	$update_p_image = $_FILES['image']['name'];
	$update_p_image_tmp_name = $_FILES['image']['tmp_name'];
	$update_p_image_folder = 'uploaded_img/'.$update_p_image;
 



	$update_query= mysqli_query($conn, "UPDATE `products` SET `name` = '$update_p_name', `price` = '$update_p_price' ,`image` = '$update_p_image ' WHERE `id` = '$update_p_id'") or die(mysqli_error());

	   if($update_query){
		move_uploaded_file($update_p_image_tmp_name,$update_p_image_folder);
		header('location:CURDItemadmin.php');
		$message[] = 'product add succesfully';
  
	 }else{
		$message[] = 'could not add the product';
		header('location:CURDItemadmin.php');
	 }
	   //header("location:CURDItemadmin.php");


	
	}?>