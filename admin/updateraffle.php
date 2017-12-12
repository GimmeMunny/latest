<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=index.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$cid = $_GET['id'];
$action=$_GET['action'];

if ($action == "disable" )
{
	$status = "disabled";
	//Update contest to say its done;
	$query_update = "UPDATE Raffle SET RaffleStatus = '$status' WHERE RaffleID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);
}
if (action == "enable")
{
	$status = "open";
	//Update contest to say its done;
	$query_update = "UPDATE Raffle SET RaffleStatus = '$status' WHERE RaffleID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);
}

Else {
$name= $_POST['name'];
$category= $_POST['category'];
$raffleamount=$_POST['raffleamount'];
$price=$_POST['price'];
$bundle3=$_POST['bundle3'];
$bundle5=$_POST['bundle5'];
$desc=$_POST['desc'];
$cid=$_POST['id'];
//Update contest to say its done;
	$query_update = "UPDATE Raffle SET RaffleName = '$name', RaffleCategory = '$category', RaffleMax = '$raffleamount', RaffleTicketPrice = '$price', RaffleBundle3 = '$bundle3', RaffleBundle5 = '$bundle5', RaffleDescription = '$desc' WHERE RaffleID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);	
	
	
}

	
	?>
	
    Updating...