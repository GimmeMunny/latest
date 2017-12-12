<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

//get company info
	$query_company = "SELECT * FROM Company";
	@$result_company = mysql_query($query_company);
	@$numRows_company = mysql_num_rows($result_company);
$company_row = mysql_fetch_array($result_company);
$company = $company_row['CompanyName'];
$companyurl = $company_row['CompanyURL'];
$companyemail = $company_row['CompanyEmail'];
$companynoreplyemail = $company_row['CompanyNoReplyEmail'];
	
	$query_amount = "SELECT * FROM ContestAmount WHERE ContestID = '3' AND Status = 'open'";
	@$result_amount = mysql_query($query_amount);
	@$numRows_amount = mysql_num_rows($result_amount);
//output each row 
  while ($amount_row = mysql_fetch_array($result_amount)){
			$cid = $amount_row['ContestID'];
		  	$start = $amount_row['DrawingStart'];
			$end = $amount_row['DrawingEnd'];
			$newstart = strtotime ( '+1 month' , strtotime ( $start ) ) ;
			$newstart = date ( 'Y-m-d H:i:s' , $newstart );
			$newend = strtotime ( '+1 month' , strtotime ( $end ) ) ;
			$newend = date ( 'Y-m-d H:i:s' , $newend );
		  	$daily = $amount_row['Amount'];
		  	$a_daily = $daily/2;
		  	$d_daily = $daily * .02;
			$contest= $amount_row['ContestAmountID'];
	 
  }
  echo $newend;
  echo $newstart;
  
  ?>