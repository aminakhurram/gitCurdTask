

<?php 

$db_user = "root";
$db_pass = "";
$db_name = "curd2 ";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST)){


	$username 		= $_POST['username'];
	$email 			= $_POST['email'];
	$Password 		= sha1($_POST['Password']);

		$sql = "INSERT INTO users (username, email, Password ) VALUES(?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$username, $email, $Password]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}
?>