<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

//get company info
//my SQL query strings
	$query_company = "SELECT * FROM Company";
	@$result_company = mysql_query($query_company);
	@$numRows_company = mysql_num_rows($result_company);
$company_row = mysql_fetch_array($result_company);
$company = $company_row['CompanyName'];
$companyurl = $company_row['CompanyURL'];
$companyemail = $company_row['CompanyEmail'];
$companynoreplyemail = $company_row['CompanyNoReplyEmail'];
$timezone = $company_row['CompanyTimeZone'];

$date = new DateTime("now", new DateTimeZone($company_row['CompanyTimeZone']) );

$cid = '1';

//echo $dt->format('Y-m-d H:i:s');

$query_status = "SELECT Status FROM Contest WHERE ContestID = '1'";
			$result_status = mysql_query($query_status);
			$status_row = mysql_fetch_array($result_status);
			$status = $status_row['Status'];
			print $contest;

$query_amount = "SELECT * FROM ContestAmount WHERE ContestID = '1' AND Status = 'open'";
	@$result_amount = mysql_query($query_amount);
	@$numRows_amount = mysql_num_rows($result_amount);
	$amount_row = mysql_fetch_array($result_amount);
	if ($amount_row == NULL and $status == 'enabled')
	{
		//create contest

	$now = $date->format('Y-m-d H:i:s');
	$newstart = strtotime (strtotime ( $now ) ) ;
	$newstart = date ( 'Y-m-d H:i:s' , $newstart );
	$newend = strtotime ( '+1 day -1 hour' , strtotime ( $now ) ) ;
	$newend = date ( 'Y-m-d H:i:s' , $newend );
	echo $newend;
	echo $now;
    
		
	}
	else if($amount_row == NULL and $status == 'disabled')
	{
		print 'done';
	}
//echo $newstart;
?>


                