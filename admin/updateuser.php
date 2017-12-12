<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=users.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$username= $_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$cid=$_POST['id'];
//Update contest to say its done3
	$query_update = "UPDATE User SET Username = '$username', Password = '$password', Email = '$email' WHERE UserID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);	

	
	
	?>
	
    Updating...