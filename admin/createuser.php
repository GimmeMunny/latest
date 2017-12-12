<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="3;URL=users.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
include("auth.php"); 
//my SQL query strings


//get company info
$query_company = "SELECT * FROM Company";
@$result_company = mysql_query($query_company);
@$numRows_company = mysql_num_rows($result_company);
$company_row = mysql_fetch_array($result_company);
$company = $company_row['CompanyName'];
$companyurl = $company_row['CompanyURL'];
$adminurl = $company_row['AdminURL'];
$companyemail = $company_row['CompanyEmail'];
$companynoreplyemail = $company_row['CompanyNoReplyEmail'];
$companysplit = $company_row['CompanySplit'];
$timezone = $company_row['CompanyTimeZone'];

$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

$query_update = "INSERT INTO User (Username, Password, Email) VALUES ('$username', '$password', '$email')";
	$dberror = "";
	$ret = mysql_query($query_update);	
	//echo $query_update;
	
	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
$subject = 'Here is your Admin Login Details';
$message = "You were given Admin Access To " . $company . "\n";

$message = $message . 'URL: ' . $adminurl . "\n";
$message = $message . 'Username:  ' . $username . "\n";
$message = $message . 'Password:  ' . $password . "\n";
$message = $message . 'Email:  ' . $email . "\n";



 	$email = $email;
	$to      = $email;

 
	mail($to, $subject, $message);

	
	?>
	
    Updating...