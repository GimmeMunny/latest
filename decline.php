<?php
include("../include/conn.php"); 

//this is most of the info you need to add to your database


$action=$_GET['Action'];
$username=$_GET['Username'];
$password=$_GET['Password'];
$email=$_POST['Email'];
$first=$_POST['Firstname'];
$last=$_POST['Lastname'];
$trans=$_POST['TransactionID'];
$id=$_GET['MerchantReference'];
$cardmask=$_POST['CardMask'];
$key=$_POST['key'];
$extra1=$_POST['Extra1'];


$myFile = "test.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $id; 
//$stringData = $stringData + $extra1; //you can add all the other strings.
fwrite($fh, $stringData);
fclose($fh);
			
			
?>