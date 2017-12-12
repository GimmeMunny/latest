<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=users.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$cid = $_GET['id'];


$query_update = "DELETE from User WHERE UserID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);	
	//echo $query_update;
	


	
	?>
	
    Deleting...