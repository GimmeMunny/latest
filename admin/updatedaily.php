<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=dailyemail.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$cid = $_POST['id'];
$content=$_POST['article-body'];
$subject=$_POST['subject'];


$query_update = "UPDATE EmailTemplate SET EmailSubject = '$subject', EmailBody = '$content' WHERE EmailID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);	
	//echo $query_update;
	


	
	?>
	
    Updating...