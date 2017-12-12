<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=payment.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$name= $_POST['name'];
$url=$_POST['url'];
$merchant=$_POST['merchant'];
$gateway=$_POST['gateway'];
$sign=$_POST['sign'];
$brand=$_POST['brand'];
$enabled=$_POST['enabled'];
      if ($enabled == '')
      {
          
         $enabled = 'No'; 
          
      }
$id=$_POST['id'];
//Update contest to say its done;
	$query_update = "UPDATE Payment SET BankName = '$name', CardBrand = '$brand', MerchantNumber = '$merchant', GatewayNumber = '$gateway', SignKey = '$sign',  SaleURL = '$url', Enabled = '$enabled' WHERE PaymentID = '$id'";
	$dberror = "";
	$ret = mysql_query($query_update);	
	
	echo $query_update;
	
	?>
	
    Updating...
      
  UPDATE Payment SET BankName = 'testafdadfasdfsdf', SaleURL = 'url', MerchantNumber = 'merchant', GatewayNumber = 'gateway', Sign = 'sign', CardBrand = 'Visa', Enabled = 'Yes' WHERE PaymentID= '1'	Updating...