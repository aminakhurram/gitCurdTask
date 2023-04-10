<?php
include("includes/db.php");
session_start();
if (!isset($_SESSION['id'])){
header('location:loginForm.php');
}

$id = $_SESSION['id'];

$query=mysql_query ("SELECT * FROM user WHERE id ='$id'") or die(mysql_error());
$row=mysql_fetch_array($query);

$id=$row['id'];
$username=$row['username'];
$email=$row['email'];
$role=$row['role'];
?>