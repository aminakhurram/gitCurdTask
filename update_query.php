<?php
	require_once 'includes/db.php';
	
	if(ISSET($_POST['update'])){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$Password= $_POST['Password'];
		$passwordHash = base64_encode($Password);
		$role= $_POST['role'];
		
		mysqli_query($conn, "UPDATE `user` SET `username` = '$username', `email` = '$email' , `Password` = '$passwordHash',`role` = '$role' WHERE `id` = '$id'") or die(mysqli_error());

		header("location:CURDsearch.php");
	}
?> 