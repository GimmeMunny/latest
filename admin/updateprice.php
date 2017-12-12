<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=ticketprices.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$name= $_POST['name'];
$price1=$_POST['price'];
$price2=$_POST['price2'];
$price3=$_POST['price3'];
$max=$_POST['max'];
$number=$_POST['number'];
$cid=$_POST['id'];
//Update contest to say its done3
	$query_update = "UPDATE Contest SET Name = '$name', Price = '$price1', Bundle1Price = '$price2', Bundle2Price = '$price3', Max = '$max',  NumberTickets = '$number' WHERE ContestID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);	

	
	
	
	?>
	
    Updating...