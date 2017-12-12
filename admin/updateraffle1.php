
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
$raffleamount=$_POST['raffleamount'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$cid=$_POST['id'];
//Update contest to say its done;
	$query_update = "UPDATE Raffle SET RaffleName = '$name', RaffleMax = '$raffleamount', RaffleTicketPrice = '$price', RaffleDescription = '$desc' WHERE RaffleID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);	
	echo $query_update;
	echo $name;
	
}

	
	?>
	
    Updating...