<?
// connect to database 
include("include/conn.php"); 

$deleterecords = "TRUNCATE TABLE Email3"; //empty the table of its current records
mysql_query($deleterecords);

?>