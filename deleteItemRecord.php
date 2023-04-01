<?php
include_once("includes/db.php");


 if(isset($_GET['delete'])){
	$delete_id = $_GET['delete'];
	$delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE pid = $delete_id ") or die('query failed');
	if($delete_query){
	   header('location:CURDItemadmin.php');
	   $message[] = 'product has been deleted';
	}else{
	   header('location:CURDItemadmin.php');
	   $message[] = 'product could not be deleted';
	};
 };
 

?>
