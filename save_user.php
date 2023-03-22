<?php
	require_once 'db.php';
	
	if(ISSET($_POST['save'])){
		$id= $_POST['id'];
		$username = $_POST['username'];
		$Password=$_POST["Password"];
		$passwordHash = base64_encode($Password);
		$email = $_POST['email'];
		$role = $_POST['role'];
		
	
	
		  
		 $sql = "INSERT INTO user (username, Password, email,role)
		 VALUES ('$username', '$passwordHash', '$email','$role')";
	
		if (mysqli_query($conn, $sql)) {
		
		   header("location: CURDsearch.php");
		 } else {
		   echo "Error creating database: " . mysqli_error($conn);
		 }
		 
		 mysqli_close($conn);

		 
		 }



		
	
?>