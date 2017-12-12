<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=index_design.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$content=$_POST['article-body'];
$name=$_POST['name'];


$query_update = "INSERT INTO Content (ContentName, Content) VALUES ('$name', '$content')";
	$dberror = "";
	$ret = mysql_query($query_update);	
	echo $query_update;
	

	
	?>
	
    Updating...