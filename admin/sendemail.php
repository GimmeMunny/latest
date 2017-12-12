<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GimmeMunny|Admin</title>
<script src="include/ckeditor.js"></script>
	
	<style>

		/* Style the CKEditor element to look like a textfield */
		.cke_textarea_inline
		{
			padding: 10px;
			height: 200px;
			overflow: auto;
			width:600px;

			border: 1px solid gray;
			-webkit-appearance: textfield;
		}

	</style>

<!-- CSS -->
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style/css/sample.css" rel="stylesheet" type="text/css" media="screen" />

<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>

<?php
// connect to database 
include("include/conn.php"); 


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
$database=$_POST['database'];
if ($database=='investor')
{
	$query_order = "SELECT DISTINCT (EmailAddress) AS EmailAddress FROM InvestorDatabase";
	$result_order = mysql_query($query_order);
	//print $database;
}
else
{
	$query_order = "SELECT DISTINCT (EmailAddress) AS EmailAddress FROM InvestorDatabase";
	$result_order = mysql_query($query_order);
	//print $database;	
}
	
	//output each ticket
	$i=1;
  while ($row = mysql_fetch_array($result_order)){
	  $email_to = ($row['EmailAddress']);
	  $submitter = ($row['Submitter']);
	  $i++;


	$to = $email_to; 
	//$to = 'derek.baehr@gmail.com';
    $from = $companynoreplyemail;
    $subject = $subject;


//We are sending this email to say no winners
   $message = $body;
	

	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
  }
	
	

//get time
//my SQL query strings
	$query_timezone = "SELECT * FROM TimeZone";
	@$result_time = mysql_query($query_timezone);
	@$numRows_time = mysql_num_rows($result_time);
$time_row = mysql_fetch_array($result_time);

$timezone = $time_row['TimeZone'];

$date = new DateTime("now", new DateTimeZone($time_row['TimeZone']) );
$now = $date->format('Y-m-d');


	
	
  $page="email";

?>

</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>GimmeMunny Admin</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
<?php
// connect to database 
require("inc/top.php"); 

?>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    <?php
// connect to database 
require("inc/side.php"); 

?>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Email</a> &raquo; <a href="#" class="active">Email Blast Sent</a></h2>
                
                <div id="main">
<p>
Email Sent to <? print $i; ?> people.  Let the money roll in!<br /><br /><br />
	</p>
					
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        
    </div>
    <!-- // #wrapper -->
</body>
</html>


