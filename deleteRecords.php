<?php
include_once("db.php");
if($_REQUEST['empid']) {
	$sql = "DELETE FROM user WHERE id='".$_REQUEST['empid']."'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	
	if($resultset) {
		echo "Record Deleted";
	}
}
?>
