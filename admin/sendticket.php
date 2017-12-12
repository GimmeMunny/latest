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
$body=$_POST['article-body'];
$subject=$_POST['subject'];
$email=$_POST['email'];
//$desc=$_POST['desc'];


	$to = "derek.baehr@gmail.com"; 
    $from = $companynoreplyemail;
    $subject = $subject;


//We are sending this email to say no winners
   $message = $body;
	

	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
	
	
	?>