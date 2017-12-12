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
}
Else
{
	$status = "enabled";
}

//Update contest to say its done;
	$query_update = "UPDATE Contest SET Status = '$status' WHERE ContestID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);
	
	?>
	
    Updating...