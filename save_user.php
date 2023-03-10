<?php
	require_once 'db.php';
	
	if(ISSET($_POST['save'])){
		$id= $_POST['id'];
		$username = $_POST['username'];
		$Password = $_POST['Password'];
		$email = $_POST['email'];
	
		  
		 $sql = "INSERT INTO user (username, Password, email)
		 VALUES ('$username', '$Password', '$email')";
	
		if (mysqli_query($conn, $sql)) {
		
		   header("location: CURDsearch.php");
		 } else {
		   echo "Error creating database: " . mysqli_error($conn);
		 }
		 
		 mysqli_close($conn);

		 
		 }



		
	
?>