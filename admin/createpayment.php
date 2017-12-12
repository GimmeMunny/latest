<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=payment.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings


$name=$_POST['name'];
$brand=$_POST['brand'];
 $merchantnumber=$_POST['merchantnumber'];
$gatewaynumber=$_POST['gatewaynumber'];  
$signkey=$_POST['signkey'];
$url=$_POST['url'];
$enabled=$_POST['enabled'];

$query_update = "INSERT INTO Payment (BankName, CardBrand, MerchantNumber, GatewayNumber, SignKey, SaleURL, Enabled) VALUES ('$name', '$brand', '$merchantnumber', '$gatewaynumber', '$signkey', '$url', '$enabled')";
	$dberror = "";
	$ret = mysql_query($query_update);	
	//echo $query_update;
	

	
	?>
	
    Updating...