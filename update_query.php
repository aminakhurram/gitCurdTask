<?php
	require_once 'db.php';
	
	if(ISSET($_POST['update'])){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$Password= $_POST['Password'];
		
		mysqli_query($conn, "UPDATE `user` SET `username` = '$username', `email` = '$email' , `Password` = '$Password' WHERE `id` = '$id'") or die(mysqli_error());

		header("location:CURDsearch.php");
	}
?> 