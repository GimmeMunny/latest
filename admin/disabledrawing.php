<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$cid = $_GET['id'];

//Update contest to say its done;
	$query_update = "UPDATE Contest SET Status = 'disabled' WHERE ContestID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);
	
	
	?>