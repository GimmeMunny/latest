<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=index_admin.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$name= $_POST['name'];
$url=$_POST['url'];
$noreply=$_POST['noreply'];
$email=$_POST['email'];
$time=$_POST['time'];
$split=$_POST['split'];
$charity=$_POST['charity'];
$charity_enabled=$_POST['enabled'];
$cid=$_POST['id'];
//Update contest to say its done;
	$query_update = "UPDATE Company SET CompanyName = '$name', CompanyURL = '$url', CompanyNoReplyEmail = '$noreply', CompanyEmail = '$email', CompanyTimeZone = '$time', CompanySplit = '$split', CompanyCharity = '$charity', CharityEnabled = '$charity_enabled' WHERE CompanyID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);	
	
	echo $charity_enabled;
	
	?>
	
    Updating...