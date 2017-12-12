<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=index_design.php"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$cid = $_POST['id'];
$content_string=$_POST['article-body'];
$content = htmlspecialchars($content_string);
$name=$_POST['name'];


$query_update = "UPDATE Content SET ContentName = '$name', Content = '$content' WHERE ContentID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);	
	echo $query_update;
	


	
	?>
	
    Updating...