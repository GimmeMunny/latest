<? 
// connect to database 
include("include/conn.php");

$ordernumber=$_GET['MerchantReference'];


//get company info
$query_company = "SELECT * FROM Company";
@$result_company = mysql_query($query_company);
@$numRows_company = mysql_num_rows($result_company);
$company_row = mysql_fetch_array($result_company);
$company = $company_row['CompanyName'];
$companyurl = $company_row['CompanyURL'];
$companyemail = $company_row['CompanyEmail'];
$companynoreplyemail = $company_row['CompanyNoReplyEmail'];
$companysplit = $company_row['CompanySplit'];
$timezone = $company_row['CompanyTimeZone'];
$date = new DateTime("now", new DateTimeZone($company_row['CompanyTimeZone']) );
$now = $date->format('Y-m-d');
$time = $date->format('H');


?>
<!DOCTYPE html> 
<html> 
<!--  Noir HTML5 mobile template  www.QRdvark.com  10jun11  -->
<!-- 'Noir' by Azalea Software, Inc. is licensed under the Creative Commons Attribution 3.0 Unported License (CC BY 3.0) -->

<head>
<!--  the title tag is extremely important in search engine optimization (SEO)  -->
<title>gimmemnunny.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>
<link href="style.css" rel="stylesheet" type="text/css"/>
<!-- you can apply different style sheets for mobile vs. computer browsers -->
<!--  <link href="style-mobile.css" rel="stylesheet" type="text/css" media="handheld" > -->
<!--  <link href="style-computer.css" rel="stylesheet" type="text/css" media="screen" > -->
<!--  the favicon & iOS home screen icon are both 57x57 PNG's. Use a full URL file path for Android devices.  -->
<!--  <link rel="apple-touch-icon-precomposed" href="http://yoursite.com/apple-touch-icon.png"/>  -->
<!--  <link rel="icon" type="image/vnd.microsoft.icon" href="http://yoursite.com/favicon.png" />  -->
<!--  always make a site map for your mobile site  www.xml-sitemaps.com  -->
<!--  <link rel="alternate" type="application/rss+xml" title="ROR" href="ror.xml" /> -->
</head>

<body>
<div class="header">
	<div id="navButtons"><br>
		<ul>
        
			<li><a href="index.php">&nbsp;&nbsp;home</a></li>
			<li><a href="page.php?id=1">about</a></li>
            <li><a href="contact.php">contact</a></li>
		</ul>
	</div>
   

	<center><img src="images/logo.png" alt="logo" /></center>


<br><br><hr>
 <center>

        <div id="content_holder">
  
     <center>
      
      
<table width="300"><tr align="center"><td>
  
      <b><h2>Thank you for playing <? print $company ?>!!</h2></b><br><br>
      
      Here are your ticket numbers:<br><br>

                 <?php
	
		
	$query_order = "SELECT * FROM Ticket WHERE OrderNumber='$ordernumber'";
	$result_order = mysql_query($query_order);
	
	//We are sending mail to customer to give them ticket numbers.
	
$subject = 'Here are your ticket numbers!';
$message = "Thank you for joining GimmeMunny!  Here are your ticket numbers, and Good Luck!!\n";

	
//output each ticket
  while ($row = mysql_fetch_array($result_order)){
$message = $message . 'TicketNumber:  ' . ($row['TicketNumber']) . "\n";
echo ($row['TicketNumber']) . "<br>";
 	$email = ($row['Email']);
	$to      = $email;
  }
 
	mail($to, $subject, $message);


?>
</td></tr></table><br>
You will be receiving an email with these in a moment.  Please watch your emails for the winner's announcement!<br>

<br>

Gimmemunny.com is U.K. an E.U. based online wagering company and is the world's first and ONLY fully automated online 50/50 eRaffle draw. Gimmemunny.com GUARANTEES A SINGLE WINNING TICKET is randomly and electronically drawn from each draw every time. Gimmemunny.com is NOT a lottery. In certain circumstances lotteries might not have a winning ticket for weeks and winnings at times may have multiple ticket winners - with gimmemunny.com - we only ever have a single winning ticket each draw - GUARANTEED! <br><br>

Additionally, Gimmemunny.com donates a portion of our ticket sales to various children's healthcare charities; and as such, we provide an accurate and up to date window to present how much we have donated. This charity window is directly linked in real-time to each ticket purchase and we keep a running tab online. Upon written request we can provide which children's charity and how much we have donated. At Gimmemunny.com our mission is "To make people wealthy, while keeping children healthy". Whether you are in Real Estate, Pawn Shop, Jewellery, Automotive Restoration, Professional Sports, Amateur Sports or Charity Organization - click on the "Contact US" button and email our Franchisee Group or Charity Sales group to discuss acquiring your own software license. In some circumstances we can assist you with financing.


                
           </div>     
                
                </center><br><br>
<!--  don't forget to borrow the Facebook, Twitter, RSS, and Creative Commons icons  -->
<?php
// connect to database 
require("footer.php"); 

 

?>

  
</body>
</html>